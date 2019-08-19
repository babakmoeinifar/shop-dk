/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Fire = new Vue();
import { Form, HasError, AlertError } from 'vform';
import Swal from 'sweetalert2';
require('lazysizes');

//variables
window.Form = Form;
window.Swal = Swal;
window.Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('category', require('./components/admin/category').default);
Vue.component('product', require('./components/admin/products/product').default);
Vue.component('add-attr', require('./components/admin/products/addAttr').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

            // imageurl: "",
            // users: [],
            // groupName: "",
            // brandName: "",
            // itemid: "",
            // attributegroup_id: "",
            // atributeGroup: "",
            // attributeItem: "",
            // Name_Attr1: "",
            // name: "",
            // value: "",
            // code: "",
            // product_id: "",
            // begindate: "",
            // enddate: "",
            // BrandName: "",
            // Country: "",
            // BrandProduct: "",
            // ImageBrand: "",
            // Ename: "",
            // BrandCategory: "",
            // brand: [],
            // product: [],
            // checkbrands: [],
            // sortpriceA: "",
            // check_status: "",
            // attribute: "",
            // attributeitems: "",
            // checkattribute: [],
            // pagination: {
            //
            //     'current_page': 1



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


        /************AddCart*************/
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
        // /********************/
        //
        // status: function (data) {
        //     var checkBox = document.getElementById("check_status");
        //     if (checkBox.checked == true) {
        //         if (data.count == 0) {
        //             return false;
        //         } else {
        //             return true;
        //         }
        //
        //     } else {
        //         return true;
        //     }
        // },
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
        //
        //
        // },
        //
        //
        // /********************************/
        //
        //
        //


});
