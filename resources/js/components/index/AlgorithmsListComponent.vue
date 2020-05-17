<template>
  <div class="list-group">
    <template v-for="(group, groupIndex) in groups">
      <a
        :key="group.name"
        href="#"
        class="list-group-item list-group-item-action list-group-item-primary"
      >{{ group.name }}</a>
      <a
        v-for="(algorithm, algorithmIndex) in group.algorithms"
        :key="algorithm.id"
        href="#"
        v-on:click.stop="select(groupIndex, algorithmIndex)"
        class="list-group-item list-group-item-action list-group-item-light"
        :class
      >— {{ algorithm.name }}</a>
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
  methods: {
    select(id1, id2) {
      this.$emit('select:algorithm', [id1, id2]);
    }
  },
  mounted() {
  },
};
</script>
<style scoped></style>
