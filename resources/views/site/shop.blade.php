<?php
$price = 0;
use  App\product;
?>

<div id="header-cart-dropdown" style="display: none;">

    <div class="before"></div>

    <a class="header-dropdown-login" href="#"
       style="background-color: hsla(0,0%,98%,.9) !important;color: #000 !important;text-align: right;padding-right: 9px;font-weight: normal;"
    >مبلغ کل خرید : <span>{{Session::get('price')}} تومان</span></a>

    <ul style="text-align:right;margin-right: -32px;">
        @foreach(Session::get('cart') as  $key=>$value)
            <?php  $product = product::where('PID', $key)->first();
            $price += $product->price * $value;
            Session::put('price', $price);
            ?>
            <li style="margin-top: 24px;">
            <span class="cart_remove"><i class="icon icon-remove-circle" style="cursor: pointer;font-size: 20px;color: #ddd;"></i></span>
                <span class="cart_image">
                    <img src="/imagepro/{{$product->productimage}}">
                </span>
                <span class="cart_title"
                      style="position: absolute;font-size: 16px;font-weight: bold;">{{$product->productname}}</span>
                <span class="cart_count">{{$value}} </span>

            </li>
        @endforeach
    </ul>

</div>