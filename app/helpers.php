<?php

use Gloudemans\Shoppingcart\Facades\Cart;




function greetings($name = "Shahin")
{
    return "Hello $name";
}

function couponName()
{
    if (session('coupon')) {
        return session('coupon')['name'];
    }
    return null;
}

function couponDiscount()
{
    if (session('coupon')) {
        return session('coupon')['discount'];
    }
    return null;
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


function totalAmount()
{
    if (session('coupon')) {
        return totalPriceWithDiscount();
    } else {
        return totalPriceWithShipping();
    }
}
