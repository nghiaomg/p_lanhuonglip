<?php

namespace Config;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();
// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}
/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override('App\Controllers\Home::show404');
$routes->setAutoRoute(true);
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/', 'Home::index');
$routes->get('(page-404).html', 'Home::show404');
//for admin
$routes->get('(cpanel/login).html', 'Cpanel\Auth::login');
$routes->post('(cpanel/login).html', 'Cpanel\Auth::login');
$routes->get('(cpanel/logout).html', 'Cpanel\Auth::logout');
$routes->get('(cpanel)', 'Cpanel\Dashboard::index');
// 
$routes->get('(cpanel)/(dashboard)/(:num)', 'Cpanel\Dashboard::index/$3');
$routes->get('(cpanel)/(dashboard)/(edit)/(:num)', 'Cpanel\Dashboard::edit/$4');

# Redirect to not permission page
$routes->get('not-permission', 'BaseController::notPermission');

$routes->group('cpanel', function ($routes) {
	// dashboard
	$routes->group('dashboard', function ($routes) {
		$routes->get('/', 'Cpanel\System::index');
	});
	// quản lý Admin
	$routes->group('admin', function ($routes) {
		$routes->get('index', 'Cpanel\Admin::index');
		$routes->get('/', 'Cpanel\Admin::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Admin::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Admin::edit/$1');
	});
	// logo
	$routes->group('logo', function ($routes) {
		$routes->match(['get', 'post'], 'index', 'Cpanel\Logo::index');
		$routes->match(['get', 'post'], '/', 'Cpanel\Logo::index');
	});

	// Quản lí Candidate
	$routes->group('candidate', function ($routes) {
		$routes->get('/', 'Cpanel\Candidate::index');
		$routes->get('index', 'Cpanel\Candidate::index');
		$routes->get('export', 'Cpanel\Candidate::export');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Candidate::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Candidate::edit/$1');
	});

	// Menu
	$routes->group('menu', function ($routes) {
		$routes->get('index', 'Cpanel\Menu::index');
		$routes->get('/', 'Cpanel\Menu::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Menu::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Menu::edit/$1');
	});
	// MenuNews
	$routes->group('menuNews', function ($routes) {
		$routes->get('index', 'Cpanel\MenuNews::index');
		$routes->get('/', 'Cpanel\MenuNews::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\MenuNews::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\MenuNews::edit/$1');
	});
	// MenuNews
	$routes->group('menuProduct', function ($routes) {
		$routes->get('index', 'Cpanel\MenuProduct::index');
		$routes->get('/', 'Cpanel\MenuProduct::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\MenuProduct::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\MenuProduct::edit/$1');
	});
	// Module
	$routes->group('module', function ($routes) {
		$routes->get('index', 'Cpanel\Module::index');
		$routes->get('/', 'Cpanel\Module::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Module::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Module::edit/$1');
	});
	//=========================== TIẾN ===========================
	// Chi nhánh
	$routes->group('branch', function ($routes) {
		$routes->get('/', 'Cpanel\Branch::index');
		$routes->get('index', 'Cpanel\Branch::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Branch::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Branch::edit/$1');
	});
	// Advisephone 
	$routes->group('advisephone', function ($routes) {
		$routes->get('/', 'Cpanel\Advisephone::index');
		$routes->get('index', 'Cpanel\Advisephone::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Advisephone::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Advisephone::edit/$1');
	});
	// Slide 
	$routes->group('slide', function ($routes) {
		$routes->get('/', 'Cpanel\Slide::index');
		$routes->get('index', 'Cpanel\Slide::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Slide::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Slide::edit/$1');
	});
	// News 
	$routes->group('news', function ($routes) {
		$routes->get('/', 'Cpanel\News::index');
		$routes->get('index', 'Cpanel\News::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\News::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\News::edit/$1');
	});
	// Profile
	$routes->group('profile', function ($routes) {
		$routes->get('/', 'Cpanel\Profile::index');
		$routes->get('index', 'Cpanel\Profile::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Profile::changepass');
	});
	// Quangcao
	$routes->group('quangCao', function ($routes) {
		$routes->get('/', 'Cpanel\QuangCao::index');
		$routes->get('index', 'Cpanel\QuangCao::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\QuangCao::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\QuangCao::edit/$1');
	});
	// Cart
	$routes->group('cart', function ($routes) {
		$routes->get('index', 'Cpanel\Cart::index');
		$routes->get('/', 'Cpanel\Cart::index');
		$routes->post('changeStatus', 'Cpanel\Cart::changeStatus');
	
	});
	// Quangcao
	$routes->group('ads', function ($routes) {
		$routes->get('/', 'Cpanel\Ads::index');
		$routes->get('index', 'Cpanel\Ads::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Ads::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Ads::edit/$1');
	});
	// Role
	$routes->group('role', function ($routes) {
		$routes->get('/', 'Cpanel\Role::index');
		$routes->get('index', 'Cpanel\Role::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Role::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Role::edit/$1');
		$routes->match(['get', 'post'], 'setPermission/(:num)', 'Cpanel\Role::setPermission/$1');
	});

	// System
	$routes->group('system', function ($routes) {
		$routes->get('/', 'Cpanel\System::index');
		$routes->get('index', 'Cpanel\System::index');
		$routes->match(['get', 'post'], 'contact', 'Cpanel\System::contact');
		$routes->match(['get', 'post'], 'google', 'Cpanel\System::google');
		$routes->get('delete-sitemap', 'Cpanel\System::unlink_Site_map');
	});
	// Liên hệ
	$routes->group('contact', function ($routes) {
		$routes->get('/', 'Cpanel\Contact::index');
		$routes->get('index', 'Cpanel\Contact::index');
		$routes->get('search_pagination', 'Cpanel\Contact::search_pagination');
	});
	// Users
	$routes->group('users', function ($routes) {
		$routes->get('/', 'Cpanel\Users::index');
		$routes->get('index', 'Cpanel\Users::index');
		$routes->get('export', 'Cpanel\Users::export');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Users::add');
	});

	// Career
	$routes->group('career', function ($routes) {
		$routes->get('/', 'Cpanel\Career::index');
		$routes->get('index', 'Cpanel\Career::index');
		$routes->get('export', 'Cpanel\Career::export');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Career::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Career::edit/$1');
	});

	// Permission
	$routes->group('permission', function ($routes) {
		$routes->get('/', 'Cpanel\Permission::index');
		$routes->get('index', 'Cpanel\Permission::index');
		// $routes->match(['get', 'post'], 'setPermission/(:num)', 'Cpanel\Permission::setPermission/$1');
		// $routes->match(['get', 'post'], 'notpermission', 'Cpanel\Permission::notPermission');
	});

	// Quote
	$routes->group('quote', function ($routes) {
		$routes->get('index', 'Cpanel\Quote::index');
		$routes->get('/', 'Cpanel\Quote::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Quote::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Quote::edit/$1');
		$routes->match(['get', 'post'], 'config', 'Cpanel\Quote::config');
	});
	// Idea 
	$routes->group('idea', function ($routes) {
		$routes->get('/', 'Cpanel\Idea::index');
		$routes->get('index', 'Cpanel\Idea::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Idea::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Idea::edit/$1');
	});
	// Slogan 
	$routes->group('slogan', function ($routes) {
		$routes->get('/', 'Cpanel\Slogan::index');
		$routes->get('index', 'Cpanel\Slogan::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Slogan::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Slogan::edit/$1');
	});
	// About
	$routes->group('about', function ($routes) {
		$routes->get('/', 'Cpanel\About::index');
		$routes->get('index', 'Cpanel\About::index');
	});
	// banner
	$routes->group('banner', function ($routes) {
		$routes->get('/', 'Cpanel\Banner::index');
		$routes->get('index', 'Cpanel\Banner::index');
	});
	// Banner 2
	$routes->group('banner2', function ($routes) {
		$routes->get('/', 'Cpanel\Banner2::index');
		$routes->get('index', 'Cpanel\Banner2::index');
	});
	// difficult 
	$routes->group('difficult', function ($routes) {
		$routes->get('/', 'Cpanel\Difficult::index');
		$routes->get('index', 'Cpanel\Difficult::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Difficult::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Difficult::edit/$1');
	});
	// whychoose 
	$routes->group('whychoose', function ($routes) {
		$routes->get('/', 'Cpanel\Whychoose::index');
		$routes->get('index', 'Cpanel\Whychoose::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Whychoose::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Whychoose::edit/$1');
	});
	// project 
	$routes->group('project', function ($routes) {
		$routes->get('/', 'Cpanel\Project::index');
		$routes->get('index', 'Cpanel\Project::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Project::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Project::edit/$1');
	});
	// procedure 
	$routes->group('procedure', function ($routes) {
		$routes->get('/', 'Cpanel\Procedure::index');
		$routes->get('index', 'Cpanel\Procedure::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Procedure::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Procedure::edit/$1');
	});
	// FAQ 
	$routes->group('faq', function ($routes) {
		$routes->get('/', 'Cpanel\Faq::index');
		$routes->get('index', 'Cpanel\Faq::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Faq::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Faq::edit/$1');
	});
	// service 
	$routes->group('service', function ($routes) {
		$routes->get('/', 'Cpanel\Service::index');
		$routes->get('index', 'Cpanel\Service::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Service::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Service::edit/$1');
	});
	// Number 
	$routes->group('number', function ($routes) {
		$routes->get('/', 'Cpanel\Number::index');
		$routes->get('index', 'Cpanel\Number::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Number::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Number::edit/$1');
	});
	// Tunnel 
	$routes->group('tunnel', function ($routes) {
		$routes->get('/', 'Cpanel\Tunnel::index');
		$routes->get('index', 'Cpanel\Tunnel::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Tunnel::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Tunnel::edit/$1');
	});

	// product 
	$routes->group('product', function ($routes) {
		$routes->get('/', 'Cpanel\Product::index');
		$routes->get('index', 'Cpanel\Product::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Product::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Product::edit/$1');
	});
	// productcolor 
	$routes->group('productcolor', function ($routes) {
		// $routes->get('/', 'Cpanel\Productcolor::index');
		$routes->get('index/(:num)', 'Cpanel\Productcolor::index/$1');
		$routes->match(['get', 'post'], 'add/(:num)', 'Cpanel\Productcolor::add/$1');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Productcolor::edit/$1');
	});
	// Community 
	$routes->group('community', function ($routes) {
		// $routes->get('/', 'Cpanel\Productvideo::index');
		$routes->get('index/(:num)', 'Cpanel\Community::index/$1');
		$routes->match(['get', 'post'], 'add/(:num)', 'Cpanel\Community::add/$1');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Community::edit/$1');
	});
	// productvideo 
	$routes->group('productvideo', function ($routes) {
		// $routes->get('/', 'Cpanel\Productvideo::index');
		$routes->get('index/(:num)', 'Cpanel\Productvideo::index/$1');
		$routes->match(['get', 'post'], 'add/(:num)', 'Cpanel\Productvideo::add/$1');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Productvideo::edit/$1');
	});
	// productinfo
	$routes->group('productinfo', function ($routes) {
		$routes->get('/', 'Cpanel\Productinfo::index');
		$routes->get('index', 'Cpanel\Productinfo::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Productinfo::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Productinfo::edit/$1');
	});
	// productingre 
	$routes->group('productingre', function ($routes) {
		// $routes->get('/', 'Cpanel\Productingre::index');
		$routes->get('index/(:num)', 'Cpanel\Productingre::index/$1');
		$routes->match(['get', 'post'], 'add/(:num)', 'Cpanel\Productingre::add/$1');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Productingre::edit/$1');
	});
	// methodpay 
	$routes->group('methodpay', function ($routes) {
		$routes->get('/', 'Cpanel\Methodpay::index');
		$routes->get('index', 'Cpanel\Methodpay::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Methodpay::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Methodpay::edit/$1');
	});
	// Partner 
	$routes->group('partner', function ($routes) {
		$routes->get('/', 'Cpanel\Partner::index');
		$routes->get('index', 'Cpanel\Partner::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Partner::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Partner::edit/$1');
	});
	// Video 
	$routes->group('video', function ($routes) {
		$routes->get('/', 'Cpanel\Video::index');
		$routes->get('index', 'Cpanel\Video::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Video::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Video::edit/$1');
	});
	// Video 
	$routes->group('order', function ($routes) {
		$routes->get('/', 'Cpanel\Order::index');
		$routes->get('index', 'Cpanel\Order::index');
		$routes->get('export', 'Cpanel\Order::exportExcel');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Order::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Order::edit/$1');
	});
	// đơn vị tính 
	$routes->group('dvt', function ($routes) {
		$routes->get('/', 'Cpanel\Dvt::index');
		$routes->get('index', 'Cpanel\Dvt::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Dvt::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Dvt::edit/$1');
	});
	// Country 
	$routes->group('country', function ($routes) {
		$routes->get('/', 'Cpanel\Country::index');
		$routes->get('index', 'Cpanel\Country::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Country::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Country::edit/$1');
	});
	$routes->group('constants', function ($routes) {
		$routes->get('/', 'Cpanel\Constants::index');
		$routes->get('index', 'Cpanel\Constants::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Constants::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Constants::edit/$1');
	});
	$routes->group('booking', function ($routes) {
		$routes->get('/', 'Cpanel\Booking::index');
		$routes->get('index', 'Cpanel\Booking::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Booking::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Booking::edit/$1');
	});
	$routes->group('customers', function ($routes) {
		$routes->get('/', 'Cpanel\Customers::index');
		$routes->get('index', 'Cpanel\Customers::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Customers::add');
		$routes->match(['get', 'post'], 'importExcell', 'Cpanel\Customers::importExcell');
		$routes->match(['get', 'post'], 'errors', 'Cpanel\Customers::errors');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Customers::edit/$1');
	});
	// advise
	$routes->group('advise', function ($routes) {
		$routes->get('/', 'Cpanel\Advise::index');
		$routes->get('index', 'Cpanel\Advise::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Advise::add');
		$routes->match(['get', 'post'], 'importExcell', 'Cpanel\Advise::importExcell');
		$routes->match(['get', 'post'], 'errors', 'Cpanel\Advise::errors');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Advise::edit/$1');
	});
	$routes->group('baogia', function ($routes) {
		$routes->get('/', 'Cpanel\Baogia::index');
		$routes->get('index', 'Cpanel\Baogia::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Baogia::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Baogia::edit/$1');
	});
	$routes->group('instagram', function ($routes) {
		$routes->get('/', 'Cpanel\Instagram::index');
		$routes->get('index', 'Cpanel\Instagram::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Instagram::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Instagram::edit/$1');
	});
	$routes->group('album', function ($routes) {
		$routes->get('/', 'Cpanel\Album::index');
		$routes->get('index', 'Cpanel\Album::index');
		$routes->match(['get', 'post'], 'add', 'Cpanel\Album::add');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Cpanel\Album::edit/$1');
	});
	// Đăng ký khóa học
	$routes->group('regisstudy', function ($routes) {
		$routes->get('/', 'Cpanel\Regisstudy::index');
		$routes->get('index', 'Cpanel\Regisstudy::index');
		$routes->get('search_pagination', 'Cpanel\Regisstudy::search_pagination');
	});
});

$routes->post('fast-view-cart', 'Cpanel\Cart::view');

/**
 * --------------------------------------------------------------------
 * Router Setup For FE
 * --------------------------------------------------------------------
 */

$routes->get('404', 'Home::show404');
$routes->get('san-pham-yeu-thich', 'Route::searchLikeProduct');
$routes->get('ajax-cookie', 'Ajax::cookie');
$routes->get('(dang-nhap-tai-khoan)', 'Login::index');
$routes->get('(dang-nhap-tai-khoan).html', 'Login::index');
$routes->post('(dang-ky-tai-khoan)', 'Login::register');
$routes->get('(dang-ky-tai-khoan-thanh-cong)', 'Login::register_success');
$routes->get('(quen-mat-khau)', 'Login::forget_password');
$routes->get('(chuyen-huong-dang-nhap).html', 'Login::redirectFB');

// http://localhost:8080/chuyen-huong-dang-nhap.html
$routes->match(['get', 'post'], '(gui-yeu-cau-khoi-phuc-mat-khau-thanh-cong)', 'Login::forget_password_success');
$routes->get('(kich-hoat-thanh-cong).html', 'Login::success_active');

// check unique Email,phne and Username
$routes->post('(check_unique_email).html', 'Login::check_unique_email');
$routes->post('(check_unique_username).html', 'Login::check_unique_username');
$routes->post('(check_unique_phone).html', 'Login::check_unique_phone');

// kích hoạt tài khoản
$routes->get('(kich-hoat-tai-khoan-cua-ban)/(:any)', 'Login::activeuser/$2');
$routes->post('validate-upload', 'UseSame::validate_upload');
// đăng ký ngay
$routes->post('dang-ky-ngay', 'Home::footer_register');

// liên hệ
$routes->get('(lien-he)', 'Contact::index');
$routes->post('page-gui-lien-he', 'Contact::send_contact');
//quan-ly-tai-khoan
$routes->get('quan-ly-tai-khoan', 'Profile::index');

//Cập nhật thông tin tài khoản
$routes->match(['get', 'post'], 'cap-nhat-thong-tin-tai-khoan', 'Profile::update');
$routes->post('kiem-tra-data.html', 'Profile::check_all');

//Đổi mật khẩu
$routes->match(['get', 'post'], 'doi-mat-khau', 'Profile::changePassword');

//Đăng xuất
$routes->get('thoat', 'Profile::logout');
// 
$routes->match(['get', 'post'], '(truy-cap-tai-khoan).html', 'Login::Login_user');
$routes->match(['get', 'post'], '(truy-cap-tai-khoan-fb).html', 'Login::Login_user_facebook');

//Đăng tin
$routes->post('load-photo-product', 'Ajax::loadPhotoProduct');
$routes->post('load-photo-product-mobile', 'Ajax::loadPhotoProductMobile');



// đăng ký ngay
$routes->post('gui-lien-he', 'Home::footer_contact');
// đặt món
$routes->get('dat-hang', 'Order::index');
$routes->get('dat-hang-thanh-cong', 'Cart::notify');

// uploads / delete images detail
$routes->post('delete-images-dropzone', 'Cpanel/newsLand::deldropzone');
$routes->post('delete-images-detail', 'Cpanel/newsLand::deldropzonebyID');

// booking
$routes->get('booking', 'Booking::index');
$routes->get('booking-thanh-cong', 'Booking::notify');
$routes->post('(booking).html', 'Booking::order');
// đăng ký khóa học
$routes->post('(dang-ky-khoa-hoc)', 'Home::regisStudy');
$routes->get('dang-ky-khoa-hoc-thanh-cong', 'Home::regisStudyNotify');


// GIỎ HÀNG
$routes->post('get-cart-payment', 'Cart::getAllPaymentCart');
$routes->post('get-all-cart', 'Cart::getAllCart');
$routes->post('add-to-cart', 'Cart::add_to_cart');
$routes->post('update-in-cart', 'Cart::update_in_cart');
$routes->post('remove-item-cart', 'Cart::remove_item');
$routes->post('remove-all-cart' , 'Cart::remove_all'); 

$routes->post('add-cart', 'Cart::addCart');
$routes->post('load-cart', 'Cart::loadCart');
$routes->post('update-cart', 'Cart::updateCart');
$routes->post('delete-cart', 'Cart::deleteItemCart');
$routes->match(['get', 'post'],'thanh-toan', 'Cart::payment');
$routes->get('dat-hang-thanh-cong.html', 'Cart::orderSuccess');
$routes->match(['get', 'post'], 'gio-hang', 'Cart::index');


// tư vấn
$routes->post('dang-ky-tu-van','Advise::index');
$routes->get('(thong-bao-dang-ky-tu-van).html','Advise::notify');
//for FE
$routes->post('load-news', 'Route::loadNews');
$routes->get('tim-kiem.html', 'Route::search');
$routes->post('pagination-search', 'Route::search');
$routes->get('(:any)/(:any)', 'Route::index/$1/$2');
$routes->get('(:any)', 'Route::index/$1/');
$routes->post('pagination-cate-product/(:any)', 'Route::cate_product/$1');
$routes->post('pagination-cate-news/(:any)', 'Route::cate_news/$1');
$routes->post('pagination-contructon-image', 'Route::pagination_imagedetail');
$routes->post('chuyen-doi-ngon-ngu','Home::changeLang');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
