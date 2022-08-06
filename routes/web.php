<?php

use App\Product;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/login', function() {
//     return redirect()->route('login');
// });

Route::get('/terminos_y_condiciones', 'WebController@terms_conditions')->name('web.terms_conditions');

// =======================================qr====================================
Route::get('/seminarios/{user}', 'MyAccountController@seminars')->name('web.seminars');
Route::get('/mi_codigo_qr', 'MyAccountController@qrcode')->name('web.qr');


//==============================================================================


// =======================================correos================================
Route::resource('contact_mail', 'MailController')->names('contact.mail');


// =======================================rutas del cliente======================

Route::post('/payments/pay', 'PaymentController@pay')->name('pay')->middleware('verified');
Route::get('/payments/approval', 'PaymentController@approval')->name('approval')->middleware('verified');
Route::get('/payments/cancelled', 'PaymentController@cancelled')->name('cancelled')->middleware('verified');

Route::get('/nosotros', 'WebController@about_us')->name('web.about_us');

// =======================================rutas de blog======================


Route::get('/blog', 'WebBlogController@blog')->name('web.blog');
Route::get('/blog_detalles/{post}', 'WebBlogController@blog_details')->name('web.blog_details');
Route::get('publicaciones/categoria/{category}', 'WebBlogController@get_posts_category')->name('web.get_posts_category');
Route::get('publicaciones/etiqueta/{tag}', 'WebBlogController@get_posts_tag')->name('web.get_posts_tag');
Route::get('blog/publicaciones/{date}', 'WebBlogController@get_posts_month')->name('web.get_posts_month');

Route::get('posts_json', 'WebBlogController@posts_json')->name('posts.json');
Route::get('blog/resultados/', 'WebBlogController@search_posts')->name('web.search_posts');


// ==========================================================================

Route::get('/registro', 'WebController@login_register')->name('web.login_register');
Route::get('/contacto', 'WebController@contact_us')->name('web.contact_us');
Route::get('/invitado/{guest}', 'WebController@guest')->name('web.guest');

// ==================================productos============================================================
Route::get('/productos', 'WebShopController@shop_grid')->name('web.shop_grid');
Route::get('products_json', 'WebShopController@products_json')->name('products.json');
Route::get('productos/resultados/', 'WebShopController@search_products')->name('web.search_products');
Route::get('/producto/{product}', 'WebShopController@product_details')->name('web.product_details');
Route::get('productos/categoria/{category}', 'WebShopController@get_products_category')->name('web.get_products_category');
Route::get('productos/etiqueta/{tag}', 'WebShopController@get_products_tag')->name('web.get_products_tag');
Route::post('rate_product/{product}', 'MyAccountController@rate_product')->name('web.rate_product')->middleware('verified');

//==========================================================================================================

Route::get('login_error', 'WebController@login_error')->name('web.login_error');
Route::get('micuenta', 'MyAccountController@my_account')->name('web.my_account')->middleware('verified');
Route::get('pagar', 'MyAccountController@checkout')->name('web.checkout')->middleware('verified');

Route::get('mis_ordenes', 'MyAccountController@orders')->name('web.orders')->middleware('verified');
Route::get('mis_ordenes/pedido/{order}', 'MyAccountController@order_details')->name('web.order_details')->middleware('verified');




Route::get('detalles_de_la_cuenta', 'MyAccountController@account_info')->name('web.account_info')->middleware('verified');
Route::get('editar_direccion', 'MyAccountController@address_edit')->name('web.address_edit')->middleware('verified');
Route::get('cambiar_contrasena', 'MyAccountController@change_password')->name('web.change_password')->middleware('verified');

Route::put('update_client/{user}/update', 'UserController@update_client')->name('web.update_client');
Route::put('update_password/{user}/update', 'UserController@update_password')->name('web.update_password');
Route::put('update_profile/{profile}/update', 'ProfileController@update')->name('update_profile');










Route::get('/', 'WebShopController@welcome')->name('web.welcome');


// ========================================= rutas administrador ==================================================
Route::resource('brands', 'BrandController')->names('brands');


Route::resource('shopping_cart_detail', 'ShoppingCartDetailController')->names('shopping_cart_details')->only([
 'update']);
Route::get('shopping_cart_detail/{shopping_cart_detail}/destroy', 'ShoppingCartDetailController@destroy')->name('shopping_cart_details.destroy');

Route::post('add_to_shopping_cart/{product}/store', 'ShoppingCartDetailController@store')->name('shopping_cart_details.store');
Route::get('add_a_product_to_the_shopping_cart/{product}/store', 'ShoppingCartDetailController@store_a_product')->name('store_a_product');

Route::get('mi_carrito', 'WebController@cart')->name('web.cart');

Route::put('shopping_cart', 'ShoppingCartController@update')->name('shopping_cart.update');

Route::post('subscription_email', 'WebController@subscription_email')->name('web.subscription_email');


//========================================fin====================================

Route::resource('orders', 'OrderController')->names('orders')->only(['index', 'show']);
Route::put('orders_update/{id}', 'OrderController@orders_update')->name('orders_update');

Route::get('mark_all_notifications', 'NotificationController@mark_all_notifications')->name('mark_all_notifications');
Route::get('mark_a_notification/{notification_id}/{order_id}', 'NotificationController@mark_a_notification')->name('mark_a_notification');



Route::resource('social_media', 'SocialMediaController')->names('social_medias');
Route::resource('sliders', 'SliderController')->names('sliders');
Route::resource('subscriptions', 'SubscriptionController')->names('subscriptions');
Route::resource('promotions', 'PromotionController')->names('promotions');





Route::resource('posts', 'PostController')->names('posts');


Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');

Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::resource('business', 'BusinessController')->names('business')->only([
    'index', 'update'
]);
Route::resource('printers', 'PrinterController')->names('printers')->only([
    'index', 'update'
]);

Route::resource('categories', 'CategoryController')->names('categories');


Route::resource('clients', 'ClientController')->names('clients');
Route::resource('products', 'ProductController')->names('products');

// Route::post('upload/product/{id}/image', 'ProductController@upload_image')->name('upload.product.image');
Route::post('upload_image/{id}', 'AjaxController@upload_image')->name('upload.image');
Route::post('upload_images_products/{id}', 'AjaxController@upload_images_products')->name('upload_images_products');

Route::get('get_images/{id}', 'AjaxController@get_images')->name('get.images');
Route::post('file_delete', 'AjaxController@file_delete')->name('file.delete');

Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('guests', 'GuestController')->names('guests');

Route::resource('purchases', 'PurchaseController')->names('purchases')->except([
    'edit', 'update', 'destroy'
]);
Route::resource('sales', 'SaleController')->names('sales')->except([
    'edit', 'update', 'destroy'
]);
Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');

Route::put('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');

Route::resource('users', 'UserController')->names('users');

Route::resource('roles', 'RoleController')->names('roles')->except(['create', 'store', 'destroy']);

Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');

Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');

Route::get('get_products_by_subcategory', 'AjaxController@get_products_by_subcategory')->name('get_products_by_subcategory');

Route::get('print_barcode', 'ProductController@print_barcode')->name('print_barcode');

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('get_subcategories', 'AjaxController@get_subcategories')->name('get_subcategories');
Route::resource('subcategories', 'SubcategoryController')->names('subcategories')->except(['edit', 'update', 'show']);

Route::put('category/{category}/subcategory/{subcategory}/update', 'SubcategoryController@update')->name('subcategories.update');

Route::get('category/{category}/subcategory/{subcategory}', 'SubcategoryController@edit')->name('subcategories.edit');

Route::resource('tags', 'TagController')->except(['show'])->names('tags');

Route::get('/barcode', function () {
    $products = Product::get();
    return view('admin.product.barcode', compact('products'));
});



// Auth::routes();
// Auth::routes(['register' => true]);
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
