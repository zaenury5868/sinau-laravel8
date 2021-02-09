<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return 'jkhkjhkjh';
});
Route::get('/blog', 'PostController@po');

// Route::get('/post/{id}', ['as' => 'post.detail', function ($id) {
//     echo "Post $id";
//     echo "</br>";
//     echo "Body post in iD $id";
// }]);

Route::resource('post', 'PostController');
Route::get('/insert', function () {
    // DB::insert('insert into posts (title, body,user_id) values (?,?,?)', ['Belajar php dengan laravel', 'Laravel the best framework', '1']);
    $data =[
        'title' => 'Disini isian title',
        'body' => 'Isian body untuk table posts',
        'user_id' => 2
    ];
    DB::table('posts')->insert($data);
    echo "Data berhasil ditambahkan";
});

Route::get('read', function () {
    // $query = DB::select('select * from posts where id = ?', [1]);
    $query = DB::table('posts')->where('id', 1)->first();
    return var_dump($query);
});