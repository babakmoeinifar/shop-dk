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
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

            // fname: "",
            // lname: "",
            // email: "",
            // role: "",
            // password: "",
            // productName: "",
            // productPrice: "",
            // productCount: "",
            // productCategory: "",
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
        //     this.getvalueuser();
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
        // ShowProduct: function () {
        //
        //     axios.get('/ShowProduct?page=' + this.pagination.current_page).then(response => {
        //         this.product = response.data.data.data;
        //         this.pagination = response.data.data;
        //         console.log(this.product);
        //     });
        //
        //
        // },
        //
        // showattributeitems: function () {
        //     axios.get('/attributeitems').then(response => {
        //
        //         this.attributeitems = response.data
        //
        //         //   console.log(this.attributeitems);
        //
        //     });
        //
        // },
        // showattribute: function () {
        //
        //     axios.get('/attribute').then(response => {
        //
        //         this.attribute = response.data
        //
        //         //
        //         //
        //         // console.log(this.attribute);
        //
        //     });
        //
        //
        // },
        //
        // /*********showbrand ******************/
        // ShowBrand: function () {
        //
        //     axios.get('/admin/showbrand').then(response => {
        //
        //
        //         this.brand = response.data;
        //
        //
        //     });
        //
        // },
        //
        //
        // AddBrand: function () {
        //
        //     var image = $("#brandimage").val();
        //     axios.post('/admin/addbrand', {
        //
        //         name: this.BrandName,
        //         country: this.Country,
        //         Ename: this.Ename,
        //         product_id: this.BrandProduct,
        //         image: image
        //
        //
        //     }).then(response => {
        //
        //
        //         swal("با موفقیت ذخیره شد ");
        //
        //
        //     }, response => {
        //         this.error = 1;
        //         console.log("error");
        //     });
        //
        // },
        //
        // /************************discount*******************/
        // addDiscount: function () {
        //
        //     var begindate = $("#begindate").val();
        //     var enddate = $("#enddate").val();
        //     alert(begindate);
        //     axios.post('/admin/addDiscount', {
        //
        //         name: this.name,
        //         value: this.value,
        //         code: this.code,
        //         product_id: this.product_id,
        //         enddate: enddate,
        //         begindate: begindate
        //
        //
        //     }).then(response => {
        //
        //
        //         swal("با موفقیت ذخیره شد ");
        //
        //
        //     }, response => {
        //         this.error = 1;
        //         console.log("error");
        //     });
        //
        // },
        // /*******************attributeitem************************/
        //
        //
        // AddAttributeItem: function () {
        //
        //     var productid = $("#productid1").val();
        //
        //
        //     axios.post('/admin/attributeitem', {
        //
        //         attributeitem: this.AttributeItem,
        //
        //         itemid: this.itemid,
        //         productid: productid
        //
        //
        //     }).then(response => {
        //
        //
        //         swal("با موفقیت ذخیره شد ");
        //
        //
        //     }, response => {
        //         this.error = 1;
        //         console.log("error");
        //     });
        //
        //
        // },
        // /*****************attributs********************/
        //
        // AddGroup: function () {
        //
        //     axios.post('/admin/atrrgroup', {
        //
        //         name: this.NameGroup,
        //
        //         id: this.attributegroup_id,
        //
        //
        //     }).then(response => {
        //
        //
        //         swal("با موفقیت ذخیره شد ");
        //
        //
        //     }, response => {
        //         this.error = 1;
        //         console.log("error");
        //     });
        //
        //
        // },
        //
        //
        // AddAttribute: function () {
        //
        //
        //     var productid = $("#productid1").val();
        //
        //     axios.post('/admin/attribute', {
        //
        //         name: this.Name_Attr,
        //
        //         id: this.AtributeGroup,
        //
        //         productid: this.productid
        //
        //
        //     }).then(response => {
        //
        //
        //         swal("با موفقیت ذخیره شد ");
        //
        //
        //     }, response => {
        //         this.error = 1;
        //         console.log("error");
        //     });
        //
        //
        // },
        //
        //
        // /*******************AddProduct**********************/
        // AddProduct: function () {
        //
        //     var text = $("#editor").text();
        //
        //
        //     var img = $("#image").val();
        //
        //     alert(img);
        //     axios.post('/admin/addproduct', {
        //
        //         name: this.ProductName,
        //         text: text,
        //         price: this.ProductPrice,
        //         count: this.ProductCount,
        //         image: img,
        //         category: this.ProductCategory
        //
        //
        //     }).then(response => {
        //
        //         this.getvalueuser();
        //
        //
        //         $("#productid").val(response.data.id);
        //         $("#productid1").val(response.data.id);
        //         swal("با موفقیت ذخیره شد ");
        //
        //
        //     }, response => {
        //         this.error = 1;
        //         console.log("error");
        //     });
        //
        //
        // },
        //
        // /********************updatestatus**********************/
        //
        // updatestatus: function (id) {
        //
        //     axios.post('/admin/updatestatus', {
        //
        //         id: id,
        //
        //
        //     }).then(response => {
        //
        //         this.getvalueuser();
        //
        //
        //     }, response => {
        //         this.error = 1;
        //         console.log("error");
        //     });
        //
        //
        // },
        //
        //
        // /*****************deleteuser******************/
        //
        // deleteuser: function (id) {
        //
        //
        //     axios.post('deleteuser', {
        //
        //
        //         id: id
        //
        //
        //     }).then(response => {
        //
        //         this.getvalueuser();
        //
        //         swal("با موفقیت حذف شد ");
        //
        //
        //     }, response => {
        //         this.error = 1;
        //         console.log("error");
        //     });
        //
        // },
        // /****************adduser****************/
        //
        // adduser: function () {
        //
        //
        //     axios.post('adduser', {
        //
        //         fname: this.fname,
        //         lname: this.lname,
        //         email: this.email,
        //         role: this.role,
        //         password: this.password
        //
        //
        //     }).then(response => {
        //
        //         this.getvalueuser();
        //
        //         swal("با موفقیت ذخیره شد ");
        //
        //
        //     }, response => {
        //         this.error = 1;
        //         console.log("error");
        //     });
        //
        //
        // },
        // /********************getvalue user**************************/
        // getvalueuser: function () {
        //
        //     axios.get('getuser').then(response => {
        //
        //
        //         this.users = response.data.data;
        //
        //
        //     });
        //
        //
        // },
        //
        //


    // }
});
