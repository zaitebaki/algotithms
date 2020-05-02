<template>
  <div class="container">
    <form-component :groups="propsData.groups" />
  </div>
</template>

<script>
import FormComponent from './FormComponent.vue';

export default {
  components: {
    'form-component': FormComponent,
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
