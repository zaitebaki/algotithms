<template>
  <div>
    <div class="container-fluid p-0 pb-1">
      <main-menu-component
        :add-algorithm-route="propsData.addAlgorithmRoute"
        :add-group-route="propsData.addGroupRoute"
        :add-language-route="propsData.addLanguageRoute"
      />
    </div>
    <div class="container-fluid p-0">
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
  </div>
</template>

<script>
import MainMenuComponent from './MainMenuComponent.vue';
import AlgorithmsListComponent from './AlgorithmsListComponent.vue';
import CodeComponent from './CodeComponent.vue';

export default {
  components: {
    'main-menu-component': MainMenuComponent,
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
    },
    isControlCheckboxChecked() {
      console.log(checked);
    }
  },
  mounted() {console.log(this.propsData);},
  methods: {
    updateAlgorithm($event) {
      this.currentGroup = $event[0];
      this.currentAlgorithm = $event[1];
    }
  }
};
</script>
<style scoped></style>
