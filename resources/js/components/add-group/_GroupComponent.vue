<template>
  <div class="container">
    <form-component :props-data="propsData" />
  </div>
</template>

<script>
import GroupFormComponent from './GroupFormComponent.vue';

export default {
  components: {
    'form-component': GroupFormComponent,
  },
  props: {
    propsData: {
      type: Object,
      required: true,
    },
  },
  mounted() {},
};
</script>

<style></style>
