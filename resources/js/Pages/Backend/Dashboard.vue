<template>
  <Head title="Dashboard" />
  <Authenticated>
    <div
      :style="{
        background: '#fff',
        padding: '24px',
        minHeight: '280px',
      }"
    >
      Dashboard Home
    </div>
  </Authenticated>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import Authenticated from "@/Layouts/Authenticated.vue";

export default {
  components: {
    Head,
    Authenticated,
  },
};
</script>
