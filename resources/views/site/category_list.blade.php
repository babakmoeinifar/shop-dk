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
                    <input type="text" class="form-control" placeholder="جستجو کنید..."
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


        <div class="col-lg-10" style="display: inline-block;margin-top:3%;max-width: 81%;text-align: right;">
            {{--            {{App\Helper::CategoryRoot($categoryId)}}--}}
            <div class="breadcrumb mb-0 pb-0" style="background-color: #e9ecef00">
                    <a class='category' href='/'>دیجی کالا</a>&nbsp;/&nbsp;
                    <a class='category' href=""> {{ $main_category->name }} </a>&nbsp;/&nbsp;
                <a class='category text-secondary'>{{ $this_category->name }} </a>
            </div> <!--END BREADCRUMB-->
        </div>


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
                        @foreach($products as $product)
                            <li class="col-lg-3 col-md-4 col-sm-6 col-12 product_price mb-2" >
                                <a href="">
                                    <img src="{{ asset($product->image) }}" class="img-fluid row mx-auto rounded" style="height: 230px;margin-top: 10px">
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
