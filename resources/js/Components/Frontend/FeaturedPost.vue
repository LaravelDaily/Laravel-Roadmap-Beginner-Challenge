<template>
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">
        {{ article["title"] }}
      </h1>
      <p class="lead my-3" v-snip="3" v-html="article['body']"></p>
      <p class="lead mb-0">
        <Link
          :href="route('showArticle', article['id'])"
          class="text-white fw-bold"
          >Continue reading...</Link
        >
      </p>
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
