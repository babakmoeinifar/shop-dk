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


const app = new Vue({
    el: '#app',

    // mounted() {
    //     this.ShowProduct();
    // },

    // computed: {
    //     products: function () {
    //
    //         return _.orderBy(this.products, 'price', 'desc');
    //         console.log(_.orderBy(this.products, 'price', 'desc'));
    //     }
    // },

    // created: function () {
        //
        //     this.ShowBrand();
        //     this.ShowProduct();
        //     this.showattribute();
        //     this.showattributeitems();
    // },
    // methods: {


        //
        // addCart: function (id) {
        //     alert(id);
        //     axios.post('/addcart', {
        //
        //         id: id
        //
        //
        //     }).then(response => {
        //         location.href = '/cart';
        //     }, response => {
        //         this.error = 1;
        //         console.log("error");
        //     });
        //
        // },
        //
        //

        // filterattribute: function (data) {
        //     console.log(this.checkattribute.includes(data.name1));
        //
        //     if (this.checkattribute.length == 0) return true;
        //
        //     console.log(this.checkattribute.includes(data.name1));
        // },
        //
        // /**********filter brands**************/
        //
        // filterbrands: function filterbrands(data) {
        //
        //     console.log(this.checkbrands.includes(data.name));
        //
        //     if (this.checkbrands.length == 0) return true;
        //
        //     return this.checkbrands.includes(data.name);
        //
        //
        // },
        // orderBy: function (sorKey) {
        //     this.sortKey = sorKey
        //     this.sortSettings[sorKey] = !this.sortSettings[sorKey]
        //     this.desc = this.sortSettings[sorKey]
        //
        // },
        // sortByLowPrice: function () {
        //
        //     return this.product.sort(function (a, b) {
        //         return a.price - b.price;
        //     })
        //
        //
        // },
        //
        // sortByHigherPrice: function () {
        //
        //     return this.product.sort(function (a) {
        //         return b.price - a.price;
        //     })
        // },

});
