<template>
  <a-layout class="layout" :style="{ minHeight: '100vh' }">
    <a-layout-header>
      <a-row type="flex" justify="space-between" align="middle">
        <a-menu
          theme="dark"
          mode="horizontal"
          v-model:selectedKeys="current"
          :style="{ lineHeight: '64px' }"
        >
          <a-menu-item key="/dashboard">
            <Link :href="route('dashboard')">Dashboard</Link>
          </a-menu-item>
          <a-menu-item key="/articles">
            <Link :href="route('articles.index')">Articles</Link>
          </a-menu-item>
          <a-menu-item key="/categories">
            <Link :href="route('categories.index')">Categories</Link>
          </a-menu-item>
          <a-menu-item key="/tags">
            <Link :href="route('tags.index')">Tags</Link>
          </a-menu-item>
        </a-menu>

        <a-dropdown placement="bottomRight">
          <template #overlay>
            <a-menu>
              <a-menu-item key="1">
                <LogoutOutlined />
                <Link
                  :href="route('logout')"
                  method="post"
                  as="button"
                  type="button"
                  class="ant-btn ant-btn-text"
                  >Logout</Link
                >
              </a-menu-item>
            </a-menu>
          </template>
          <a-button>
            {{ $page.props.auth.user.name }}
            <DownOutlined />
          </a-button>
        </a-dropdown>
      </a-row>
    </a-layout-header>
    <a-layout-content style="padding: 50px 50px">
      <slot />
    </a-layout-content>
    <a-layout-footer style="text-align: center">
      Ant Design ©2021 Created by Ant UED
    </a-layout-footer>
  </a-layout>
</template>

<script>
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { ref, watch, computed } from "vue";
import { DownOutlined, LogoutOutlined } from "@ant-design/icons-vue";
import { notification } from "ant-design-vue";

export default {
  components: {
    Link,
    DownOutlined,
    LogoutOutlined,
  },
  setup() {
    const current = ref([usePage().url.value]);
    const flash = computed(() => {
      return usePage().props.value.flash;
    });

    watch(
      flash,
      () => {
        if (flash.value.message != null) {
          notification[flash.value.message.type]({
            message: flash.value.message.text,
          });
        }
      },
      { deep: true }
    );

    return { current };
  },
};
</script>
