<template>
  <Head title="Tags" />
  <Authenticated>
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
                form.post(route('tags.store'), {
                  onSuccess: () => {
                    form.reset();
                  },
                });
              }
            "
            :model="form"
            :rules="rules"
          >
            <a-form-item
              name="title"
              label="Title"
              :help="form.errors.title"
              :hasFeedback="form.errors.title ? true : false"
              :validateStatus="form.errors.title ? 'error' : 'validating'"
              required
            >
              <a-input v-model:value="form.title" />
            </a-form-item>
          </a-form>
        </a-col>
      </a-row>

      <!-- Tags list -->
      <a-row>
        <a-col :span="24">
          <a-table :dataSource="tags" :columns="columns">
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
            <a-input
              v-model:value="editableData[modelIndex].title"
              @pressEnter="update(modelIndex)"
            />
          </a-form-item>
        </a-form>
      </a-modal>
    </div>
  </Authenticated>
</template>

<script>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import Authenticated from "@/Layouts/Authenticated.vue";
import { DeleteOutlined, EditOutlined } from "@ant-design/icons-vue";
import { Inertia } from "@inertiajs/inertia";
import { reactive, ref } from "@vue/reactivity";

export default {
  components: {
    Head,
    Authenticated,
    DeleteOutlined,
    EditOutlined,
  },
  props: {
    tags: Object,
  },
  setup(props) {
    const visible = ref(false);

    const modelIndex = ref(0);
    const editableData = reactive({});

    const showModal = (key) => {
      visible.value = true;

      modelIndex.value = key;

      editableData[key] = _.cloneDeep(
        props.tags.filter((item) => key === item.key)[0]
      );
    };

    const handleOk = () => {
      visible.value = false;
    };

    const form = useForm({
      title: null,
    });

    const disabled = ref(false);

    const rules = {
      title: [
        { required: true, message: "Title is required.", trigger: "change" },
        {
          min: 6,
          max: 255,
          message: "Title must be between 6 and 255 characters.",
          trigger: "change",
        },
      ],
    };

    const columns = [
      {
        title: "Title",
        dataIndex: "title",
        key: "title",
      },
      {
        title: "Action",
        key: "action",
        slots: {
          customRender: "action",
        },
        width: 125,
      },
    ];

    const onDelete = (key) => {
      disabled.value = true;
      Inertia.delete(route("tags.destroy", key), {
        onSuccess: () => {
          disabled.value = false;
        },
      });
    };

    const update = (key) => {
      disabled.value = true;
      Inertia.put(
        route("tags.update", key),
        {
          title: editableData[key].title,
        },
        {
          onSuccess: () => {
            visible.value = false;
            disabled.value = false;
            delete editableData[key];
          },
        }
      );
    };

    return {
      form,
      rules,
      columns,
      onDelete,
      disabled,
      showModal,
      visible,
      handleOk,
      modelIndex,
      editableData,
      update,
    };
  },
};
</script>
