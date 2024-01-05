<?php
namespace App\Controllers;

use App\Models\apps;
use TypeRocket\Controllers\Controller;
use Illuminate\Database\Capsule\Manager as DB;

class appsController extends Controller
{
    /**
     * The index page for admin
     *
     * @return mixed
     */
    public function index()
    {

        $current_user = wp_get_current_user();
        $user_roles = $current_user->roles;
    
        // User is an administrator
        $logo_id = get_theme_mod('custom_logo');
        if ($logo_id) {
            $logo_url = wp_get_attachment_image_src($logo_id, 'full')[0];
        } else {
            $logo_url = '';
        }
        $username = $current_user->user_login;
        $gravatar_url = get_avatar_url(wp_get_current_user(), array('size' => 96));
   
        // TODO: Implement index() method.y
        return tr_view('apps.index', compact('current_user', 'logo_url', 'gravatar_url'));

    }

    /**
     * The add page for admin
     *
     * @return mixed
     */
    public function add()
    {
        // TODO: Implement add() method.
    }

    /**
     * Create item
     *
     * AJAX requests and normal requests can be made to this action
     *
     * @return mixed
     */
    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * The edit page for admin
     *
     * @param string|apps $apps
     *
     * @return mixed
     */
    public function edit(apps $apps)
    {
        // TODO: Implement edit() method.
    }

    /**
     * Update item
     *
     * AJAX requests and normal requests can be made to this action
     *
     * @param string|apps $apps
     *
     * @return mixed
     */
    public function update(apps $apps)
    {
        // TODO: Implement update() method.
    }

    /**
     * The show page for admin
     *
     * @param string|apps $apps
     *
     * @return mixed
     */
    public function show(apps $apps)
    {
        // TODO: Implement show() method.
    }

    /**
     * The delete page for admin
     *
     * @param string|apps $apps
     *
     * @return mixed
     */
    public function delete(apps $apps)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Destroy item
     *
     * AJAX requests and normal requests can be made to this action
     *
     * @param string|apps $apps
     *
     * @return mixed
     */
    public function destroy(apps $apps)
    {
        // TODO: Implement destroy() method.
    }
}