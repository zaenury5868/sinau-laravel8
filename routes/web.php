<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use PhpParser\Node\Expr\AssignOp\Pow;

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
    return redirect('/about');
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

Route::get('/read', function () {
    // $query = DB::select('select * from posts where id = ?', [1]);
    $query = DB::table('posts')->where('id', 1)->first();
    return var_dump($query);
});

Route::get('/update', function () {
    // $updated = DB::update('update posts set title = "Update field title" where id = ?', ['1']);
    $data = [
        'title' => 'isian title',
        'body' => 'isian body baru'
    ];
    $updated = DB::table('posts')->where('id', 1)->update($data);
    return $updated;
});

Route::get('/delete', function () {
    // $delete = DB::delete('delete from posts where id = ?', [1]);
    $delete = DB::table('posts')->where('id', 2)->delete();
    return $delete;
});

 Route::get('/posts', function () {
    $posts = Post::all();
    return $posts;
 });

 Route::get('/find', function () {
     $post = Post::find(5);
     return $post;
 });

 Route::get('/findwhere', function () {
     $post = Post::where('user_id', 2)->orderBy('id', 'desc')->take(1)->get();
     return $post;
 });

 Route::get('/create', function () {
     $post = new Post();
     $post->title = 'isi judul postingan';
     $post->body = 'isi body dari postingan';
     $post->user_id = Auth::user()->id;

     $post->save();
 });

 Route::get('/createpost', function () {
    $post = Post::create([
        'title' => 'Create data dari method create',
        'body' => 'salam dari cilacap',
        'user_id' => Auth::user()->id
        ]);
        echo "data berhasil ditambahkan";
 });

 Route::get('/updatepost', function () {
    //  $post = Post::where('id', 5);
     $post = Post::find(5);
     $post->update([
        'title' => 'Create data dari method create',
        'body' => 'salam dari cilacap',
        'user_id' => 4
    ]);
    echo "data berhasil diubah";
 });

 Route::get('/deletepost', function () {
    //  $post = Post::find(4);
    //  $post->delete();
     echo "data berhasil dihapus";

    // Post::destroy([6, 7]);
    $post = Post::where('user_id', 2);
    $post->delete();
 });

 Route::get('/softdelete', function () {
     Post::destroy(8, 9, 10);
 });

 Route::get('/trash', function () {
    //  $post = Post::withTrashed()->get();
    $post = Post::onlyTrashed()->get();
     return $post;
 });

 Route::get('/restore', function () {
     $post = Post::onlyTrashed()->restore();
     return $post;
 });

 Route::get('/forcedelete', function () {
    // $post = Post::onlyTrashed()->where('id', 10)->forceDelete();
    // $post = Post::onlyTrashed()->forceDelete();
    $post = Post::find(12)->forceDelete();
    dd($post);
 });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', 'HomeController@user');