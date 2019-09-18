require('./bootstrap');
require('lazysizes');

window.Vue = require('vue');
window.Fire = new Vue();
import { Form } from 'vform';
import Swal from 'sweetalert2';

//variables
window.Form = Form;
window.Swal = Swal;
window.Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000
});

Vue.component('category', require('./components/admin/category').default);
Vue.component('discount', require('./components/admin/discount').default);
Vue.component('product', require('./components/admin/products/product').default);
Vue.component('add-attr', require('./components/admin/products/addAttr').default);
Vue.component('Brand', require('./components/admin/Brand').default);
Vue.component('Products', require('./components/Products').default);
Vue.component('Pagination', require('./components/Pagination').default);


const app = new Vue({
    el: '#app',
});
