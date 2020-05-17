<template>
  <div class="container">
    <form-component :props-data="propsData" />
  </div>
</template>

<script>
import LanguageFormComponent from './LanguageFormComponent.vue';

export default {
  components: {
    'form-component': LanguageFormComponent,
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
