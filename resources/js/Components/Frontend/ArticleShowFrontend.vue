<template>
  <article class="blog-post">
    <Link
      class="text-decoration-none"
      :href="route('showArticle', article['id'])"
    >
      <h2 class="blog-post-title">{{ article["title"] }}</h2>
    </Link>
    <div class="mb-1 text-muted">{{ article["created_at"] }}</div>
    <div v-html="article['body']"></div>
  </article>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
  props: {
    article: Object,
  },
};
</script>

<style>
</style>
