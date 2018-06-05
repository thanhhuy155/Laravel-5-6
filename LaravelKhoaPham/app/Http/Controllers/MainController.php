<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function checkRole()
    {
        echo "<br>Main Controller: checkRole function";
        echo "<br>Main Controller: checkRole function";
        echo "<br> Thien hien sau khi qua bo loc  Middlewareva truoc khi qa HTTP respponse";
    }
    public function showNew($news_id_string)
    {
        $news_id_arr = explode('-', $news_id_string);
        $news_id = end($news_id_arr);
        //Lay thogn tin bai viet new_id
        $news_title = 'THe new from Harrison with id: '.$news_id;
        return view('newsdetail')->with(['news_id'=> $news_id, 'news_title'=>$news_title]);
    }
    public function uriTest(Request $request)
    {
        $uri = $request->path();
        echo $uri;
        //Tra ve catelogu/laravel-nangcao
        if ($request->is('admin/*')) {
            //cac duong dan bat dau  bang ADmin se dc xu ly
            echo '<br> Admin Path';
        }
        if ($request->is('category/laravel-nangcao')) {
            //tra ve duong dan Laravel
            echo '<br> Duogn dan ban vua nhap hop le voi  Router '.$request->path();
        }
        $uri =$request->url();
        //Full link
        echo '<br>Full linkL  '.$uri;
        $full_url = $request->fullurl();
        echo '<br>Full link + query string '.$full_url;
        $method = $request->method();
        if ($request->isMethod('post')) {
            echo '<br>Post method';
        } else {
            echo '<br>GET method';
            $ip_address = $request->ip();
            echo '<br>Địa chỉ IP người dùng: ' . $ip_address;
            $server_address = $request->server('SERVER_ADDR');
            echo '<br>Địa chỉ IP máy chủ: ' . $server_address;

            $url_referer = $request->server('URL_REFERER');
            echo '<br>Đường dẫn xuất phát: ' . $url_referer;
            $user_agent = $request->header('User-Agent');
            echo '<br> '.$user_agent;
        }
    }
    public function getUserInfo(Request $request)
    {
        $ip_address = $request->ip();
        echo '<br> Dia chi IP la: '.$ip_address;
        $server_address = $request->server('SERVER_ADDR');
        echo '<br> IPmay chu: '.$server_address;
        $url_referer = $request->server('URL_REFERER');
        echo '<br>Đường dẫn xuất phát: ' . $url_referer;

        $user_agent =$request->header('User-Agent');
        echo '<br> Thong  tin ve trinh duyet: '.$user_agent;
    }
}
