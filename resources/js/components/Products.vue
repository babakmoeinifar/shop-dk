<template>
    <div class="col-lg-10" style="display: inline-block;margin-top:1%;max-width: 81%;">
        <div class="card" style="min-height:1300px; ">
            <div class="card-header" style="background-color: #fff !important; border-bottom: none;">
                <ul class="shopheader">
                    <li>
                        مرتب سازی بر اساس:
                    </li>
                    <li>جدید ترین</li>
                    <li @click="sortByLowPrice">ارزان ترین</li>
                    <li @click="sortByHigherPrice">گرانترین</li>
                </ul>
            </div>
            <div class="card-body"></div>
            @{{produt}}
            <div id="ListProduct" style="position: absolute;top: 5%;">
                <ul class="col-lg-12" style="padding-left:0px !important; padding-right: 0px !important;"
                    id="products">
                    <li :data-price="products.price" class="col-lg-3 product_price"
                        style="float: right;width: 1000px;" v-for="products in product"
                        v-if="products.category_id == <?php echo $categoryId ?> && filterbrands(products) && status(products) &&filterattribute(products) ">
                        <a :href="'/product/'+products.category_id+'/'+products.PID">
                            <img :src="/imagepro/+products.productimage" height="230px">
                            <span class="text">@{{products.productname}}</span>
                            <span class="price">@{{products.price}}تومان</span>
                            <span>@{{products.name}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <pagination v-if="pagination.last_page >1 " :pagination="pagination" offset="5"
                        @paginate="ShowProduct()"></pagination>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>


