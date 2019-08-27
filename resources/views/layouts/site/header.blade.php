<div class="col-lg-12" style="position: static">

    <header class="header-c">
        <div class="container">
            <div class="c-header_row">

                <div class="c-header-logo">
                    <a class="c-header-logo-img"></a>
                </div>

                <div class="c-header-search">
                    <input type="search" class="search-input"
                           placeholder="نام محصول برند و یا دسته مورد علاقه خود را جستجو کنید...">
                    <button class="search-button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>

                <div class="header-action">
                    <div class="header-container">
                        <div>
                            <a class="c-header-dropdown" style="cursor: pointer;">
                                <span>ورود / ثبت نام</span>
                                <i class="fa fa-chevron-down"></i>
                            </a>

                            <div class="header-user-dropdown">
                                <div class="before"></div>
                                <div class="after"></div>
                                <a class="header-dropdown-login" href="#">ورود به دیجی کالا</a>
                                <div class="header-dropdown-signup">
                                    <span>کاربر جدید هستید؟</span>
                                    <a>ثبت نام </a>
                                </div>

                                <div class="header-user">
                                    <i class="fa fa-user"></i>
                                    <span>پروفایل</span>
                                </div>

                                <div class="header-cart">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span>سفارشات من</span>
                                </div>

                            </div>
                            <div class=header-div></div>
                        </div>

                    </div>

                    @if(!empty(Session::get('cart')))
                        <?php $count = count(Session::get('cart'));  ?>
                        <div id="header-shop" class="header-shop"
                             style="background-color:#00bfd6; color: #fff !important; ">
                            <div>
                                <i class="fas fa-shopping-cart"></i>
                                <a> سبد خرید </a>
                                <span style="width: 21px;height: 22px;border-radius: 100%;background-color: #fff;color: #00bfd6 !important;
                                position: absolute;text-align: center;margin-right: 10px;">
                                        {{$count}}
                                </span>
                            </div>
                        </div>

                        @include('shop')
                    @else
                        <div class="header-shop">
                            <div>
                                <i class="fas fa-shopping-cart"></i>
                                <a>سبد خرید</a>
                                <span style="width: 21px;height: 22px;border-radius: 100%;background-color: #00bfd6;color: #fff;position: absolute;text-align: center;margin-right: 10px; ">0</span>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>


        <div class="search-bottom">
            <input type="search" placeholder="جستجو از میان دسته ، کالا " class="search">
        </div>

        <span style="float: left;margin-top: -35px;color: #b0aeae;font-size: 21px;margin-left: 13px;" id="icons">
            <i class="fas fa-shopping-cart"></i><i class="fa fa-user"></i>
        </span>

    </header>
</div>

<!----------------------menu desktop----------------------->
<nav class="container-large ">
    <ul class="nav navbar-nav ">
        <span>
            @foreach($menu as $lev1item)
                <li class="dropdown dropdown-large" id="dropdown-large">
                    <a href="javascript:" id="dropdown" class="dropdown dropdown-large" data-toggle="dropdown">
                        {{$lev1item->name}}
                    </a>

            <ul class="dropdown-menu dropdown-menu-large row float-right" role="menu" style="margin-top: -4px;">
                <div class="menu-level2">
                    <div class="menu-wrapper" style="width: 100%;">
                        @foreach($submenu as $lev2item)
                            @if($lev2item->parent_id == $lev1item->id)
                                <li class="col-sm-2">
                                    <a href="/search/{{$lev2item->id}}"
                                       style="color: #1ca2bd; !important; font-weight: bold; font-size: 13px;">{{$lev2item->name}}</a>

                                    @foreach($submenu as $lev3item)
                                        @if($lev3item->parent_id === $lev2item->id)
                                            <ul style="padding-right: 4px; width: 57%; display: block;">
                                                <li class="" style="width: 78%;">
                                                    <a href="/search/{{$lev3item->id}}"
                                                       style="color: #000 !important; ">{{$lev3item->name}}</a>
                                                </li>
                                            </ul>
                                        @endif
                                    @endforeach
                                </li>
                            @endif
                        @endforeach

                        <div class="image">
                              <img src="{{$lev1item->image}}" style="width: 234px;margin-top: 37px;">
                        </div>

                    </div>
                </div>
            </ul>
                </li>
            @endforeach
    </span>
    </ul>
</nav>


<!----------------------menu mobile----------------------->

<div class="navigation">
            <span style="font-size: 30px; cursor: pointer; " class="openNav">
               <i class="fa fa-bars text-secondary">sss</i>
            </span>

    <!-- SEC2 -->
    <div id="mysidenav" class="sidenav">
        <a href="javascript:;" class="closebtn">
            <img src="/images/site/digi.png"
                 style="width: 127px;margin-left: 61px;margin-top: 32px;border-bottom: 1px solid #aaa9a9;margin-bottom: 10px">
        </a>

        @foreach($menu as $lev1item)
            <ul>
                <li style="font-size: 16px;margin-top: 6px;!important;color: #4ac5ff" data-toggle="collapse"
                    data-target="#collapse{{$lev1item->id}}"  aria-expanded="false" aria-controls="collapse">
                    {{$lev1item->name}}
                </li>

                @foreach($submenu as $lev2item)
                    @if($lev2item->parent_id == $lev1item->id)
                        <li style="margin-right: 15px;margin-top: 5px;" class="collapse"
                            id="collapse{{$lev1item->id}}">
                            <a style="color: #212121; !important;  font-size: 14px;" class="" data-toggle="collapse"
                               href="#collapseExample{{$lev2item->id}}" role="button" aria-expanded="false"
                               aria-controls="collapseExample">{{$lev2item->name}}
                            </a>

                            @foreach($submenu as $lev3item)
                                @if($lev3item->parent_id === $lev2item->id)
                                    <ul class="collapse"
                                        id="collapseExample{{$lev2item->id}}">
                                        <li>
                                            <a href=""
                                               style="color: #4f5961 !important;font-size: 12px; ">{{$lev3item->name}}</a>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach

                        </li>
                    @endif
                @endforeach
            </ul>

        @endforeach
    </div>

</div>

