<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/Hello', function(){
//     return view('helloworld');
// });

//Hoc Router
Route::get('/KhoaHoc',function(){
	return "Hello world";
});
Route::get('Harrison/Laravel',function(){
	echo "<h1>Khoa hoc Laravel</h1>";
});
//Truyen tham so tren Route
Route::get('HoTen/{ten}',function($ten){
	echo "Ten cua ban la: ".$ten;
});
Route::get('Laravel/{ngay}',function($ngay){
	echo "Khoa pham".$ngay;
})->where(['ngay'=>'[a-z]+']);
//Dinh danh cho route.
Route::get('Route1',['as'=>'MyRoute',function(){
	echo "Hello";
}]);
Route::get('Route2',function(){
	echo "Day la route 2";
})->name('MyRoute2');
Route::get('Goiten',function(){
	return redirect()->route('MyRoute2');
});

//Group Route
Route::group(['prefix'=>'MyGroup'],function(){
	Route::get('User1',function(){
		echo "User 1";
	});
	Route::get('User2',function(){
		echo "User 2";
	});
	Route::get('User 3' ,function(){
		echo "user 3";
	});
});

Route::get('GoiController','MyController@XinChao');
Route::get('ThamSo/{$ten}','MyController@KhoaHoc');


Route::get('/hello/{year}/{yourname?}', function($year, $yourname = null){
    $hello_string = '';
    if($yourname == null){
        $hello_string = 'Hello '.$year;
    }else {
        $hello_string=  'Hello world '.$year.'.My name is: '.$yourname;
    }
    return view('helloworld')->with('hello_str', $hello_string);
});


Route::get('dashboard', function() {
    //
})->middleware('auth','checkage');


Route::get('role',[
    'middleware'=> 'role:superadmin',
    'uses'=>'MainController@checkRole'
]);

// Route::get('/', function () {
//     //
// })->middleware('web');

Route::group(['middleware' => ['web']], function () {
    //
});
Route::get('tintuc/{news_id_string}', 'MainController@showNew');
Route::get('controllermiddleware',[
    'middleware'=> 'First',
    'uses'=>'TestController@testControllerMiddleware'
]);
Route::resource('photo', 'PhotoController');
Route::get('category/laravel-nangcao','MainController@uriTest');
Route::get('user-info','MainController@getUserInfo');
// Route::get('contact','ContactController@showContactForm');
// Route::post('contact','ContactController@insertMessage');
//Response Laravel

Route::get('basic-json-response',function(){
    return response()->json([
    'name' => 'All Laravel',
    'version' => 'Laravel 5.4',
    'website' => 'http://allaravel.com'
]);

});

//Balde template
Route::get('first-blade-example',function(){
    return view('fontend.first-blade-example');
});
Route::get('components',function(){
    return view('fontend.component-example');
});
use Illuminate\Support\Facades\View;

Route::get('contact', function () {
    if (View::exists('contact')) {
        return view('contact');
    } else {
        return 'Trang liên hệ đang bị lỗi, bạn vui lòng quay lại sau';
    }
});
Route::get('news', function () {
    $news_list = array(
    ['title' => 'Bài viết số 1', 'content' => 'Nội dung bài viết 1', 'post_date' => '2017-01-03'],
    ['title' => 'Bài viết số 2', 'content' => 'Nội dung bài viết 2', 'post_date' => '2017-01-03'],
    ['title' => 'Bài viết số 3', 'content' => 'Nội dung bài viết 3', 'post_date' => '2017-01-03'],
    ['title' => 'Bài viết số 4', 'content' => 'Nội dung bài viết 4', 'post_date' => '2017-01-03']
    );
    return view('fontend.news-list')->with(compact('news_list'));
});

Route::get('login',function(){
    return view('fontend.login');
});

Route::post('login', function () {
    $username = Request::input('username');
    $password = Request::input('password');
    if ($username == 'admin' && $password == '123456') {
        Request::session()->put('login', true);
        Request::session()->put('name', 'Nguyễn Văn A');
        return view('fontend.login')->with('success', 'Đăng nhập thành công.');
    } else {
        return view('fontend.login')->with('fail', 'Đăng nhập không thành công, sai username hoặc password.');
    }
});

Route::get('logout', function () {
    Request::session()->flush();
    return view('fontend.login');
});

//Form validate
Route::get('register', 'UserController@showRegisterForm');
Route::post('register', 'UserController@storeUser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('product', 'ProductController', ['only' => [
    'create', 'store', 'edit'
]]);

