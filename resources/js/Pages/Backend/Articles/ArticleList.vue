<template>
  <Head title="Dashboard" />

  <authenticated>
    <div
      :style="{
        background: '#fff',
        padding: '24px',
        minHeight: '280px',
      }"
    >
      <a-row>
        <a-col :span="24">
          <a-form
            @submit="
              {
                form.post(route('articles.store'), {
                  onSuccess: () => {
                    form.reset();
                    images = [];
                  },
                });
              }
            "
            :model="form"
            :label-col="{ span: 4 }"
            :wrapper-col="{ span: 14 }"
          >
            <a-form-item label="Title" required>
              <a-input v-model:value="form.title" />
            </a-form-item>
            <a-form-item label="Body" required>
              <!-- <a-textarea v-model:value="form.body" /> -->
              <ckeditor
                :editor="editor"
                v-model="form.body"
                :config="editorConfig"
              ></ckeditor>
            </a-form-item>
            <a-form-item label="Category" required>
              <a-select
                v-model:value="form.category_id"
                placeholder="select category"
                :options="categories"
                show-search
                optionFilterProp="label"
              >
              </a-select>
            </a-form-item>
            <a-form-item label="Tags" required>
              <a-select
                v-model:value="form.tag_ids"
                placeholder="select tags"
                :options="tags"
                show-search
                optionFilterProp="label"
                mode="multiple"
              >
              </a-select>
            </a-form-item>
            <a-form-item label="Image" required>
              <a-upload
                v-model:file-list="images"
                :before-upload="beforeUpload"
                list-type="picture-card"
                accept="image/png, image/jpeg"
              >
                <a-button>
                  <upload-outlined></upload-outlined>
                  Click to Upload
                </a-button>
              </a-upload>
            </a-form-item>
            <a-form-item :wrapper-col="{ span: 14, offset: 4 }">
              <a-button
                type="primary"
                htmlType="submit"
                :loading="form.processing"
                >Create</a-button
              >
            </a-form-item>
          </a-form>
        </a-col>
      </a-row>
      <a-row>
        <a-col :span="24">
          <a-table :dataSource="articles" :columns="columns">
            <template #image="{ record }">
              <span>
                <a-avatar size="large" shape="square" :src="record.image" />
              </span>
            </template>

            <template #body="{ record }">
              <span v-snip="3" v-html="record.body"></span>
            </template>

            <template #tags="{ record }">
              <a-space direction="vertical">
                <a-tag v-for="tag in record.tags" :key="tag">
                  {{ tag.toUpperCase() }}
                </a-tag>
              </a-space>
            </template>

            <template #action="{ record }">
              <a-space>
                <a-button
                  :disabled="disabled"
                  danger
                  @click="onDelete(record.key)"
                  ><DeleteOutlined
                /></a-button>
                <a-button
                  :disabled="disabled"
                  type="primary"
                  @click="showModal(record.key)"
                  ><EditOutlined
                /></a-button>
              </a-space>
            </template>
          </a-table>
        </a-col>
      </a-row>

      <a-modal v-model:visible="visible" title="Edit" @ok="handleOk">
        <a-form v-if="editableData[modelIndex]">
          <a-form-item
            :model="editableData[modelIndex]"
            name="title"
            label="Title"
          >
            <a-input v-model:value="editableData[modelIndex].title" />
          </a-form-item>
          <a-form-item label="Category">
            <a-select
              v-model:value="editableData[modelIndex].category_id"
              placeholder="select category"
              :options="categories"
              show-search
              optionFilterProp="label"
            >
            </a-select>
          </a-form-item>
          <a-form-item label="Tags">
            <a-select
              v-model:value="editableData[modelIndex].tag_ids"
              placeholder="select tags"
              :options="tags"
              show-search
              optionFilterProp="label"
              mode="multiple"
            >
            </a-select>
          </a-form-item>
          <a-form-item label="Current Image">
            <a-avatar
              size="large"
              shape="square"
              :src="editableData[modelIndex].image"
            />
          </a-form-item>
          <a-form-item label="Image" required>
            <a-upload
              v-model:file-list="updateImages"
              :before-upload="updateImage"
              list-type="picture-card"
              accept="image/png, image/jpeg"
            >
              <a-button>
                <upload-outlined></upload-outlined>
                Click to Upload
              </a-button>
            </a-upload>
          </a-form-item>
          <a-form-item label="Body">
            <ckeditor
              :editor="editor"
              v-model="editableData[modelIndex].body"
              :config="editorConfig"
            ></ckeditor>
          </a-form-item>
        </a-form>
      </a-modal>
    </div>
  </authenticated>
</template>

<script>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import Authenticated from "@/Layouts/Authenticated.vue";
import {
  UploadOutlined,
  DeleteOutlined,
  EditOutlined,
} from "@ant-design/icons-vue";
import { ref, reactive } from "@vue/reactivity";
import { Inertia } from "@inertiajs/inertia";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
  components: {
    Head,
    Authenticated,
    UploadOutlined,
    DeleteOutlined,
    EditOutlined,
  },
  props: {
    categories: Object,
    articles: Object,
    tags: Object,
  },
  setup(props) {
    const editor = ClassicEditor;
    const editorData = ref("<p>Content of the editor.</p>");
    const editorConfig = {};

    const visible = ref(false);
    const modelIndex = ref(0);
    const editableData = reactive({});

    const showModal = (key) => {
      visible.value = true;

      modelIndex.value = key;

      editableData[key] = _.cloneDeep(
        props.articles.filter((item) => key === item.key)[0]
      );
    };

    const disabled = ref(false);

    const form = useForm({
      title: null,
      body: "",
      category_id: null,
      tag_ids: [],
      image: null,
    });

    const images = ref();
    const updateImages = ref();
    const test = reactive({});

    const beforeUpload = (file) => {
      form.image = file;
      return false;
    };
    const updateImage = (file) => {
      test.value = file;
      return false;
    };

    const columns = [
      {
        title: "Image",
        key: "image",
        slots: { customRender: "image" },
      },
      {
        title: "Title",
        dataIndex: "title",
        key: "title",
      },
      {
        title: "Body",
        key: "body",
        slots: { customRender: "body" },
      },
      {
        title: "Category",
        dataIndex: "category",
        key: "category",
      },
      {
        title: "Tags",
        key: "tags",
        slots: { customRender: "tags" },
      },
      {
        title: "Action",
        key: "action",
        slots: { customRender: "action" },
        width: 100,
      },
    ];

    const onDelete = (key) => {
      disabled.value = true;
      Inertia.delete(route("articles.destroy", key), {
        preserveScroll: true,
        onSuccess: () => {
          disabled.value = false;
        },
      });
    };

    const handleOk = () => {
      update(modelIndex.value);

      visible.value = false;
    };

    const update = (key) => {
      disabled.value = true;
      Inertia.post(
        route("articles.update", key),
        {
          title: editableData[key].title,
          body: editableData[key].body,
          category_id: editableData[key].category_id,
          tag_ids: editableData[key].tag_ids,
          image: test.value,
          _method: "put",
        },
        {
          onSuccess: () => {
            visible.value = false;
            disabled.value = false;
            delete editableData[key];
            test.value = {};
            updateImages.value = [];
          },
        }
      );
    };

    return {
      form,
      images,
      beforeUpload,
      columns,
      onDelete,
      editor,
      editorData,
      editorConfig,
      disabled,
      showModal,
      visible,
      modelIndex,
      editableData,
      handleOk,
      update,
      updateImages,
      updateImage,
      test,
    };
  },
};
</script>
