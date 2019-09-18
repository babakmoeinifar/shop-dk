<template>
    <div class="row">
        <div class="col-lg-3 mt-2">

            <!--location-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="min-height:180px;">
                        <div class="card-header"
                             style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 13px;">
                            دسته بندی نتایج
                        </div>
                        <div class="card-body">
                            <ul class='categories'>
                                <li v-if="zero_category.length"><i class='fa fa-angle-left'></i>
                                    <a>{{ JSON.parse(zero_category).name }}</a>
                                </li>
                                <li style='padding: 10px' v-if="main_category"><i class='fa fa-angle-down'></i>
                                    <a :href="'/search/'+ JSON.parse(main_category).id">{{
                                        JSON.parse(main_category).name }}</a>
                                </li>
                                <li style='padding-right: 25px;font-weight: bold;'>
                                    <i class='fa fa-angle-down'></i><a>{{ JSON.parse(this_category).name }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!--search in result-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="min-height:100px;">
                        <div class="card-header"
                             style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 13px;">
                            جستجو در نتایج :
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" placeholder="جستجو کنید..."
                                   style="font-size: 11px;text-align: left;">
                            <i class="fa fa-search" style="float: right;margin-top: -23px;margin-right: 6px;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!--in stock-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="min-height:29px;">
                        <label class="switch">
                            <input type="checkbox" id="check_status" @click="status()" v-model="check_status">
                            <span class="slider round"></span>
                        </label>
                        <p style="margin-top: -31px;text-align: right;margin-right: 94px;font-size: 13px;">فقط کالاهای
                            موجود </p>
                    </div>
                </div>
            </div>

            <!--brands-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="min-height:280px;">
                        <div class="card-header"
                             style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 13px;">
                            برند ها
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" placeholder="نام برند را جستجو کنید"
                                   style="font-size: 11px;text-align: left;height: 40px;">
                            <i class="fa fa-search" style="float: right;margin-top: -30px;margin-right: 6px;"></i>
                            <div class="brandsearch">
                                <ul>
                                    <li v-for="brand in brands"
                                        v-if="brand.category_id === JSON.parse(this_category).id">
                                        <label :for="'brand'+brand.id" class="row" style="cursor: pointer">
                                            <input type="checkbox" @click="filterbrands" :value="brand.id"
                                                   class="form-check" :id="'brand'+brand.id" v-model="checkbrands">
                                            <ul class="row mx-auto pr-0" style="margin-top: -4px">
                                                <li class="col-6">{{brand.name}}</li>
                                                <li class="col-6">{{brand.en_name}}</li>
                                            </ul>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--range price-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="min-height:280px;">
                        <div class="card-header"
                             style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 14px;">
                            محدوده قیمت مورد نظر
                        </div>
                        <div class="card-body">
                            <div class="brandsearch">
                                <div id="slider-range"></div>
                                <p>
                                    <span class="max-price"></span>
                                    <span class="min-price"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--attributes-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" :id="'attr'+index" v-for="(attr, index) in attrs"
                         v-if="attr.attribute_groups_id === JSON.parse(this_category).id">
                        <div class="card-header"
                             style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 13px;cursor: pointer"
                             data-toggle="collapse" :data-target="'#attr'+attr.id">
                            <i class="fa fa-angle-left"></i> {{ attr.name}}
                        </div>
                        <div class="card-body collapse" :id="'attr'+attr.id" style="min-height:280px;">
                            <ul class="attributeitem">
                                <li v-for="attributefield in attributefields" class="text-right"
                                    v-if="attributefield.attribute_id === attr.id ">
                                    <label :for="'attributefield' + attributefield.id" style="cursor:pointer">
                                        <input type="checkbox" :id="'attributefield' + attributefield.id"
                                               v-model="checkattribute"
                                               :value="attributefield.id"
                                               @click="filterattribute()"> {{attributefield.attr_field_name}}
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb mb-2 pb-0" style="background-color: #e9ecef00">
                        <a class='category' href='/'>فروشگاه اینترنتی دیجی کالا</a>
                        <a v-if="zero_category" class='category' :href="'/search/'+JSON.parse(zero_category).id">
                            <span style="color: #d1d1d1">&nbsp;/&nbsp;</span>
                            {{ JSON.parse(zero_category).name }} </a>
                        <a v-if="main_category" class='category' :href="'/search/'+ JSON.parse(main_category).id">
                            <span style="color: #d1d1d1">&nbsp;/&nbsp;</span>
                            {{ JSON.parse(main_category).name }} </a><span
                        style="color: #d1d1d1">&nbsp;/&nbsp;</span>
                        <a class='category font-weight-bold' style="color: #454545">{{ JSON.parse(this_category).name
                            }} </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="min-height:1300px; ">
                        <div class="card-header" style="background-color: #fff !important; border-bottom: none;">
                            <ul class="shopheader">
                                <li>
                                    مرتب سازی بر اساس:
                                </li>
                                <li class="activeSort">جدید ترین</li>
                                <li @click="sortByLowPrice">ارزان ترین</li>
                                <li @click="sortByHigherPrice">گرانترین</li>
                            </ul>
                        </div>
                        <div class="card-body"></div>
                        <div id="ListProduct" style="position: absolute;top: 5%;">
                            <ul class="row mx-auto p-0" id="products">
                                <li class="col-lg-3 col-md-4 col-sm-6 col-12 product_price mb-2"
                                    v-for="product in products" :data-price="product.price" style="min-width: 200px"
                                    v-if="!filterbrands(product) && status(product) && !filterattribute(product)">
                                    <a :href="/search/+JSON.parse(this_category).id+'/'+product.id">
                                        <img :src="'/'+product.pro_image" class="img-fluid row mx-auto rounded"
                                             style="margin-top: 10px">
                                        <span class="text">{{ product.pro_name}}</span>
                                        <span class="price">{{ product.price}} تومان </span>
                                        <span><i class="fa fa-star mt-3 float-left text-secondary"> 3.4 </i></span>
                                    </a>
                                </li>
                            </ul>
                            <!--                            <div>
                                                            <b class="alert alert-warning">
                                                                جستجو برای این ترکیب از فیلترها با هیچ کالایی هم‌خوانی نداشت.
                                                            </b>
                                                            <p style="white-space: pre-line" class="text-right pr-3">
                                                                تلاش کنید:

                                                                - تعدادی از فیلترها را حذف کنید.

                                                                - در جستجو از عبارت‌های متداول‌تر استفاده کنید.
                                                            </p>
                                                        </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <pagination v-if="pagination.last_page >1 " :pagination="pagination" offset="5"
                    @paginate="fetchProducts()"></pagination>
    </div>

</template>

<script>
    export default {

        props: ['this_category', 'zero_category', 'main_category'],

        data() {
            return {
                check_status: '',
                brands: '',
                checkbrands: '',
                checkattribute: '',
                products: '',
                attrs: '',
                attributefields: '',
                pagination: {
                    current_page: 1
                }
            };
        },

        created() {
            this.ShowBrand();
            this.fetchProducts();
            this.fetchAttrs();
            this.fetchAttrFields();

            /***********JQUERY sortBy Range Price***********/
            function showProducts(minPrice, maxPrice) {
                $("#products li").hide().filter(function () {
                    let price = parseInt($(this).data("price"), 10);
                    return price >= minPrice || price <= maxPrice;
                }).show();
            }

            $(function () {
                let options = {
                    range: true,
                    min: 0,
                    max: 500000,
                    values: [500, 200000],
                    slide: function (event, ui) {
                        let min = ui.values[0],
                            max = ui.values[1];

                        $(".max-price").text(max + " تومان ");
                        $(".min-price").text(min + " تومان");

                        showProducts(max, min);
                    }
                }, min, max;

                $("#slider-range").slider(options);
                min = $("#slider-range").slider("values", 0);
                max = $("#slider-range").slider("values", 1);
                $(".max-price").text(max + " تومان ");
                $(".min-price").text(min + " تومان");
                showProducts(max, min);
            });
            /***********END sortBy Range Price***********/

        },

        methods: {
            ShowBrand() {
                axios.get('/api/show-brand/' + JSON.parse(this.this_category).id).then(response => {
                    this.brands = response.data;
                });

            },

            fetchProducts() {
                axios.get('/api/filter-products/?category=' + JSON.parse(this.this_category).id + '&page=' + this.pagination.current_page).then(response => {
                    this.products = response.data.data.data;
                    this.pagination = response.data.data;
                });
            },

            fetchAttrs() {
                axios.get('/api/attr-by-product/').then(response => {
                    this.attrs = response.data;
                });
            },

            fetchAttrFields() {
                axios.get('/api/attr-field-by-attr/').then(response => {
                    this.attributefields = response.data;
                });
            },

            status(data) {
                let checkBox = document.getElementById("check_status");
                if (checkBox.checked === true) {
                    return data.stock !== 0;
                } else {
                    return true;
                }
            },

            filterbrands(data) {
                // console.log(this.checkbrands.includes(data.pro_name));
                // if (this.checkbrands.length === 0) return true;
                // return  this.checkbrands.includes(data.name);
            },

            orderBy(sorKey) {
                // this.sortKey = sorKey;
                // this.sortSettings[sorKey] = !this.sortSettings[sorKey];
                // this.desc = this.sortSettings[sorKey];
            },

            sortByLowPrice() {
                return this.products.sort(function (a, b) {
                    return a.price - b.price;
                })
            },

            sortByHigherPrice() {
                return this.products.sort(function (a, b) {
                    return b.price - a.price;
                })
            },

            filterattribute(data) {
                // console.log(this.checkattribute.includes(data.attr_field_name));
                // if (this.checkattribute.length === 0) return true;
                // return  this.checkattribute.includes(data.attr_field_name);
            }

        }
    }
</script>


