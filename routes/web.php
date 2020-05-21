<?php
Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm')->name('login.writer');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm')->name('register.writer');
Route::get('/register/user', 'Auth\RegisterController@showUserRegisterForm')->name('register.user');
Route::get('/login/user', 'Auth\RegisterController@showUserLoginForm')->name('login.user');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/writer', 'Auth\LoginController@writerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/writer', 'Auth\RegisterController@createWriter')->name('register.writer');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
    Route::resource('/admin/dashboard', 'Admin\DashboardController');
    Route::resource('/admin/blog', 'Admin\BlogController');
    Route::resource('/admin/gallarycontent', 'Admin\GallaryController');
    Route::resource('/admin/content-testimonial', 'Admin\ContentTestimonialController');
    Route::resource('/admin/content-pricing', 'Admin\ContentPricingController');
    Route::resource('/admin/content-we-are-here', 'Admin\ContentWeAreHereController');
    Route::resource('/admin/contactuscontent', 'Admin\ContactuscontentController');
    Route::resource('/admin/faqcontent', 'Admin\FaqcontentController');
    Route::resource('/admin/content-terms', 'Admin\ContentTermsController');
    Route::resource('/admin/slidercontent', 'Admin\SlidercontentController');
    Route::resource('/admin/aboutuscontent', 'Admin\AboutuscontentController');
    Route::resource('/admin/homecontent', 'Admin\HomecontentController');
    Route::resource('/admin/testimonialcontent', 'Admin\TestimonialcontentController');
    Route::resource('/admin/termconditioncontent', 'Admin\TermconditioncontentController');
    Route::resource('/admin/weareherecontent', 'Admin\WeareherecontentController');
   
});

Route::get('about_us', 'User\UserController@about_us')->name('about_us');
Route::resource('ourgallary', 'OurgallaryController');
Route::resource('contact', 'ContactController');
Route::resource('ourblogs', 'OurblogController');
Route::resource('faqs', 'User\FaqController');
Route::resource('termsandconditions', 'User\TermconditionController');

