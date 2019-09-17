<template>
    <div class="card " style="margin-top: 25px;">
        <div class="card-header bg-success " style="color:#fff;font-weight:bold;font-size: 14px;text-align: center; ">
            اضافه کردن کالا به فروشگاه
        </div>

        <div class="card-body">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#add" role="tab" data-toggle="tab" style="font-size: 12px;">
                        <p>
                            <span class="badge badge-primary">1</span>
                            اضافه کردن کالا
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#uploadpic" role="tab" data-toggle="tab" style="font-size: 12px;">
                        <p>
                            <span class="badge badge-primary">2</span>
                            آپلود عکس اضافی
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#attr" role="tab" data-toggle="tab" style="font-size: 12px;">
                        <p>
                            <span class="badge badge-primary">3</span>
                            اضافه کردن خصوصیت ها
                        </p>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="add">

                    <form @submit.prevent="add()" @keydown="form.onKeydown($event)">

                        <div class="form-group" :class="{'border border-danger': form.errors.has('pro_image')}">
                            <label for="pro_image" class="col-sm-2 control-label">تصویر محصول</label>
                            <div class="text-danger" v-if="form.errors.has('pro_image')">
                                {{ form.errors.get('pro_image') }}
                            </div>
                            <input type="file" class="dropify" data-show-loader="true" id="pro_image"
                                   data-max-file-size="15M" data-allowed-file-extensions="jpg png jpeg gif"
                                   name="pro_image" @change="updatePhoto">
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-4 form-group">
                                <label for="pro_name">نام کالا
                                    <span class="text-danger font-weight-bold"> * </span>
                                </label>
                                <input id="pro_name" type="text" class="form-control"
                                       :class="{'is-danger': form.errors.has('pro_name')}" v-model="form.pro_name">
                                <div class="text-danger" v-if="form.errors.has('pro_name')">
                                    {{ form.errors.get('pro_name') }}
                                </div>
                            </div>

                            <div class="col-lg-2 form-group">
                                <label for="stock">موجودی انبار
                                    <span class="text-danger font-weight-bold"> * </span>
                                </label>
                                <input type="number" class="form-control" id="stock" min="0"
                                       :class="{'is-danger': form.errors.has('stock')}" v-model="form.stock">
                                <div class="text-danger small" v-if="form.errors.has('stock')">
                                    {{ form.errors.get('stock') }}
                                </div>
                            </div>

                            <div class="col-lg-2 form-group">
                                <label for="unit">واحد شمارش
                                    <span class="text-danger font-weight-bold"> * </span>
                                </label>
                                <input type="text" class="form-control" id="unit"
                                       :class="{'is-danger': form.errors.has('unit')}" v-model="form.unit">
                                <div class="text-danger small" v-if="form.errors.has('unit')">
                                    {{ form.errors.get('unit') }}
                                </div>
                            </div>

                            <div class="col-lg-4 form-group">
                                <label for="price">قیمت (تومان)
                                    <span class="text-danger font-weight-bold"> * </span>
                                </label>
                                <input id="price" type="number" min="0" class="form-control"
                                       :class="{'is-danger': form.errors.has('price')}" v-model="form.price">
                                <div class="text-danger" v-if="form.errors.has('price')">
                                    {{ form.errors.get('price') }}
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">

                            <div class="col-lg-4 form-group">
                                <label for="category">انتخاب دسته کالا
                                    <span class="text-danger font-weight-bold"> * </span>
                                </label>
                                <select id="category" class="form-control" name="category_id"
                                        :class="{'border-danger': form.errors.has('category_id')}"
                                        v-model="form.category_id">
                                    <option value="" disabled>یک دسته بندی را انتخاب نمایید</option>
                                    <template v-for="category in categories">
                                        <option :value="category.id">{{ category.name }}</option>
                                    </template>
                                </select>
                                <div class="text-danger" v-if="form.errors.has('category_id')">
                                    {{ form.errors.get('category_id') }}
                                </div>
                            </div>

                            <div class="col-lg-2 form-group">
                                <label for="country">کشور سازنده
                                    <span class="text-danger font-weight-bold"> * </span>
                                </label>
                                <input type="text" class="form-control" id="country"
                                       :class="{'is-danger': form.errors.has('country')}" v-model="form.country">
                                <div class="text-danger small" v-if="form.errors.has('country')">
                                    {{ form.errors.get('country') }}
                                </div>
                            </div>

                            <div class="col-lg-2 form-group">
                                <label for="code">کد محصول</label>
                                <input id="code" type="text" class="form-control"
                                       :class="{'is-danger': form.errors.has('code')}" v-model="form.code">
                                <div class="text-danger" v-if="form.errors.has('code')">
                                    {{ form.errors.get('code') }}
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
                            <button :disabled="form.busy" type="submit"
                                    class="btn btn-success" @click="add()">اضافه کردن کالا
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </form>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="uploadpic">
                    <div class="col-lg-12">
                        <h4 v-if="product_id === ''" class="text-center p-3 text-danger">ابتدا کالا را تعریف و ثبت کنید</h4>
                        <div class="form-group">
                            <label for="myDropzone" class="p-3">آپلود عکس های اضافی در صفحه کالا</label>
                            <form method="post" action="/shoppy/add-images-product" enctype="multipart/form-data"
                                   class="dropzone" id="myDropzone">
                                <input type="hidden" v-model="product_id" name="id">
                                <input type="hidden" :value="csrf_token" name="_token">
                            </form>
                        </div>
                    </div>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="attr">
                    <add-attr :product_id="product_id" :categories="categories"></add-attr>
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
                    pro_name: '',
                    price: '',
                    stock: '',
                    country: '',
                    unit: '',
                    code: '',
                    desc: '',
                    meta_keywords: "",
                    pro_image: "",
                }),
                product_id: "",
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
                if (file['size'] < 20111775) {
                    reader.onloadend = (file) => {
                        this.form.pro_image = reader.result;
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
                this.form.desc = $("#editor").text();
                this.form.post('/shoppy/products').then((response) => {
                    this.product_id = response.data.id;
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

        }
    }
</script>
