<template>
  <div>
    <p>hello</p>
  </div>
</template>

<script>
export default {
  props: {
    propsData: {
      type: Object,
      required: true,
    },
  },
  mounted() {
    console.log(this.propsData);
  },
};
</script>
<style scoped></style>
