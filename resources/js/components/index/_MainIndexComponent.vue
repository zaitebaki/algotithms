<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <algorithms-list-component
          :groups="propsData.groups"
        />
      </div>
      <div class="col-sm=10">
          <code-component />
      </div>
    </div>
  </div>
</template>

<script>
import AlgorithmsListComponent from './AlgorithmsListComponent.vue';
import CodeComponent from './CodeComponent.vue';

export default {
  components: {
    'algorithms-list-component': AlgorithmsListComponent,
    'code-component': CodeComponent
  },
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
