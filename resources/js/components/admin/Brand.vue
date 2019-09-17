<template>
    <div class="card " style="margin-top: 25px;">

        <div class="card-header bg-primary " style="color:#fff;font-weight:bold;font-size: 14px;text-align: center; ">
            ثبت برند برای کالا
        </div>

        <div class="card-body">
            <div class="col-lg-6">
                <form @submit.prevent="add()" @keydown="form.onKeydown($event)">

                    <div class="form-group">
                        <label>نام برند کالای مورد نظر</label>
                        <input type="text" class="form-control" value="" placeholder="نام برند کالای مورد نظر"
                               v-model="form.name" :class="{'border border-danger': form.errors.has('name')}">
                        <div class="text-danger" v-if="form.errors.has('name')">
                            {{ form.errors.get('name') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label>نام انگلیسی برند کالای مورد نظر</label>
                        <input type="text" class="form-control" value="" placeholder="نام انگلیسی برند کالای مورد نظر"
                               v-model="form.en_name" :class="{'border border-danger': form.errors.has('en_name')}">
                        <div class="text-danger" v-if="form.errors.has('en_name')">
                            {{ form.errors.get('en_name') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label>کشور </label>
                        <input type="text" class="form-control" value="" placeholder="کشور "
                               v-model="form.country" :class="{'border border-danger': form.errors.has('country')}">
                        <div class="text-danger" v-if="form.errors.has('country')">
                            {{ form.errors.get('country') }}
                        </div>
                    </div>


                    <div class="form-group" :class="{'border border-danger': form.errors.has('image')}">
                        <label for="image" class="control-label">تصویر برند</label>
                        <div class="text-danger" v-if="form.errors.has('image')">
                            {{ form.errors.get('image') }}
                        </div>
                        <input type="file" class="dropify" data-show-loader="true" id="image"
                               data-max-file-size="15M" data-allowed-file-extensions="jpg png jpeg gif"
                               name="image" @change="updatePhoto">
                    </div>

                    <div class="form-group">
                        <label>دسته مورد نظر</label>
                        <select class="form-control" v-model="form.category_id" @change="fetchProducts()"
                                :class="{'border border-danger': form.errors.has('category_id')}">
                            <option value="" disabled>یک دسته را انتخاب نمایید</option>
                            <template v-for="category in categories">
                                <option :value="category.id">{{category.name}}</option>
                            </template>
                        </select>
                        <div class="text-danger" v-if="form.errors.has('category_id')">
                            {{ form.errors.get('category_id') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label>محصول مورد نظر</label>
                        <select class="form-control" v-model="form.product_id"
                                :class="{'border border-danger': form.errors.has('product_id')}">
                            <option value="" disabled>یک کالا را انتخاب نمایید</option>
                            <template v-for="product in products">
                                <option :value="product.id">{{product.pro_name}}</option>
                            </template>
                        </select>
                        <div class="text-danger" v-if="form.errors.has('product_id')">
                            {{ form.errors.get('product_id') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-danger" @click="add()">ثبت برند محصول</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                form: new Form({
                    name: "",
                    en_name: "",
                    country: "",
                    product_id: "",
                    category_id: "",
                    image: "",
                    id: "",
                }),
                products: [],
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
                this.form.post('/shoppy/brands').then((response) => {
                    this.form.id = response.data.id;
                    Toast.fire({
                        title: "با موفقیت ذخیره شد ",
                        type: 'success',
                        }).then(() => {
                            window.location.href = '/shoppy/brands';
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

            fetchProducts() {
                axios.get('/api/product-by-category/' + this.form.category_id).then(response => {
                    this.products = response.data;
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
