<template>
    <div>
        <div v-if="product_id !== ''">
            <!-- attribute_groups table -->
            <form class="col-lg-6 text-right" @submit.prevent="addAttrGroup()" @keydown="form.onKeydown($event)">
                <div class="form-group">
                    <label>گروه کالایی</label>
                    <input type="text" placeholder="گروه کالایی را بنویسید" class="form-control"
                           v-model="attr_group_form.attr_group_name"
                           :class="{'is-danger': attr_group_form.errors.has('attr_group_name')}">
                </div>

                <div class="form-group">
                    <select class="form-control" v-model="attr_group_form.category_id"
                            :class="{'border border-danger': attr_group_form.errors.has('category_id')}">
                        <option value="" selected="selected">انتخاب کنید</option>
                        <template v-for="category in categories">
                            <option :value="category.id">{{ category.name }}</option>
                        </template>
                    </select>
                    <div class="text-danger" v-if="attr_group_form.errors.has('attr_group_name')">
                        {{ attr_group_form.errors.get('attr_group_name') }}
                    </div>
                    <div class="text-danger" v-if="attr_group_form.errors.has('category_id')">
                        {{ attr_group_form.errors.get('category_id') }}
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" :disabled="attr_group_form.busy" class="btn btn-primary" value="اضافه کردن">
                </div>
            </form>

            <!-- attributes table -->
            <form class="col-lg-6 text-right" @submit.prevent="addAttribute()" @keydown="form.onKeydown($event)">
                <div class="form-group">
                    <label>خصوصیت ها</label>
                    <input type="text" placeholder="نام خصوصیت را بنویسید..." class="form-control"
                           v-model="attr_form.name" :class="{'is-danger': attr_form.errors.has('name')}">
                </div>
                <div class="form-group">
                    <select class="form-control" v-model="attr_form.attribute_groups_id"
                            :class="{'border border-danger': attr_form.errors.has('attribute_groups_id')}">
                        <option value="" selected="selected">انتخاب کنید</option>
                        <template v-for="group in attr_groups">
                            <option :value="group.id">{{ group.attr_group_name }}</option>
                        </template>
                    </select>
                </div>
                <div class="text-danger" v-if="attr_form.errors.has('name')">
                    {{ attr_form.errors.get('name') }}
                </div>
                <div class="text-danger" v-if="attr_form.errors.has('attribute_groups_id')">
                    {{ attr_form.errors.get('attribute_groups_id') }}
                </div>

                <div class="form-group">
                    <input type="submit" :disabled="attr_form.busy" class="btn btn-primary" value="اضافه کردن">
                </div>
            </form>

            <!-- attribute_fields table -->
            <form class="col-lg-6 text-right" @submit.prevent="addAttributeField()" @keydown="form.onKeydown($event)">
                <div class="form-group">
                    <label>فیلد</label>
                    <input type="text" placeholder="نام فیلد را بنویسید..." class="form-control"
                           :class="{'is-danger': attr_field_form.errors.has('attr_field_name')}"
                           v-model="attr_field_form.attr_field_name">
                </div>

                <div class="form-group">
                    <select class="form-control" v-model="attr_field_form.attribute_id"
                            :class="{'border border-danger': attr_field_form.errors.has('attribute_id')}">
                        <template v-for="attr in attrs">
                            <option :value="attr.id">{{ attr.name }}</option>
                        </template>
                    </select>
                </div>

                <div class="text-danger" v-if="attr_form.errors.has('attr_field_name')">
                    {{ attr_form.errors.get('attr_field_name') }}
                </div>
                <div class="text-danger" v-if="attr_form.errors.has('attribute_id')">
                    {{ attr_form.errors.get('attribute_id') }}
                </div>

                <div class="form-group">
                    <input type="submit" :disabled="attr_form.busy" class="btn btn-primary" value="اضافه کردن">
                </div>
            </form>

            <!-- brands table -->
            <div class="col-lg-6">
                <label>انتخاب برند</label>
                <div class="form-group">
                    <select class="form-control" v-model="brand_name">
                        <option value="" selected="selected">انتخاب کنید</option>
                    </select>
                </div>

                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="اضافه کردن" @click="addBrand()">
                </div>
            </div>
        </div>

        <div v-else>
            <h4 class="text-center p-3 text-danger">ابتدا کالا را تعریف و ثبت کنید</h4>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['product_id', 'categories'],

        data() {
            return {
                attr_group_form: new Form({
                    attr_group_name: '',
                    category_id: '',
                }),

                attr_form: new Form({
                    name: '',
                    attribute_groups_id: '',
                }),

                attr_field_form: new Form({
                    attr_field_name: '',
                    attribute_id: '',
                }),

                attr_groups: [],
                attrs: [],

                brand_name: '',
                brand_country: '',
                product_brand: '',
            };
        },

        created() {
            this.getAttrGroups();
            this.getAttrs();
        },

        methods: {
            getAttrGroups() {
                axios.get('/api/attribute-groups').then(response => {
                    this.attr_groups = response.data;
                });
            },

            getAttrs() {
                axios.get('/api/attributes').then(response => {
                    this.attrs = response.data;
                });
            },

            addAttrGroup() {
                this.attr_group_form.post('/shoppy/add-attr-group')
                    .then(() => {
                        this.toastSuccess();
                        this.getAttrGroups();
                    })
                    .catch(() => {
                        this.toastError();
                    });
            },

            addAttribute() {
                this.attr_form.post('/shoppy/add-attribute?product_id=' + this.product_id)
                    .then(() => {
                        this.toastSuccess();
                    })
                    .catch(() => {
                        this.toastError();
                    });
            },

            addAttributeField() {
                this.attr_field_form.post('/shoppy/add-attribute-field?product_id=' + this.product_id)
                    .then(() => {
                        this.toastSuccess();
                        this.getAttrs();
                    })
                    .catch(() => {
                        this.toastError();
                    });
            },

            addBrand() {
                let image = $("#brandimage").val();
                axios.post('/admin/addbrand', {
                    name: this.brand_name,
                    country: this.brand_country,
                    image: image,
                    Ename: this.Ename,
                    product_id: this.product_id
                })
                    .then(() => {
                        this.toastSuccess();
                    })
                    .catch(() => {
                        this.toastError();
                    });
            },

            toastSuccess() {
                Toast.fire({
                    title: "با موفقیت ذخیره شد ",
                    type: 'success',
                });
            },

            toastError() {
                Toast.fire({
                    title: "اطلاعات ورودی خود را به دقت بررسی نمایید ",
                    type: 'error',
                });
            }

        }
    }
</script>

