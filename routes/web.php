<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use App\Tag;
use App\User;
use App\Video;
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

Route::get('/create',function(){
    $post = Post::create(["name"=>"my second post"]);
    $tag1 = Tag::findOrFail(3);
    $post->tags()->save($tag1);

    // $video = Video::create(["name"=>"myfirstvideo.mov"]);
    // $tag2 = Tag::findOrFail(2);
    // $video->tags()->save($tag2);
});

Route::get('/read',function(){
    $post = Post::findOrFail(1);
    foreach($post->tags as $tag){
        return $tag;
    }
});

Route::get('/update',function(){
    $post = Post::findOrFail(1);
    foreach($post->tags as $tag){
        return $tag->whereName('php')->update(['name'=>'updated php']);
    }

    // $post = Post::findOrFail(1);
    // $tag = Tag::findOrFail(3);

    // $post->tags()->sync($tag);
});

Route::get('/delete',function(){
    $post = Post::find(2);

    foreach($post->tags as $tag){
        $tag->whereId(3)->delete();
    }
});