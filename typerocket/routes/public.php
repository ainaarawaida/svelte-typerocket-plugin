<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your WordPress site. These
| routes are loaded from the TypeRocket\Http\RouteCollection immediately
| after the typerocket_routes action is fired.
|
*/
use Illuminate\Database\Capsule\Manager as DB;

// tr_route()->get()->match('/')->do(function () {
//     if (DB::schema()->hasTable('wp_userss')) {
//         // The users table exists
//         dd("ada");
//     } else {
//         // The users table does not exist
//         dd("tiada");
//     }
//     $results = collect(DB::select("select * from wp_users"))->first();
//     dd($results->user_login);
// });

$current_user = wp_get_current_user();
if (is_user_logged_in() && !in_array('administrator', $current_user->roles)) {

    tr_route()->get()->match('/my-account')->do('index@apps');

    tr_route()->get()->match('/api/users')->do('index@users');
    tr_route()->get()->match('/api/users/add')->do('create@users');
    tr_route()->post()->match('/api/users/create')->do('store@users');
    tr_route()->get()->match('/api/users/edit/([^/]+)', ['id'])->do('edit@users');
    tr_route()->post()->match('/api/users/update/([^/]+)', ['id'])->do('update@users');
    tr_route()->post()->match('/api/users/delete/([^/]+)', ['id'])->do('delete@users');

}