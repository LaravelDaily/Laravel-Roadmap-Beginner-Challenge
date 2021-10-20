<template>
  <div class="col-md-6">
    <div
      class="
        row
        g-0
        border
        rounded
        overflow-hidden
        flex-md-row
        mb-4
        shadow-sm
        h-md-250
        position-relative
      "
    >
      <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary">{{
          article["category"]
        }}</strong>
        <h3 class="mb-0">{{ article["title"] }}</h3>
        <div class="mb-1 text-muted">{{ article["created_at"] }}</div>
        <p class="card-text mb-auto" v-snip="2" v-html="article['body']"></p>
        <Link :href="route('showArticle', article['id'])" class="stretched-link"
          >Continue reading</Link
        >
      </div>
      <div class="col-auto d-none d-lg-block" style="width: 200px">
        <img
          :src="article['image']"
          :alt="article['title']"
          width="200"
          height="250"
          style="object-fit: cover; object-position: center"
        />
      </div>
    </div>
  </div>
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
