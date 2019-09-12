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
                    <ul class='categories'>
                        @if($zero_category)
                            <li><i class='fa fa-angle-left'></i><a>{{ $zero_category->name }}</a></li>
                        @endif
                        @if($main_category)
                            <li style='padding: 10px'><i class='fa fa-angle-down'></i><a
                                    href='/search/{{ $main_category->id }}'>{{ $main_category->name }}</a></li>
                        @endif
                        <li style='padding-right: 25px;font-weight: bold;'>
                            <i class='fa fa-angle-down'></i><a>{{ $this_category->name }}</a>
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

        <div class="col-lg-3" style="top: 25%;position: absolute;max-width: 19.2%;">
            <div class="card" style="min-height:280px;">
                <div class="card-header"
                     style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 13px;">
                    برند ها
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="نام برند را جستجو کنید"
                           style="font-size: 11px;text-align: left;height: 40px;">
                    <i class="fa fa-search" style="float: right;margin-top: -30px;margin-right: 6px;"></i>
                    <div class="brandsearch">
                        <ul>
                            @foreach($brands as $brand)
                                <li>
                                    <input type="checkbox" @click="filterbrands" :value="{{$brand->name}}"
                                           class="form-control" style="margin-left: 19px;">{{$brand->name}}
                                    <span style="margin-right: 129px;">{{$brand->name}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3" style="top: 46%;position: absolute;max-width: 19.2%;">
            <div class="card" style="min-height:29px;">
                <label class="switch">
                    <input type="checkbox" id="check_status" @click="status()" v-model="check_status">
                    <span class="slider round"></span>
                </label>
                <p style="margin-top: -31px;text-align: right;margin-right: 94px;font-size: 13px;">فقط کالاهای
                    موجود </p>
            </div>
        </div>

        <div class="col-lg-3" style="top: 50%;position: absolute;max-width: 19.2%;">
            <div class="card" style="min-height:280px;">
                <div class="card-header"
                     style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 14px;">
                    محدوده قیمت مورد نظر
                </div>
                <div class="card-body">
                    <div class="brandsearch">
                        <div id="slider-range"></div>
                        <p>
                            <span class="max-price"><span>از</span></span>
                            <span class="min-price"><span>از</span></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-10" style="display: inline-block;margin-top:3%;max-width: 81%;text-align: right;">
            <div class="breadcrumb mb-0 pb-0" style="background-color: #e9ecef00">
                <a class='category' href='/'>فروشگاه اینترنتی دیجی کالا</a><span
                    style="color: #d1d1d1">&nbsp;/&nbsp;</span>
                @if($zero_category)
                    <a class='category' href="/search/{{$zero_category->id}}"> {{ $zero_category->name }} </a><span
                        style="color: #d1d1d1">&nbsp;/&nbsp;</span>
                @endif
                @if($main_category)
                    <a class='category' href="/search/{{$main_category->id}}"> {{ $main_category->name }} </a><span
                        style="color: #d1d1d1">&nbsp;/&nbsp;</span>
                @endif
                <a class='category font-weight-bold' style="color: #454545">{{ $this_category->name }} </a>
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
                            <li class="col-lg-3 col-md-4 col-sm-6 col-12 product_price mb-2">
                                <a href="">
                                    <img src="{{ asset($product->image) }}" class="img-fluid row mx-auto rounded"
                                         style="margin-top: 10px">
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

            @foreach($attrs as $attr)
                <div class="col-lg-3" id="{{ $attr->id }}">
                <div class="card">
                    <div class="card-header"
                         style="background-color:#fff;height: 37px; text-align: right; padding-right: 8px; padding-top: 5px; font-weight: bold; font-size: 13px;"
                         data-toggle="collapse" :data-target="{{ $attr->id }}">
                        {{ $attr->name}}
                    </div>
                    <div class="card-body" :id="'demo'+index" style="min-height:280px;">
                        <ul class="attributeitem">
                            @foreach($attributeFields as $attrField)
                                <li>
                                @if($attrField->attribute_id == $attr->id)
                                        <input type="checkbox" name=""
                                               v-model="checkattribute"
                                               :value="{{$attrField->attr_field_name}}"
                                               @click="filterattribute()"> {{$attrField->attr_field_name}}
                                    @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

    </div>
@endsection
