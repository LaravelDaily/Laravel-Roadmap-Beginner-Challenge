<template>
  <Head title="Blog Home" />

  <div class="container">
    <HeaderNav />

    <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
        <a
          v-for="category in categories"
          :key="category.id"
          class="p-2 link-secondary"
          href="#"
          >{{ category.title }}</a
        >
      </nav>
    </div>
  </div>

  <main class="container">
    <!-- start::featured -->
    <FeaturedPost :article="articles[0]" />
    <!-- end::featured -->

    <!-- start::list -->
    <div class="row mb-2">
      <!-- start::list-item -->
      <PostItem :article="articles[1]" />
      <!-- end::list-item -->

      <!-- start::list-item -->
      <PostItem :article="articles[2]" />
      <!-- end::list-item -->
    </div>
    <!-- end::list -->

    <!-- start::main-content -->
    <div class="row g-5">
      <!-- start::post -->
      <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">From the Firehose</h3>

        <!-- start::article -->
        <ArticleShowFrontend :article="articles[3]" />
        <!-- end::article -->

        <!-- start::article -->
        <ArticleShowFrontend :article="articles[4]" />
        <!-- end::article -->

        <nav class="blog-pagination" aria-label="Pagination">
          <a class="btn btn-outline-primary" href="#">Older</a>
          <a class="btn btn-outline-secondary disabled">Newer</a>
        </nav>
      </div>
      <!-- end::post -->

      <!-- start::about -->
      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem">
          <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">About</h4>
            <p class="mb-0">
              Customize this section to tell your visitors a little bit about
              your publication, writers, content, or something else entirely.
              Totally up to you.
            </p>
          </div>

          <div class="p-4">
            <h4 class="fst-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
              <li v-for="month in months" :key="month['month']">
                <a href="#">{{ month["month"] }}</a> ({{ month["articles"] }})
              </li>
            </ol>
          </div>

          <div class="p-4">
            <h4 class="fst-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div>
      </div>
      <!-- end::about -->
    </div>
    <!-- end::main-content -->
  </main>

  <!-- start::footer -->
  <footer class="blog-footer">
    <p>
      Blog template built for
      <a href="https://getbootstrap.com/">Bootstrap</a> by
      <a href="https://twitter.com/mdo">@mdo</a>.
    </p>
    <p>
      <a href="#">Back to top</a>
    </p>
  </footer>
  <!-- end::footer -->
</template>

<style>
/* stylelint-disable selector-list-comma-newline-after */

.blog-header {
  line-height: 1;
  border-bottom: 1px solid #e5e5e5;
}

.blog-header-logo {
  font-family: "Playfair Display", Georgia, "Times New Roman",
    serif /*rtl:Amiri, Georgia, "Times New Roman", serif*/;
  font-size: 2.25rem;
}

.blog-header-logo:hover {
  text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Playfair Display", Georgia, "Times New Roman",
    serif /*rtl:Amiri, Georgia, "Times New Roman", serif*/;
}

.display-4 {
  font-size: 2.5rem;
}
@media (min-width: 768px) {
  .display-4 {
    font-size: 3rem;
  }
}

.nav-scroller {
  position: relative;
  z-index: 2;
  height: 2.75rem;
  overflow-y: hidden;
}

.nav-scroller .nav {
  display: flex;
  flex-wrap: nowrap;
  padding-bottom: 1rem;
  margin-top: -1px;
  overflow-x: auto;
  text-align: center;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}

.nav-scroller .nav-link {
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
  font-size: 0.875rem;
}

.card-img-right {
  height: 100%;
  border-radius: 0 3px 3px 0;
}

.flex-auto {
  flex: 0 0 auto;
}

.h-250 {
  height: 250px;
}
@media (min-width: 768px) {
  .h-md-250 {
    height: 250px;
  }
}

/* Pagination */
.blog-pagination {
  margin-bottom: 4rem;
}
.blog-pagination > .btn {
  border-radius: 2rem;
}

/*
 * Blog posts
 */
.blog-post {
  margin-bottom: 4rem;
}
.blog-post-title {
  margin-bottom: 0.25rem;
  font-size: 2.5rem;
}
.blog-post-meta {
  margin-bottom: 1.25rem;
  color: #727272;
}

/*
 * Footer
 */
.blog-footer {
  padding: 2.5rem 0;
  color: #727272;
  text-align: center;
  background-color: #f9f9f9;
  border-top: 0.05rem solid #e5e5e5;
}
.blog-footer p:last-child {
  margin-bottom: 0;
}

.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
    font-size: 3.5rem;
  }
}
</style>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import FeaturedPost from "@/Components/Frontend/FeaturedPost.vue";
import PostItem from "@/Components/Frontend/PostItem.vue";
import ArticleShowFrontend from "@/Components/Frontend/ArticleShowFrontend.vue";
import HeaderNav from "@/Components/Frontend/HeaderNav.vue";

export default {
  components: {
    Head,
    Link,
    FeaturedPost,
    PostItem,
    ArticleShowFrontend,
    HeaderNav,
  },
  props: {
    articles: Object,
    categories: Object,
    months: Object,
  },
  setup() {},
};
</script>
