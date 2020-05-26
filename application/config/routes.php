<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = 'errors';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/index';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

// User Home
$route['home'] = 'home';


// User Online Shop
$route['ecommerce'] = 'user/ecommerce/index';
$route['ecommerce/(:num)'] = 'user/ecommerce/index/$1';
$route['ecommerce_add_to_cart/(:num)'] = 'user/ecommerce/add_to_cart/$1';


// User Cart
$route['cart'] = 'user/ecommerce/cart';
$route['ecommerce_delete_product_checkout'] = 'user/ecommerce/delete_cart';
$route['ecommerce_checkout'] = 'user/ecommerce/checkout_ecommerce';
$route['ecommerce_success_buyying'] = 'user/ecommerce/checkout_success_buy';





// User Stock
$route['stock'] = 'user/stock/index';


// User Online Shop
$route['restorasi.vespa'] = 'user/restorasi_vespa/index';

// User Blog
$route['blog'] = 'user/blog/index';
$route['blog/(:num)'] = 'user/blog/index';
$route['blog_preview/(:num)'] = 'user/blog/blog_preview/$1';


// User Brands
$route['brand'] = 'user/brand/index';


// User about
$route['about'] = 'user/about/index';




$route['member'] = 'user/member/index';




// Admin
// admin Dashboard
$route['dashboard'] = 'admin/dashboard/index';


// Admin E-commerce
$route['ecommerce_admin'] = 'admin/ecommerce/index';
$route['ecommerce_admin/(:num)'] = 'admin/ecommerce/index';
$route['ecommerce_discount_codes'] = 'admin/ecommerce/discount_codes';
$route['ecommerce_orders'] = 'admin/ecommerce/orders';
$route['ecommerce_category'] = 'admin/ecommerce/category';

$route['ecommerce_publish_product'] = 'admin/ecommerce/product_add';
$route['ecommerce_product_preview'] = 'admin/ecommerce/product_preview';
$route['ecommerce_product_edit/(:num)'] = 'admin/ecommerce/product_edit/$1';
$route['ecommerce_product_delete/(:num)'] = 'admin/ecommerce/product_delete/$1';



// Admin Blog
$route['blog_publish_post'] = 'admin/blog/add';
$route['blog_admin'] = 'admin/blog/index';
$route['blog_admin/(:num)'] = 'admin/blog/index';
$route['blog_category'] = 'admin/blog/category';
$route['blog_preview'] = 'admin/blog/preview_blog';
$route['blog_edit/(:num)'] = 'admin/blog/blog_edit/$1';
$route['blog_delete/(:num)'] = 'admin/blog/blog_delete/$1';


// Admin Stock
$route['stock_admin'] = 'admin/stock/index';
$route['stock_publish_post'] = 'admin/stock/add';
$route['stock_category'] = 'admin/stock/category';


// Admin Brands
$route['brand_publish_post'] = 'admin/brand/add';
$route['brand_admin'] = 'admin/brand/index';
$route['brand_edit/(:num)'] = 'admin/brand/brand_edit/$1';
$route['brand_delete/(:num)'] = 'admin/brand/brand_delete/$1';



// Admin Invoice
$route['invoice_admin'] = 'admin/invoice/index';
$route['invoice_status/(:num)'] = 'admin/invoice/update_invoice_status/$1';
$route['invoice_detail/(:num)'] = 'admin/invoice/detail_invoice/$1';


