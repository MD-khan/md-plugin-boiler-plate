<?php

/**
 * @package  MdPluginBoilerPlate
 */

namespace App\Pages;

class Admin
{

    public function register()
    {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    public function add_admin_pages()
    {
        add_menu_page(
            'Md Plugin Boiler Plate',
            'Plugin Boiler Plate',
            'manage_options',
            'plugin-boiler',
            array($this, 'admin_index'),
            'dashicons-plugins-checked',
            110
        );
    }

    public function admin_index()
    {
        require_once PLUGIN_PATH . 'templates/admin.php';
    }
}
