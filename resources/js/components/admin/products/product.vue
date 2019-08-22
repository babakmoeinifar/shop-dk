<template>
    <div class="card " style="margin-top: 25px;">
        <div class="card-header bg-success " style="color:#fff;font-weight:bold;font-size: 14px;text-align: center; ">
            اضافه کردن کالا به فروشگاه
        </div>

        <div class="card-body">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#add" role="tab" data-toggle="tab" style="font-size: 12px;">اضافه
                        کردن کالا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#uploadpic" role="tab" data-toggle="tab" style="font-size: 12px;">آپلود
                        عکس اضافی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#attr" role="tab" data-toggle="tab" style="font-size: 12px;">اضافه کردن
                        خصوصیت ها</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="add">

<!--                    <div class="form-group">-->
<!--                        <label for="oneupload">آپلود عکس اصلی</label>-->
<!--                        <form method="post" action="/shoppy/add-image-product" enctype="multipart/form-data"-->
<!--                              class="dropzone" id="oneupload">-->
<!--                            <input type="hidden" :value="csrf_token" name="_token">-->
<!--                        </form>-->
<!--                    </div>-->

                    <form @submit.prevent="add()"
                          @keydown="form.onKeydown($event)">

<!--                        <input type="hidden" v-model="form.imageurl" name="image">-->

                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">تصویر محصول</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="image" name="image"
                                     @change="updatePhoto">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="name">نام کالا
                                        <span class="text-danger font-weight-bold"> * </span>
                                    </label>
                                    <input id="name" type="text" class="form-control"
                                           :class="{'is-danger': form.errors.has('name')}" v-model="form.name">
                                    <div class="text-danger" v-if="form.errors.has('name')">
                                        {{ form.errors.get('name') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="code">کد</label>
                                    <input id="code" type="text" class="form-control"
                                           :class="{'is-danger': form.errors.has('code')}" v-model="form.code">
                                    <div class="text-danger" v-if="form.errors.has('code')">
                                        {{ form.errors.get('code') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="price">قیمت
                                        <span class="text-danger font-weight-bold"> * </span>
                                    </label>
                                    <input id="price" type="text" class="form-control"
                                           :class="{'is-danger': form.errors.has('price')}" v-model="form.price">
                                    <div class="text-danger" v-if="form.errors.has('price')">
                                        {{ form.errors.get('price') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3 form-group">
                                <label for="stock">تعداد در انبار
                                    <span class="text-danger font-weight-bold"> * </span>
                                </label>
                                <input type="number" class="form-control" id="stock" min="0"
                                       :class="{'is-danger': form.errors.has('stock')}" v-model="form.stock">
                                <div class="text-danger" v-if="form.errors.has('stock')">
                                    {{ form.errors.get('stock') }}
                                </div>
                            </div>

                            <div class="col-lg-5 form-group">
                                <label for="category">انتخاب دسته کالا
                                    <span class="text-danger font-weight-bold"> * </span>
                                </label>
                                <select id="category" class="form-control" name="category_id"
                                        :class="{'border-danger': form.errors.has('category_id')}"
                                        v-model="form.category_id">
                                    <option>یک دسته بندی را انتخاب نمایید</option>
                                    <template v-for="category in categories">
                                        <option :value="category.id">{{ category.name }}</option>
                                    </template>
                                </select>
                                <div class="text-danger" v-if="form.errors.has('category_id')">
                                    {{ form.errors.get('category_id') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="meta_keywords">کلمات
                                    کلیدی</label>
                                <input type="text" class="form-control" id="meta_keywords" v-model="form.meta_keywords"
                                       placeholder="مثل: شلوار، موبایل، ...">
                            </div>

                        </div>

                        <div class="col-lg-12 form-group text-right">
                            <p>توضیحات کالا </p>
                            <div id="toolbar-container"></div>
                            <div id="editor" class="border" style="height: 250px"></div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <button type="button" class="btn btn-success" @click="add()">اضافه کردن کالا
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </form>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="uploadpic">
                    <div class="col-lg-12">
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="myDropzone">آپلود عکس های اضافی در صفحه کالا</label>-->
                        <!--                            <form method="post" action="/" enctype="multipart/form-data"-->
                        <!--                                  class="dropzone" id="myDropzone">-->
                        <!--                                <input type="hidden" id="productid" name="id">-->
                        <!--                            </form>-->
                        <!--                        </div>-->
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="attr">
                    <add-attr></add-attr>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['csrf_token'],

        data() {
            return {
                form: new Form({
                    category_id: '',
                    name: '',
                    price: '',
                    stock: '',
                    code: '',
                    desc: $("#editor").text(),
                    meta_keywords: "",
                    image: "",
                    // imageurl: 'test',

                    attributegroup_id: '',
                    itemid: '',
                }),
                categories: [],


            };
        },

        created() {
            this.getCategories();
        },

        methods: {
            updatePhoto(el) {
                /*web base64*/
                let file = el.target.files[0];
                let reader = new FileReader();
                if (file['size'] < 15111775) {
                    reader.onloadend = (file) => {
                        this.form.image = reader.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'حجم زیاد',
                        text: 'حجم عکس انتخابی باید کمتر از 15 مگابایت باشد',
                        confirmButtonText: 'باشه'
                    })
                }
            },

            add() {
                this.form.post('/shoppy/products').then(() => {
                    Toast.fire({
                        title: "با موفقیت ذخیره شد ",
                        type: 'success',
                        // }).then(() => {
                        //     window.location.href = '/shoppy/products';
                    });
                })
                    .catch(() => {
                        this.error = 1;
                        Toast.fire({
                            title: "اطلاعات ورودی خود را به دقت بررسی نمایید ",
                            type: 'error',
                        });
                    });
            },

            getCategories() {
                axios.get('/shoppy/categories').then(response => {
                    this.categories = response.data;
                });
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