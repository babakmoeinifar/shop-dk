@extends('layouts.site.master')
@section('content')
    <div class="col-lg-12">

        <div class="col-lg-3" style="top:2%;position: absolute;max-width: 19.2%;">
            <div class="card" style="min-height:180px;">
                <div class="card-header"
                     style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 13px;">
                    دسته بندی نتایج
                </div>
                <div class="card-body">
                    {{--                    {{App\Helper::category($categoryId)}}--}}
                    <ul class='categories'>
                        <li><i class='fa fa-angle-left'></i><a>1</a></li>
                        <li style='padding: 10px'><i class='fa fa-angle-down'></i><a href=''>2</a></li>
                        <li style='padding-right: 25px;font-weight: bold;'><i class='fa fa-angle-down'></i><a>3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-3" style="top: 16%;position: absolute;max-width: 19.2%;">
            <div class="card" style="min-height:100px;">
                <div class="card-header"
                     style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 13px;">
                    جستجو در نتایج :
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="نام محصول یا برند خود را جستجو کنید"
                           style="font-size: 11px;text-align: left;">
                    <i class="fa fa-search" style="float: right;margin-top: -23px;margin-right: 6px;"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3" style="top: 2%;position: absolute;max-width: 19.2%;">
            <div class="card" style="min-height:180px;">
                <div class="card-header"
                     style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 13px;">
                    دسته بندی نتایج
                </div>
                <div class="card-body">
                    {{--                    {{App\Helper::category($categoryId)}}--}}
                    <ul class='categories'>
                        <li><i class='fa fa-angle-left'></i><a>1</a></li>
                        <li style='padding: 10px'><i class='fa fa-angle-down'></i><a href=''>2</a></li>
                        <li style='padding-right: 25px;font-weight: bold;'><i class='fa fa-angle-down'></i><a>3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-lg-10" style="display: inline-block;margin-top:1%;max-width: 81%;text-align: right;">
            {{--            {{App\Helper::CategoryRoot($categoryId)}}--}}
            <a class='category' href='/'>فروشگاه اینترنتی دیجی کالا</a> /
            <a class='category' href='/search/'>1 </a> /
            <a class='category' href='/search/'>2 </a> /
            <a class='category' href='/search/'>3 </a>
        </div>


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
                <div id="ListProduct" style="position: absolute;top: 5%;">
                    <ul class="col-lg-12" style="padding-left:0px !important; padding-right: 0px !important;"
                        id="products">
                        @foreach($products as $product)
                            <li class="col-lg-3 product_price" style="float: right;width: 1000px;">
                                <a href="">
                                    <img src="{{ asset($product->image) }}" height="230px" >
                                    <span class="text">{{ $product->name}}</span>
                                    <span class="price">{{ $product->price}}تومان</span>
                                    <span><i class="fa fa-star mt-3 float-left text-secondary"> 3.4 </i></span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
