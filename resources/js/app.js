require('./bootstrap');
window.Vue = require('vue');
import PreorderForm from './components/PreorderForm.vue';

Vue.component(
    'preorder-form',
    PreorderForm
);
new Vue({
    el: '#app'
});
