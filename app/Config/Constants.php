<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
//
defined('CPANEL') or define('CPANEL', 'cpanel/');
// CRUD notify
defined('ADD_SUCCESS') or define('ADD_SUCCESS', 'Thêm dữ liệu thành công!');
defined('ADD_FAIL') or define('ADD_FAIL', 'Thêm dữ liệu thất bại!');
defined('EDIT_SUCCESS') or define('EDIT_SUCCESS', 'Cập nhật dữ liệu thành công!');
defined('EDIT_FAIL') or define('EDIT_FAIL', 'Cập nhật dữ liệu thất bại!');
// validate
defined('REQUIRED') or define('REQUIRED', 'Trường này là bắt buộc');
defined('is_unique') or define('is_unique', 'đã tồn tại');

// FE
defined('ADMIN_MENUNEWSLAND_URL')      or define('ADMIN_MENUNEWSLAND_URL', 'cpanel/menuNewsLand/');
defined('ADMIN_MENUNEWS_URL')      or define('ADMIN_MENUNEWS_URL', 'cpanel/menuNews/');
defined('ADMIN_MENUPRODUCT_URL')      OR define('ADMIN_MENUPRODUCT_URL', 'cpanel/menuProduct/');
defined('ADMIN_MENU')      or define('ADMIN_MENU', 'cpanel/menu/');
defined('TEMPLATE_FE') or define('TEMPLATE_FE', 'frontend/');
defined('TEMPLATE_FE_MB') or define('TEMPLATE_FE_MB', 'frontendMobile/');
defined('TEXT_UPDATE') or define('TEXT_UPDATE', 'Đang cập nhật...');
defined('TEXT_DEAL') or define('TEXT_DEAL', 'Giá thỏa thuận');
defined('DASHBOARD_USER') or define('DASHBOARD_USER', 'thong-ke');
//======================\ FACEBOOK LOGIN INFO ===============//
define('APP_ID', '309036620956777');
define('APP_SECRET', 'd94e6df3e677c49c268433e0183a7070');
define('API_VERSION', 'v2.5');
define('FB_BASE_URL', 'truy-cap-tai-khoan-fb.html/');
//======================/ FACEBOOK LOGIN INFO ===============//
// Cấu hình LOGIN GOOGLE
defined('CLIENTID') or define('CLIENTID', '837197200132-ivi4qa86t86p8umkr6qltbejrkon3hbc.apps.googleusercontent.com');
defined('CLIENTSECRET') or define('CLIENTSECRET', 'UKbu5vBwTMl6IU8B6QXvQaVP');
defined('REDIRECTURI') or define('REDIRECTURI', 'truy-cap-tai-khoan.html');
defined('EMAIL') or define('EMAIL', 'email');
defined('PROFILE') or define('PROFILE', 'profile');
// Cấu hình thanh toán ngân lượng
define('URL_API', 'https://www.nganluong.vn/checkout.api.nganluong.post.php'); // Đường dẫn gọi api
define('RECEIVER', 'hieu.optech@gmail.com'); // Email tài khoản ngân lượng
define('MERCHANT_ID', '36680'); // Mã merchant kết nối
define('MERCHANT_PASS', 'matkhauketnoi'); // Mật khẩu kết nôi
// =====================
// define('CLIENT_KEY_CAPTCHA', '6LfJl14dAAAAAC6kXE4JpDBdzyctUUTmxfTjBPnO');  // localhost
// define('SERVER_CAPTCHA', '6LfJl14dAAAAAO-VbHCiCvHgPZe2KYY_PGDsogrq');  // localhost

define('CLIENT_KEY_CAPTCHA', '6LcKknYdAAAAAOtCYfo-1RFvzlmmShmZg3dp5_W3');  // hosting
define('SERVER_CAPTCHA', '6LcKknYdAAAAAOVTWgBhp-hk-g7nlBPPFVw7Pdyy');  // hosting
defined('ADMIN_CONSCATE_URL')      or define('ADMIN_CONSCATE_URL', 'cpanel/constructionCategories/');

// config baseURL
if (isset($_SERVER['HTTP_HOST']) === TRUE) {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://'.$_SERVER['HTTP_HOST'] : 'http://'.$_SERVER['HTTP_HOST'];
}else{
    $protocol = 'http://localhost:8080/';
}
defined('BASEURL') || define('BASEURL', $protocol);
