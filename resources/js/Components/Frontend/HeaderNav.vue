<template>
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-center align-items-center">
      <div class="col-4 pt-1">
        <Link :href="route('about')" class="link-secondary">About Me</Link>
      </div>
      <div class="col-4 text-center">
        <Link :href="route('home')" class="blog-header-logo text-dark"
          >Large</Link
        >
      </div>
      <div class="col-4"></div>
    </div>
  </header>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
  setup() {},
};
</script>
