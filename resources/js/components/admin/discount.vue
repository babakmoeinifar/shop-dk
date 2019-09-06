<template>
    <div>
        <form @submit.prevent="form.id ? update() : add()"
              @keydown="form.onKeydown($event)">

            <div class="row mt-3">
                <div class="form-group col-md-4">
                    <label for="name" class="pb-2">نام
                        <span class="text-danger font-weight-bold"> * </span>
                    </label>
                    <input type="text" :class="{'is-danger': form.errors.has('name')}"
                           id="name" name="name" v-model="form.name" class="form-control">
                    <div class="text-danger" v-if="form.errors.has('name')">
                        {{ form.errors.get('name') }}
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="value" class="pb-2">میزان تخفیف به درصد
                        <span class="text-danger font-weight-bold"> * </span>
                    </label>
                    <input type="number" :class="{ 'is-danger': form.errors.has('value') }"
                           id="value" name="value" v-model="form.value" class="form-control">
                    <div class="text-danger" v-if="form.errors.has('value')">
                        {{ form.errors.get('value') }}
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="code" class="pb-2">کد تخفیف
                        <span class="text-danger font-weight-bold"> * </span>
                    </label>
                    <input type="text" :class="{ 'is-danger': form.errors.has('code') }"
                           id="code" name="code" v-model="form.code" class="form-control">
                    <div class="text-danger" v-if="form.errors.has('code')">
                        {{ form.errors.get('code') }}
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="begin_date" class="pb-2">تاریخ شروع تخفیف
                        <span class="text-danger font-weight-bold"> * </span>
                    </label>
                    <input type="text" :class="{'is-danger': form.errors.has('begin_date')}"
                           id="begin_date" name="begin_date" v-model="form.begin_date" class="form-control">
                    <div class="text-danger" v-if="form.errors.has('begin_date')">
                        {{ form.errors.get('begin_date') }}
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="end_date" class="pb-2">تاریخ پایان تخفیف
                        <span class="text-danger font-weight-bold"> * </span>
                    </label>
                    <input type="number" :class="{ 'is-danger': form.errors.has('end_date') }"
                           id="end_date" name="end_date" v-model="form.end_date" class="form-control">
                    <div class="text-danger" v-if="form.errors.has('end_date')">
                        {{ form.errors.get('end_date') }}
                    </div>
                </div>
            </div>


                <div class="form-group col-md-12">
                    <label for="product_id" class="pb-2">محصول مورد نظر
                        <span class="text-danger font-weight-bold"> * </span>
                    </label>
                    <select type="text" :class="{ 'is-danger': form.errors.has('product_id') }"
                            id="product_id" name="product_id" v-model="form.product_id" class="form-control">
                        <option value="0">اصلی</option>
                        <template v-for="product in products">
                            <option :value="product.id">{{ product.name }}</option>
                        </template>
                    </select>
                    <div class="text-danger" v-if="form.errors.has('product_id')">
                        {{ form.errors.get('product_id') }}
                    </div>
                </div>


            <div class="mb-4">
                <button :disabled="form.busy" type="submit"
                        class="btn btn-success font-20" v-text="buttontext"></button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['buttontext'],

        data() {
            return {
                form: new Form({
                    name: "",
                    value: "",
                    code: "",
                    begin_date: "",
                    end_date: "",
                }),
                products: [],

            };
        },

        created() {
            this.getProducts();
        },

        methods: {
            add() {
                this.form.post('/shoppy/discounts')
                    .then(() => {
                        Toast.fire({
                            title: "با موفقیت ذخیره شد ",
                            type: 'success',
                        }).then(() => {
                            window.location.href = '/shoppy/discounts';
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

            update() {
                this.form.put("/shoppy/discounts/")
                    .then(() => {
                        Toast.fire({
                            title: "با موفقیت ویرایش شد ",
                            type: 'success',
                        }).then(() => {
                            window.location.href = '/shoppy/discounts';
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

            getProducts() {
                axios.get('/shoppy/products').then(response => {
                    this.categories = response.data;
                });
            },
        }
    }
</script>