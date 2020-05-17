<template>
  <article class="markdown-body">
    <span v-html="algorithm.code"></span>
  </article>
</template>

<script>
export default {
  props: {
    algorithm: {
      type: Object,
      require: false
    },
  },
  mounted() {
  },
};
</script>
<style scoped></style>
