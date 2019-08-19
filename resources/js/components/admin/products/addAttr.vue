<template>
    <div class="col-lg-12">

        <div class="col-lg-6">
            <div class="form-group">
                <label>گروه کالایی</label>
                <input type="text" placeholder="گروه کالایی را بنویسید..." class="form-control"
                       v-model="form.category">
            </div>

            <div class="form-group">
                <select class="form-control" v-model="form.attributegroup_id ">
                    <option value="" selected="selected">انتخاب کنید</option>
                    <template v-for="category in form.categories">
                        <option :value="category.id">{{ category.name }}</option>
                    </template>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="اضافه کردن" @click="addGroup()">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label>خصوصیت ها</label>
                <input type="text" placeholder="نام خصوصیت را بنویسید..." class="form-control"
                       v-model="form.attr_name">
            </div>
            <div class="form-group">
                <select class="form-control" v-model="form.attr_group">
                    <option value="" selected="selected">انتخاب کنید</option>
                    <template v-for="group in form.groups">
                        <option :value="group.id">{{ group.name }}</option>
                    </template>
                </select>
                <input type="text" id="productid1">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-info" value="اضافه کردن" @click="addAttribute()">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label>آیتم</label>
                <input type="text" placeholder="نام آیتم را بنویسید..." class="form-control"
                       v-model="form.attributeField">
            </div>

            <div class="form-group">
                <select class="form-control" v-model="form.itemid">
                    <template v-for="item in form.items">
                        <option :value="item.id">{{ item.name }}</option>
                    </template>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-info" value="اضافه کردن"
                       @click="addAttributeField()">
            </div>
        </div>

        <div class="col-lg-6">
            <label>انتخاب برند</label>
            <div class="form-group">
                <select class="form-control" v-model="form.brandName">
                    <option value="" selected="selected">انتخاب کنید</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-info" value="اضافه کردن" @click="addBrand()">
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    groupName: '',
                    category: '',
                    categories: [],
                    attr_name: '',
                    attr_group: '',
                    productid: '',
                    attributeField: '',
                    groups: [],
                    items: [],
                    country: '',
                    brandName: '',
                    itemid: '',
                    productBrand: '',
                })
            };
        },

        methods: {
            addGroup(){
                axios.post('/admin/atrrgroup', {
                    name: this.form.groupName,
                    id: this.attributegroup_id,
                }).then(response => {
                    swal("با موفقیت ذخیره شد ");
                }, response => {
                    this.error = 1;
                    console.log("error");
                });
            },


            addAttribute() {
                let productid = $("#productid1").val();
                axios.post('/admin/attribute', {
                    name: this.for.attr_name,
                    id: this.form.attr_group,
                    productid: this.form.productid
                }).then(response => {
                    swal("با موفقیت ذخیره شد ");
                }, response => {
                    this.error = 1;
                    console.log("error");
                });
            },
            addBrand() {
                let image = $("#brandimage").val();
                axios.post('/admin/addbrand', {
                    name: this.form.brandName,
                    country: this.form.country,
                    Ename: this.Ename,
                    product_id: this.form.productBrand,
                    image: image
                }).then(response => {
                    swal("با موفقیت ذخیره شد ");
                }, response => {
                    this.error = 1;
                    console.log("error");
                });
            },

            addAttributeField() {
                let productid = $("#productid1").val();
                axios.post('/admin/attributeitem', {
                    attributeitem: this.form.attributeField,
                    itemid: this.form.itemid,
                    productid: productid

                }).then(response => {
                    swal("با موفقیت ذخیره شد ");
                }, response => {
                    this.error = 1;
                    console.log("error");
                });


            },


        }
    }
</script>

