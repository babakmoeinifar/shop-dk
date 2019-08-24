@extends('layouts.site.master')
<?php
use App\Helper;
?>

@section('content')

    <!----------slider-------------->
    <div class="col-lg-12">
        <div class="carousel slide carousel-fade" id="myCarousel" data-ride="carousel" style="margin-top: 15px;">
            <ol class="carousel-indicators" id="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/slides/slide1.jpeg"
                         style="width: 100%; margin-left: 10px;height: 235px;border-radius: 8px;">
                </div>

                <div class="carousel-item">
                    <img src="/images/slides/slide2.jpeg"
                         style="width:100%; margin-left: 10px;height: 235px;border-radius: 8px;">
                </div>
            </div>

            <a class="left carousel-control-prev" href="#myCarousel" data-slide="prev">
                <span class="carousel-control-prev-icon" style="font-size: 48px;"></span>
            </a>
            <a class="left carousel-control-next" href="#myCarousel" data-slide="next">
                <span class="carousel-control-next-icon" style="font-size: 48px;"></span>
            </a>

        </div>
    </div>

    <!------------------ SLIDER ---------------->
    <div class="col-lg-12" style="margin-top: 31px; position: relative;">
        <h5 style="font-size: 11px;text-align: right;">لوازم جانبی گوشی موبایل</h5>
        <div id="list_carousel3" class="list_carousel" style="overflow:hidden;">
            <ul id="foo4">
                <li>
                    <img src="/images/products/g1.jpg" width="110px" height="80px">
                    <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                    <span class="price">120000تومان</span>
                </li>
                <li>
                    <img src="/images/products/g2.jpg" width="110px" height="80px">
                    <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                    <span class="price">120000تومان</span>
                </li>
                <li>
                    <img src="/images/products/g3.jpg" width="110px" height="80px">
                    <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                    <span class="price">120000تومان</span>
                </li>
                <li>
                    <img src="/images/products/g4.jpg" width="110px" height="80px">
                    <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                    <span class="price">120000تومان</span>
                </li>
                <li>
                    <img src="/images/products/g5.jpg" width="110px" height="80px">
                    <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                    <span class="price">120000تومان</span>
                </li>
                <li>
                    <img src="/images/products/g6.jpg" width="110px" height="80px">
                    <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                    <span class="price">120000تومان</span>
                </li>
            </ul>
            <div class="clearfix"></div>

        </div>

    </div>

    <div class="col-lg-9" style="float: left; margin-top: 15px; left: 2%;max-width: 77% !important;">
        <div class="card carousel slide carousel-fade" id="card" data-ride="carousel">
            <ul class="carousel-indicators" id="pager">
                {{$i=1}}
                @foreach($product as $products)
                    @foreach($discount as $discounts)
                        @if($products->id == $discounts->product_id)
                            <li data-target="#card" data-slide-to="{{$i++}}">
                                <a href="javascript:;" style="">
                                    <span>{{$products->name}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>

            <div class="discount_bar"></div>

            <div class="carousel-inner">
                <div class="carousel-item active" id="carousel-item"></div>

                @foreach($product as $products)
                    @foreach($discount as $discounts)
                        @if($products->id == $discounts->product_id)
                            <div class="carousel-item " id="carousel-item">
                                <img src="{{$products->image}}">
                                <div class="carousel-price">
                                    <span>{{$products->price}}</span>
                                    <h4>{{$products->price * $discounts->value /100}} تومان</h4>
                                    <p>تخفیف {{$discounts->value}}%</p>
                                </div>
                                <div class="carousel-title"> {{$products->name}} </div>
                                <div class="atrr">
                                    <ul>
                                        <li>{{Helper::attribute($products->id)}}:{{Helper::item($products->id)}}</li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach

            </div>

            <a class="left carousel-control-prev" href="#card" data-slide="prev" id="prev">
                <span class="icon icon-angle-left" style="font-size: 48px;"></span>
            </a>
            <a class="left carousel-control-next" href="#card" data-slide="next" id="next">
                <span class="icon icon-angle-right" style="font-size: 48px;"></span>
            </a>

        </div>

    </div>

    <div class="col-lg-2">
        <div class="disabled-right">
            <img src="/images/site/discount.jpg">
            <a href="javasrcipt:;">
                <span>
                    <i class="icon icon-angle-left"></i>

                </span>
                <i class="icon icon-arrow-left" style="font-size: 15px;float: right;"></i>
                مشاهده همه شگفت انگیز ها
            </a>
        </div>
    </div>


    <!------------------زیر اسلایدر---------------->


    <div class="col-lg-12" style="margin-top: 9%;position: relative;">
        <div class="card" style="height: 144px;" id="card2">
            <ul class="ul">

                <li style="float: right; width:20%">
                    <img src="/images/site/4.svg" style="height: 55px;margin-top: 43px;">
                    <span style="position: absolute;
            top: 80%;float: right;margin-right: -42px;font-size: 12px;">ضمانت </span>
                </li>

                <li style="float: right; width:40%">
                 <span style="position: absolute;
            top: 80%;float: right;margin-right: -26px;font-size: 12px;">7روز ضمانت برگشت</span>
                    <img src="/images/site/3.svg" style="height: 55px;margin-top: 43px;">
                </li>

                <li style="float: right; width:25%">
                 <span style="position: absolute;

top: 80%;float: right;margin-right: -13px;font-size: 12px;">تحویل اکسپرس</span>
                    <img src="/images/site/1.svg" style="height: 55px;margin-top: 43px;">
                </li>

            </ul>


            <ul id="ul">
                <li style="float: right;margin-right: 115px;">
                    <img src="/images/site/4.svg" style="height: 55px;margin-top: 43px;">
                    <span style="position: absolute;
            top: 80%;float: right;margin-right: -78px;font-size: 12px;">ضمانت اصل بودن کالا</span>
                </li>

                <li style="float: right;margin-right: 160px;">
                 <span style="position: absolute;
            top: 80%;float: right;margin-right: -43px;font-size: 12px;">هفت روز ضمانت برگشت</span>
                    <img src="/images/site/3.svg" style="height: 55px;margin-top: 43px;">
                </li>

                <li style="float: right;margin-right: 160px;">
                 <span style="position: absolute;

top: 80%;float: right;margin-right: -13px;font-size: 12px;">پرداخت در محل</span>
                    <img src="/images/site/1.svg" style="height: 55px;margin-top: 43px;">
                </li>
                <li style="float: right;margin-right: 160px;">
                    <span style="position: absolute;
top: 80%;float: right;margin-right: -24px;font-size: 12px;">پشتیبانی همه روزه</span>
                    <img src="/images/site/2.svg" style="height: 55px;margin-top: 43px;">
                </li>

                <li style="float: right;margin-right: 160px;">
                 <span style="position: absolute;
top: 80%;float: right;margin-right: -13px;font-size: 12px;">تحویل اکسپرس</span>
                    <img src="/images/site/5.svg" style="height: 55px;margin-top: 43px;">
                </li>

            </ul>

        </div>


        <div class="col-lg-12" id="discount-image">
            <div class="col-lg-3 col-sm-3">
                <img src="/images/banners/s2.jpg">
            </div>

            <div class="col-lg-3 col-sm-3">
                <img src="/images/banners/s1.jpg">
            </div>

            <div class="col-lg-3 col-sm-3">
                <img src="/images/banners/s3.jpg">
            </div>

            <div class="col-lg-3 col-sm-3">
                <img src="/images/banners/s4.jpg">
            </div>

        </div>


        <div class="col-lg-9 col-xs-12 col-sm-12 col-md-9" id="kala">
            <div class="card">
                <div class="carousel-title">
                    @foreach($group as $groups)
                        @if($groups->category_id == 166)
                            <h5>{{$groups->name}}</h5>
                        @endif
                    @endforeach
                    <div class="hr"></div>
                </div>

                <div class="list_carousel" style="overflow:hidden;">
                    <ul id="foo2">
                        @foreach($product as $products)
                            @if($products->category_id == 166)
                                <li>
                                    <img src="{{$products->image}}" width="210px" height="210px">
                                    <span class="text">{{$products->name}}</span>
                                    <span class="price">{{$products->price}} تومان</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <a id="prev2" class="prev" href="#">&lt;</a> <a id="next2" class="next" href="#">&gt;</a>
            </div>
        </div>

        <div class="col-lg-3" style="float: left;top: -433px;position: relative;">

            <div class="card" style="height: 353px;top: 81px;">

                <div class="carousel-title1">
                    <h6 style="font-size: 13px;font-weight: bold;color: #909090;text-align: center;

margin-top: 28px; width:81%;border-bottom: none !important;">
                        پیشنهادهای لحظه‌ای برای شما
                    </h6>
                    <div id="timer1" class="timer" style="margin-top: 15px"></div>
                </div>

                <div class="list_carousel1" style="overflow:hidden;">
                    <ul id="foo1">
                        <li>
                            <img src="/images/products/g3.jpg" width="250px" height="210px">

                            <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                            <span class="price">120000تومان</span>
                        </li>
                        <li>
                            <img src="/images/products/g4.jpg" width="250px" height="210px">
                            <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                            <span class="price">120000تومان</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="col-lg-12" id="kala1" style="position: absolute;width: 98%;">
            <div class="card">
                <div class="carousel-title1">
                    @foreach($group as $groups)
                        @if($groups->category_id == 167)
                            <h6>{{$groups->name}}</h6>
                        @endif
                    @endforeach
                    <div class="hr"></div>
                </div>

                <div class="list_carousel" style="overflow:hidden;">
                    <ul id="foo3">
                        @foreach($product as $products)
                            @if($products->category_id == 167)
                                <li>
                                    <img src="{{$products->image}}" width="210px" height="210px">
                                    <span class="text">{{$products->name}}</span>
                                    <span class="price">{{$products->price}}تومان</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <a id="prev3" class="prev" href="#">&lt;</a> <a id="next3" class="next" href="#">&gt;</a>

            </div>
        </div>
    </div>

    <div class="col-lg-12" id="discount-image" style="position: absolute;

margin-top: 27%;

margin-right: 3px;">
        <div class="col-lg-3 col-sm-3">
            <img src="/images/site/b1.jpg">
        </div>

        <div class="col-lg-3 col-sm-3">
            <img src="/images/site/b2.jpg">
        </div>

        <div class="col-lg-3 col-sm-3">
            <img src="/images/site/b3.jpg">
        </div>

        <div class="col-lg-3 col-sm-3">
            <img src="/images/site/b4.jpg">
        </div>

    </div>

    <div class="col-lg-12" id="kala1" style="position: absolute;width: 98%; margin-top: 45%;right: 1%;">
        <div class="card">
            <div class="carousel-title1">
                @foreach($group as $groups)
                    @if($groups->category_id == 170)
                        <h5>{{$groups->name}}</h5>
                    @endif
                @endforeach
                <div class="hr"></div>
            </div>

            <div class="list_carousel" style="overflow:hidden;">
                <ul id="foo5">
                    @foreach($product as $products)
                        @if($products->category_id == 170)
                            <li>
                                <img src="{{$products->image}}" width="210px" height="210px">
                                <span class="text">{{$products->name}}</span>
                                <span class="price">{{$products->price}}تومان</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="clearfix"></div>

            </div>

            <a id="prev3" class="prev" href="#">&lt;</a> <a id="next3" class="next" href="#">&gt;</a>

        </div>
    </div>


    <div class="col-lg-12" id="kala2" style="">
        <div class="card">
            <div class="carousel-title1">
                <h6>کالای دیجیتال</h6>
                <div class="hr"></div>
            </div>

            <div class="list_carousel" style="overflow:hidden;">
                <ul id="foo6">
                    @foreach($product as $products)
                        @if($products->category_id == 173)
                            <li>
                                <img src="{{$products->image}}" width="210px" height="210px">
                                <span class="text">{{$products->name}}</span>
                                <span class="price"> {{$products->price}}تومان</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="clearfix"></div>
            </div>

            <a id="prev3" class="prev" href="#">&lt;</a> <a id="next3" class="next" href="#">&gt;</a>

        </div>
    </div>


    <div class="col-lg-12" style="margin-top: 2%;position: absolute;">

        <div class="col-lg-6" style="float: right">
            <img src="/images/banners/k1.jpg" style="width: 100%;">
        </div>

        <div class="col-lg-6" style="float: right">
            <img src="/images/banners/k2.jpg" style="width: 100%;">
        </div>

    </div>


    <div class="col-lg-12" id="kala3" style="">
        <div class="card">

            <div class="carousel-title1">
                <h6>کالای دیجیتال</h6>
                <div class="hr"></div>
            </div>

            <div class="list_carousel" style="overflow:hidden;">
                <ul id="foo7">
                    <li>
                        <img src="/images/products/g1.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                    <li>
                        <img src="/images/products/g2.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                    <li>
                        <img src="/images/products/g3.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                    <li>
                        <img src="/images/products/g4.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                    <li>
                        <img src="/images/products/g5.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                    <li>
                        <img src="/images/products/g6.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                </ul>
                <div class="clearfix"></div>

            </div>

            <a id="prev3" class="prev" href="#">&lt;</a> <a id="next3" class="next" href="#">&gt;</a>

        </div>
    </div>


    <div class="col-lg-12">
        <img src="/images/banners/bg13.jpg"
             style="width: 100%;border-radius: 5px;margin-top: 27px; box-shadow:1px 1px 1px #ddd ">
    </div>

    <div class="col-lg-12" id="kala5" style="">
        <div class="card">

            <div class="carousel-title1">
                <h6>جدید ترین کالاها</h6>
                <div class="hr"></div>
            </div>

            <div class="list_carousel" style="overflow:hidden;">
                <ul id="foo9">
                    <li>
                        <img src="/images/products/g1.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                    <li>
                        <img src="/images/products/g2.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                    <li>
                        <img src="/images/products/g3.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                    <li>

                        <img src="/images/products/g4.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                    <li>
                        <img src="/images/products/g5.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                    <li>
                        <img src="/images/products/g6.jpg" width="210px" height="210px">
                        <span class="text">کابل تبدیل USB به لایتنینگ انکر مدل A8121 PowerLin...</span>
                        <span class="price">120000تومان</span>
                    </li>
                </ul>
                <div class="clearfix"></div>

            </div>

            <a id="prev3" class="prev" href="#">&lt;</a> <a id="next3" class="next" href="#">&gt;</a>

        </div>
    </div>

    <div class="col-lg-12" id="kala6" style="">
        <div class="card">
            <div class="carousel-title1">
                <h6>جدیدترین کالا ها</h6>
                <div class="hr"></div>
            </div>

            <div class="list_carousel" style="overflow:hidden;">
                <ul id="foo10">
                    @foreach($newp as $products)
                        <li>
                            <img src="{{$products->image}}" width="210px" height="210px">
                            <span class="text">{{$products->name}}</span>
                            <span class="price">{{$products->price}} تومان</span>
                        </li>
                    @endforeach
                </ul>
                <div class="clearfix"></div>

            </div>

            <a id="prev3" class="prev" href="#">&lt;</a> <a id="next3" class="next" href="#">&gt;</a>

        </div>
    </div>


    <div class="col-lg-12" id="brand" style="">
        <div class="card">
            <div class="carousel-title1">
                <h6>برند های ویژه</h6>
                <div class="hr"></div>
            </div>

            <div class="list_carousel" style="overflow:hidden;">
                <ul id="foo11">
                    <li>
                        <img src="/images/brands/brand.png" width="210px" height="210px">
                    </li>
                    <li>
                        <img src="/images/brands/brand2.png" width="210px" height="210px">
                    </li>
                    <li>
                        <img src="/images/brands/brand5.png" width="210px" height="210px">
                    </li>
                    <li>
                        <img src="/images/brands/brand6.png" width="210px" height="210px">
                    </li>
                    <li>
                        <img src="/images/brands/brnd2.png" width="210px" height="210px">
                    </li>
                    <li>
                        <img src="/images/brands/brand.png" width="210px" height="210px">
                    </li>
                </ul>
                <div class="clearfix"></div>

            </div>

            <a id="prev3" class="prev" href="#" style="margin-top: -269px !important; ">&lt;</a>
            <a id="next3" class="next" href="#">&gt;</a>

        </div>
    </div>

@endsection

