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

use App\Http\Controllers\UserController;
use App\Services\UserService;
use App\User;
use Carbon\Carbon;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', function () {

    $user = User::first();

    $user->meta = [
        'role' => 'admin',
        'note' => 'A ha ha',
    ];

//    $user->save();

    return dd($user->meta);
    dd($user->is_active);

//    \DB::enableQueryLog();
//    $users = User::query()->with('posts')->get();
//
//    dd(collect(\DB::getQueryLog())->sum('time'));

//    $post = new Post([
//        'title' => 'Some title here'
//    ]);
//
//    $post->title = 'PHP Array Access';
//
//    $user = User::find(1);
//
//    dd(isset($post->title), isset($user->name));
//    dd($post->title, $post['title']);
//
//
//    dd($user->name, $user['name']);
//    $post['title'] = 'PHP Array Access';
//    unset($post['title']);
//    dd($post['title']);
//    dd($post['title']);

//    $users = User::all();
});

Route::get('container', function () {
    $reflect = new ReflectionClass(UserController::class);
    $parameters = $reflect->getConstructor()->getParameters();

    $method = $reflect->getMethod('register');

//    dd($method->getParameters());
//    dd($parameters[0]->getClass()->getConstructor()->getParameters());

    $container = Container::getInstance();

    $dependencies = [];
    foreach ($parameters as $parameter) {
        $dependencies[] = $container->make($parameter->getType()->getName());
    }

    $controller = new UserController(...$dependencies);

    $container->call([$controller, 'register']);
//    $controller->register($container->make(UserService::class));

    dd($controller);

    $needsToInjected = [];
    foreach ($parameters as $parameter) {
        $parameter->getName();
        $parameter->getClass();
    }
});

Route::get('users/register', 'UserController@register');

Route::get('users/{user}/posts', 'UserPostController@show');

Route::get('posts', function () {
    $posts = Post::where('published_at', '<=', Carbon::now())->paginate($limit = 10, $page = 1);
    return $posts;
});
