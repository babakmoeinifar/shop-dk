<template>
    <div>
        <form @submit.prevent="form.id ? updateCategory() : addCategory()"
              @keydown="form.onKeydown($event)">
            <div class="row mt-3">
                <div class="form-group col-md-6">
                    <label for="name" class="pb-2">نام
                    <span class="text-danger font-weight-bold"> * </span>
                    </label>
                    <input type="text" :class="{'is-danger': form.errors.has('name')}"
                           id="name" name="name" v-model="form.name" class="form-control">
                    <div class="text-danger" v-if="form.errors.has('name')">
                        {{ form.errors.get('name') }}
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="slug" class="pb-2">نامک
                        <small>(انگلیسی بدون کاراکترهای غیرمجاز)</small>
                        <span class="text-danger font-weight-bold"> * </span>
                    </label>
                    <input type="text" :class="{ 'is-danger': form.errors.has('slug') }"
                           id="slug" name="slug" v-model="form.slug" class="form-control">
                    <div class="text-danger" v-if="form.errors.has('slug')">
                        {{ form.errors.get('slug') }}
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="form-group col-md-6">
                    <label for="parent_id" class="pb-2">دسته مادر
                        <span class="text-danger font-weight-bold"> * </span>
                    </label>
                    <select type="text" :class="{ 'is-danger': form.errors.has('parent_id') }"
                            id="parent_id" name="parent_id" v-model="form.parent_id" class="form-control">
                        <option value="0">اصلی</option>
                        <template v-for="category in form.categories">
                            <option :value="category.id">{{ category.name }}</option>
                        </template>
                    </select>
                    <div class="text-danger" v-if="form.errors.has('parent_id')">
                        {{ form.errors.get('parent_id') }}
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="is_active" class="pb-2">وضعیت
                        <span class="text-danger font-weight-bold"> * </span>
                    </label>

                    <select name="is_active" id="is_active"
                            :class="{ 'is-danger': form.errors.has('is_active') }"
                            v-model="form.is_active" class="form-control">
                        <option value="1">فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                    <div class="text-danger" v-if="form.errors.has('is_active')">
                        {{ form.errors.get('is_active') }}
                    </div>
                </div>
            </div>

            <div class="row border p-3 mb-3">
                <div class="form-group col-md-4">
                    <label for="meta_title" class="pb-2">عنوان
                        سئو</label>
                    <input type="text" class="form-control" id="meta_title" v-model="form.meta_title">
                </div>

                <div class="form-group col-md-4">
                    <label for="meta_description" class="pb-2">متن
                        سئو</label>
                    <input type="text" class="form-control" id="meta_description"
                           v-model="form.meta_description">
                </div>

                <div class="form-group col-md-4">
                    <label for="meta_keywords" class="pb-2">کلمات
                        کلیدی</label>
                    <input type="text" class="form-control" id="meta_keywords" v-model="form.meta_keywords"
                           placeholder="مثل: شلوار، موبایل، ...">
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
                    parent_id: "",
                    slug: "",
                    is_active: 1,
                    meta_title: "",
                    meta_description: "",
                    meta_keywords: "",
                    id: "",
                    categories: [],
                    catSlugUpdate: ''
                })
            };
        },

        created() {
            this.getvaluecayegory();
            this.getCategories();
        },

        methods: {
            addCategory() {
                // let image = $("#image1").val();
                // alert(image);

                this.form.post('/shoppy/categories', {

                    name: this.form.name,
                    parent_id: this.form.parent_id,
                    is_active: this.form.is_active,
                    slug: this.form.slug,
                    meta_title: this.form.meta_title,
                    meta_description: this.form.meta_description,
                    meta_keywords: this.form.meta_keywords,
                    // image: image
                })
                    .then(() => {
                        Toast.fire({
                            title: "با موفقیت ذخیره شد ",
                            type: 'success',
                        }).then(() => {
                            window.location.href = '/shoppy/categories';
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

            updateCategory() {
                this.form.put("/shoppy/categories/" + this.form.catSlugUpdate)
                    .then(() => {
                        Toast.fire({
                            title: "با موفقیت ویرایش شد ",
                            type: 'success',
                        }).then(() => {
                            window.location.href = '/shoppy/categories';
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

            getvaluecayegory() {
                axios.get(window.location.href).then(response => {
                    this.form.id = response.data.id;
                    this.form.name = response.data.name;
                    this.form.slug = response.data.slug;
                    this.form.catSlugUpdate = response.data.slug;
                    this.form.parent_id = response.data.parent_id;
                    this.form.is_active = response.data.is_active;
                    this.form.meta_title = response.data.meta_title;
                    this.form.meta_keywords = response.data.meta_keywords;
                    this.form.meta_description = response.data.meta_description;
                });
            },

            getCategories() {
                axios.get('/shoppy/categories').then(response => {
                    this.form.categories = response.data;
                });
            },
        }
    }
</script>