<template>
  <div class="list-group">
    <template v-for="group in groups">
      <a
        :key="group.name"
        href="#"
        class="list-group-item list-group-item-action list-group-item-primary"
      >{{ group.name }}</a>
      <a
        v-for="algorithm in group.algorithms"
        :key="algorithm.id"
        href="#"
        class="list-group-item list-group-item-action list-group-item-light"
      >{{ algorithm.name }}</a>
    </template>
  </div>
</template>

<script>
export default {
  props: {
    groups: {
      type: Array,
      default: () => [],
    },
  },
  mounted() {
    console.log(this.groups);
  },
};
</script>
<style scoped></style>
