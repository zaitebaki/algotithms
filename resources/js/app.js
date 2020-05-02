require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'main-component',
    require('./components/_MainComponent.vue')
      .default
  );

  Vue.component(
    'admin-component',
    require('./components/admin/_AdminComponent.vue')
      .default
  );

const app = new Vue({
  el: '#app',
});