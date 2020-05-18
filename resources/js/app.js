require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'main-component',
    require('./components/index/_MainIndexComponent.vue').default
);

Vue.component(
    'admin-component',
    require('./components/admin/_AdminComponent.vue').default
);

Vue.component(
    'add-group-component',
    require('./components/add-group/_GroupComponent.vue').default
);

Vue.component(
    'add-language-component',
    require('./components/add-language/_LanguageComponent.vue').default
);

const app = new Vue({
    el: '#app',
});
