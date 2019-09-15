<template>
    <div>
        <div class="col-lg-3" style="top: 16%;position: absolute;max-width: 19.2%;">
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

        <div class="col-lg-3" style="top: 25%;position: absolute;max-width: 19.2%;">
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
                            <li v-for="brand in brands">
                                <label :for="brand.id" class="row" style="cursor: pointer">
                                    <input type="checkbox" @click="filterbrands" :value="brand.name"
                                           class="form-check" :id="brand.id">
                                    <span class="pr-2" style="margin-top: -4px">{{brand.name}}</span>
                                    <span style="margin-right: 100px;margin-top: -4px">{{brand.en_name}}</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3" style="top: 46%;position: absolute;max-width: 19.2%;">
            <div class="card" style="min-height:29px;">
                <label class="switch">
                    <input type="checkbox" id="check_status" @click="status()" v-model="check_status">
                    <span class="slider round"></span>
                </label>
                <p style="margin-top: -31px;text-align: right;margin-right: 94px;font-size: 13px;">فقط کالاهای
                    موجود </p>
            </div>
        </div>

        <div class="col-lg-3" style="top: 50%;position: absolute;max-width: 19.2%;">
            <div class="card" style="min-height:280px;">
                <div class="card-header"
                     style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 14px;">
                    محدوده قیمت مورد نظر
                </div>
                <div class="card-body">
                    <div class="brandsearch">
                        <div id="slider-range"></div>
                        <p>
                            <span class="max-price"><span>از</span></span>
                            <span class="min-price"><span>از</span></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!--    <div class="col-lg-10" style="display: inline-block;margin-top:3%;max-width: 81%;text-align: right;">-->
        <!--        <div class="breadcrumb mb-0 pb-0" style="background-color: #e9ecef00">-->
        <!--            <a class='category' href='/'>فروشگاه اینترنتی دیجی کالا</a><span-->
        <!--            style="color: #d1d1d1">&nbsp;/&nbsp;</span>-->
        <!--            <a v-if="zero_category" class='category' href="/search/${zero_category.id}"> {{ zero_category.name }} </a><span-->
        <!--            style="color: #d1d1d1">&nbsp;/&nbsp;</span>-->
        <!--            <a v-if="main_category" class='category' href="/search/${main_category.id}"> {{ main_category.name }} </a><span-->
        <!--            style="color: #d1d1d1">&nbsp;/&nbsp;</span>-->
        <!--            <a class='category font-weight-bold' style="color: #454545">{{ category_id.name }} </a>-->
        <!--        </div>-->
        <!--    </div>-->

        <!--        <span>
    {{--            @foreach($attrs as $attr)--}}
    {{--                <div class="col-lg-3" id="{{ $attr.id }}">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header"--}}
                             {{--                         style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 13px;"--}}
                             {{--                         data-toggle="collapse" :data-target="{{ $attr.id }}">--}}
    {{--                        {{ $attr.name}}--}}
    {{--                    </div>--}}
    {{--                    <div class="card-body" :id="'demo'+index" style="min-height:280px;">--}}
    {{--                        <ul class="attributeitem">--}}
    {{--                            @foreach($attributeFields as $attrField)--}}
    {{--                                <li>--}}
    {{--                                @if($attrField.attribute_id == $attr.id)--}}
    {{--                                        <input type="checkbox" name=""--}}
                                                   {{--                                               v-model="checkattribute"--}}
                                                   {{--                                               :value="{{$attrField.attr_field_name}}"--}}
                                                   {{--                                               @click="filterattribute()"> {{$attrField.attr_field_name}}--}}
    {{--                                    @endif--}}
    {{--                            </li>--}}
    {{--                            @endforeach--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            @endforeach--}}
    {{--        </span>
    -->

        <div class="col-lg-10" style="display: inline-block;margin-top:1%;max-width: 81%;">
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
                        <li class="col-lg-3 col-md-4 col-sm-6 col-12 product_price mb-2" v-for="product in products">
                            <a href="">
                                <img :src="'/'+product.image" class="img-fluid row mx-auto rounded"
                                     style="margin-top: 10px">
                                <span class="text">{{ product.name}}</span>
                                <span class="price">{{ product.price}}تومان</span>
                                <span><i class="fa fa-star mt-3 float-left text-secondary"> 3.4 </i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {

        props: ['category_id', 'zero_category', 'main_category'],

        data() {
            return {
                check_status: '',
                brands: '',
                products: ''
            };
        },

        created() {
            this.ShowBrand();
            this.fetchProducts();
        },

        methods: {
            ShowBrand() {
                axios.get('/api/show-brand/' + JSON.parse(this.category_id).id).then(response => {
                    this.brands = response.data;
                });

            },

            fetchProducts() {
                axios.get('/api/product-by-category/' + JSON.parse(this.category_id).id).then(response => {
                    this.products = response.data;
                });
            },

            status(data) {
                let checkBox = document.getElementById("check_status");
                if (checkBox.checked === true) {
                    return data.count !== 0;
                } else {
                    return true;
                }
            },

            filterbrands(data){
                // console.log(this.checkbrands.includes(data.name));
                // if (this.checkbrands.length == 0) return true;
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

            sortByHigherPrice: function () {

                return this.products.sort(function (a) {
                    return b.price - a.price;
                })


            },


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

        }
    }
</script>


