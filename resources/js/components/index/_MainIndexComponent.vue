<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <algorithms-list-component
          :groups="propsData.groups"
          @select:algorithm="updateAlgorithm($event)"
        />
      </div>
      <div class="col-sm=10">
        <code-component
          :algorithm="getCurrentAlgorithm"
        />
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
  data() {
    return {
      currentGroup: 0,
      currentAlgorithm: 0
    };
  },
  computed: {
    getCurrentAlgorithm() {
      return this.propsData.groups[this.currentGroup].algorithms[this.currentAlgorithm];
    }
  },
  methods: {
    updateAlgorithm($event) {

      console.log($event);
      this.currentGroup = $event[0];
      this.currentAlgorithm = $event[1];
    }
  },
  mounted() {console.log(this.propsData);}
};
</script>
<style scoped></style>
