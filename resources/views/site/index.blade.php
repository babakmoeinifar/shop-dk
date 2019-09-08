@extends('layouts.site.master')
@section('content')

    <!----------slider-------------->
    <div class="col-lg-12">
        <div class="carousel slide" id="myCarousel" data-ride="carousel" style="margin-top: 15px;">
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

    <!------------------ زیر اسلایدر mobile ---------------->
    <div class="col-lg-12" style="margin-top: 31px; position: relative;">
        <div id="list_carousel3" class="list_carousel" style="overflow:hidden;">
            <h5 style="font-size: 14px;text-align: right;">پیشنهادات شگفت انگیز</h5>

            <ul id="shegeftangiz">
                @foreach($products as $product)
                    <li>
                        <img src="{{ asset($product->image) }}" height="80px">
                        <span class="text">{{ $product->name }}</span>
                        <span class="price">{{ $product->price }}تومان</span>
                    </li>
                @endforeach
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>

    <!------------------ DiscountSLIDER ---------------->
    <div class="col-lg-9" style="float: left; margin-top: 15px; left: 2%;max-width: 75% !important;">
        <div class="card carousel slide carousel-fade" id="card-discount" data-ride="carousel">

            <ul class="carousel-indicators" id="pager">

                <?php $i=1; ?>
                @foreach($products as $product)
                    @foreach($discounts as $discount)
                        @if($product->id == $discount->product_id)
                            <li data-target="#card-discount" data-slide-to="{{$i++}}" class="@if($loop->first) active @endif">
                                <a href="">
                                    <span>{{$product->name}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
            <div class="discount_bar"></div>

            <div class="carousel-inner">

                @foreach($products as $product)
                    @foreach($discounts as $discount)
                        @if($product->id == $discount->product_id)
                            <div class="carousel-item @if($loop->first) active @endif" id="carousel-item">
                                <img src="{{ asset($product->image) }}">
                                <div class="carousel-price">
                                    <span>{{ number_format($product->price) }}</span>
                                    <h4>{{ number_format($product->price * $discount->value /100) }} تومان</h4>
                                    <p>تخفیف {{$discount->value}}%</p>
                                </div>
                                <div class="carousel-title"> {{ $product->name }} </div>
                                <div class="atrr">
                                    <ul>
                                        <li>
                                            {{ App\Helper::attribute($product->id)}}: {{App\Helper::item($product->id) }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                {{--                <div class="carousel-item active" id="carousel-item">--}}
                {{--                    <img src="/images/products/1.jpg">--}}
                {{--                    <div class="carousel-price">--}}
                {{--                        <span>10000 تومان</span>--}}
                {{--                        <h4>8000 تومان</h4>--}}
                {{--                        <p>تخفیف 20٪</p>--}}
                {{--                    </div>--}}
                {{--                    <div class="carousel-title"> ریش تراش ریش تراش ریش تراش</div>--}}
                {{--                    <div class="atrr">--}}
                {{--                        <ul>--}}
                {{--                            <li>مشخصات ۱</li>--}}
                {{--                            <li>مشخصات 2</li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>

            <a class="left carousel-control-prev" href="#card-discount" data-slide="prev" id="prev">
                <span class="fa fa-angle-left" style="font-size: 48px;"></span>
            </a>
            <a class="left carousel-control-next" href="#card-discount" data-slide="next" id="next">
                <span class="fa fa-angle-right" style="font-size: 48px;"></span>
            </a>
        </div>

    </div>

    <!------------------مشاهده همه شگفت انگیز ها---------------->
    <div class="col-lg-2">
        <div class="disabled-right">
            <img src="/images/site/discount.jpg">
            <a href="javasrcipt:;">
                <span>
                    <i class="fa fa-angle-left"></i>
                </span>
                <i class="fa fa-angle-left" style="font-size: 15px;float: right;"></i>
                مشاهده همه شگفت انگیز ها
            </a>
        </div>
    </div>

    <!------------------زیر اسلایدر---------------->
    <div class="col-lg-12" id="shegeft">
        <div class="card" style="height: 144px;" id="card2">
            <ul class="ul">

                <li style="float: right; width:20%">
                    <img src="/images/site/4.svg" style="height: 55px;margin-top: 43px;">
                    <span style="position: absolute;
            top: 80%;float: right;margin-right: -42px;font-size: 12px;">ضمانت </span>
                </li>

                <li style="float: right; width:35%">
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
    </div>

    <!------------------special offers---------------->
    <div class="row mx-auto" id="discount-image">
        <a href="1" class="col-lg-3 col-sm-6">
            <img src="/images/banners/s2.jpg">
        </a>

        <a href="2" class="col-lg-3 col-sm-6">
            <img src="/images/banners/s1.jpg">
        </a>

        <a href="3" class="col-lg-3 col-sm-6">
            <img src="/images/banners/s3.jpg">
        </a>

        <a href="4" class="col-lg-3 col-sm-6">
            <img src="/images/banners/s4.jpg">
        </a>
    </div>

    <!------------------timed offers---------------->
    <div class="row mx-auto">
        <div class="col-lg-9 col-sm-12" id="kala">
            <div class="card" style="overflow: hidden">
                <div class="carousel-title">
                    {{--                    @foreach($group as $groups)--}}
                    {{--                        @if($groups->category_id == 166)--}}
                    {{--                            <h5>{{$groups->name}}</h5>--}}
                    {{--                        @endif--}}
                    {{--                    @endforeach--}}
                    <h5>کالای دیجیتال</h5>
                </div>

                <div class="list_carousel" style="overflow:hidden;">
                    <ul id="foo2">
                        @foreach($products as $product)
                            {{--                            @if($product->category_id == 166)--}}
                            <li>
                                <a href="{{ url($product->category->slug, $product->id) }}">
                                    <img src="{{asset($product->image)}}" width="210px" height="210px">
                                </a>
                                <span class="text">{{$product->name}}</span>
                                <span class="price">{{$product->price}} تومان</span>
                            </li>
                            {{--                            @endif--}}
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <a id="prev2" class="prev" href="#">&lt;</a>
                <a id="next2" class="next" href="#">&gt;</a>
            </div>
        </div>

        <!-----------------------------پیشنهادهای لحظه‌ای----------------------->
        <div class="col-lg-3" style="top: -52px">
            <div class="card" style="height: 353px;top: 81px;">

                <div class="carousel-title1">
                    <h6 style="font-size: 13px;font-weight: bold;color: #909090;text-align: center;
                    margin-top: 8px; width:71%;border-bottom: none !important;">
                        پیشنهادهای لحظه‌ای برای شما
                    </h6>
                    <div id="timer1" class="timer"></div>
                </div>

                <div class="list_carousel1" style="overflow:hidden;">
                    <ul id="foo1">
                        @foreach($products as $product)
                            <li>
                                <img src="{{ asset($product->image) }}" class="rounded" width="250px" height="210px">

                                <span class="text">{{ $product->name }}</span>
                                <span class="price">{{ $product->price }}تومان</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!------------------offers---------------->
    <div class="col-lg-12" id="kala1">
        <div class="card">
            <div class="carousel-title">
                @foreach($groups as $group)
                    @if($group->category_id == 4)
                        <h5>{{$group->attr_group_name}}</h5>
                    @endif
                @endforeach
            </div>

            <div class="list_carousel" style="overflow:hidden;">
                <ul id="foo3">
                    @foreach($products as $product)
                        @if($product->category_id == 2)
                            <li>
                                <a href="{{ url($product->category->slug, $product->id) }}">
                                    <img src="{{asset($product->image)}}" width="210px" height="210px">
                                </a>
                                <span class="text">{{$product->name}}</span>
                                <span class="price">{{$product->price}}تومان</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="clearfix"></div>
            </div>

            <a id="prevoffer" class="prev" href="#">&lt;</a>
            <a id="nextoffer" class="next" href="#">&gt;</a>

        </div>
    </div>

    <!------------------banners---------------->
    <div class="row mx-auto" id="discount-image">
        <div class="col-lg-3 col-sm-6">
            <a href="">
                <img src="/images/site/b1.jpg">
            </a>
        </div>

        <div class="col-lg-3 col-sm-6">
            <a href="">
                <img src="/images/site/b2.jpg">
            </a>
        </div>

        <div class="col-lg-3 col-sm-6">
            <a href="">
                <img src="/images/site/b3.jpg">
            </a>
        </div>

        <div class="col-lg-3 col-sm-6">
            <a href="">
                <img src="/images/site/b4.jpg">
            </a>
        </div>

    </div>

    <!------------------most-selled-products----------------->
    <div class="col-lg-12" id="kala1">
        <div class="card">
            <div class="carousel-title">
                @foreach($groups as $group)
                    @if($group->category_id == 3)
                        <h5>{{$group->attr_group_name}}</h5>
                    @endif
                @endforeach
            </div>

            <div class="list_carousel" style="overflow:hidden;">
                <ul id="foo5">
                    @foreach($products as $product)
                        @if($product->category_id == 3)
                            <li>
                                <a href="{{ url($product->category->slug, $product->id) }}">
                                    <img src="{{asset($product->image)}}" width="210px" height="210px">
                                </a>
                                <span class="text">{{$product->name}}</span>
                                <span class="price">{{$product->price}}تومان</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="clearfix"></div>

            </div>

            <a id="prevslider" class="prev" href="#">&lt;</a>
            <a id="nextslider" class="next" href="#">&gt;</a>

        </div>
    </div>

    <!------------------slider------------------>
    <div class="row col-12 mx-auto" style="margin-top: 2%;">

        <div class="col-lg-6">
            <a href="">
                <img src="/images/banners/k1.jpg" style="width: 100%;">
            </a>
        </div>

        <div class="col-lg-6">
            <a href="">
                <img src="/images/banners/k2.jpg" style="width: 100%;">
            </a>
        </div>

    </div>

    <!------------------banner------------------>
    <div class="col-lg-12">
        <a href="">
            <img src="/images/banners/bg13.jpg"
                 style="width: 100%;border-radius: 5px;margin-top: 27px; box-shadow:1px 1px 1px #ddd ">
        </a>
    </div>

    <!------------------slider newest----------->
    <div class="col-lg-12" id="kala5">
        <div class="card">

            <div class="carousel-title">
                <h5>جدید ترین کالاها</h5>
            </div>

            <div class="list_carousel" style="overflow:hidden;">
                <ul id="foo9">
                    @foreach($newProducts as $product)
                        <li>
                            <a href="{{ url($product->category->slug, $product->id) }}">
                                <img src="{{ asset($product->image) }}" width="210px" height="210px">
                            </a>
                            <span class="text">{{ $product->name }}</span>
                            <span class="price">{{ $product->price }}تومان</span>
                        </li>
                    @endforeach
                </ul>
                <div class="clearfix"></div>

            </div>

            <a id="prevnewest" class="prev" href="#">&lt;</a>
            <a id="nextnewest" class="next" href="#">&gt;</a>

        </div>
    </div>

    <!------------------Brand---------------->
    <div class="col-lg-12" id="brand">
        <div class="card">
            <div class="carousel-title">
                <h5>برند های ویژه</h5>
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

            <a id="prevbrands" class="prev" href="#" style="margin-top: -269px !important; ">&lt;</a>
            <a id="nextbrands" class="next" href="#">&gt;</a>

        </div>
    </div>

@endsection

