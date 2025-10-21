<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLanding extends Controller
{
    public function home() {
        return view('e-commerce.landing.homepage');
    }
    public function product_details() {
        return view('e-commerce.landing.product-details');
    }
    public function fav() {
        return view('e-commerce.landing.favourite-stores');
    }
    public function cart() {
        return view('e-commerce.landing.cart');
    }
    public function wishlist() {
        return view('e-commerce.landing.wishlist');
    }
    public function shipping_info() {
        return view('e-commerce.landing.shipping-info');
    }
    public function add_product() {
        return view('e-commerce.landing.add-product');
    }
    public function checkout() {
        return view('e-commerce.landing.checkout');
    }
    public function products_filter() {
        return view('e-commerce.landing.products-filter');
    }
    public function order_tracking() {
        return view('e-commerce.landing.order-tracking');
    }
}
