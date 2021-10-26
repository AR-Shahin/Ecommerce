<?php

use Gloudemans\Shoppingcart\Facades\Cart;


$cart = new Cart();
$items  = $cart->count;
function greetings($name = "Shahin")
{
    return "Hello $name";
}

function couponName()
{
    if (session('coupon')) {
        return session('coupon')['name'];
    }
}

function couponDiscount()
{
    if (session('coupon')) {
        return session('coupon')['discount'];
    }
}

function shippingCost()
{
    return Cart::count() * 10;
}

function totalCartPrice()
{
    return ((float)Cart::subtotal());
}


function totalDiscount()
{
    return totalCartPrice() * (couponDiscount() / 100);
}
function totalPriceWithShipping()
{
    return totalCartPrice()  + shippingCost();
}
function totalPriceWithDiscount()
{
    return (totalCartPrice() - totalDiscount()) + shippingCost();
}
