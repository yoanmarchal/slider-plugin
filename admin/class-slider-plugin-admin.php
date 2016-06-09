<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @author     Your Name <email@example.com>
 */
class slider_plugin_Admin
{
    /**
         * The ID of this plugin.
         *
         * @since    1.0.0
         *
         * @var string The ID of this plugin.
         */
        private $slider_plugin;

        /**
         * The version of this plugin.
         *
         * @since    1.0.0
         *
         * @var string The current version of this plugin.
         */
        private $version;

         /**
          * Initialize the class and set its properties.
          *
          * @since    1.0.0
          *
          * @param      string    $slider_plugin       The name of this plugin.
          * @param      string    $version    The version of this plugin.
          */

         /**
          * Holds the values to be used in the fields callbacks.
          */
         private $options;

    public function __construct($slider_plugin, $version)
    {
        $this->slider_plugin = $slider_plugin;
        $this->version = $version;
        add_action('init', [$this, 'homepage_slider']);
    }

        /**
         * Register the stylesheets for the admin area.
         *
         * @since    1.0.0
         */
        public function enqueue_styles()
        {

            /*
             * This function is provided for demonstration purposes only.
             *
             * An instance of this class should be passed to the run() function
             * defined in slider_plugin_Loader as all of the hooks are defined
             * in that particular class.
             *
             * The slider_plugin_Loader will then create the relationship
             * between the defined hooks and the functions defined in this
             * class.
             */

            wp_enqueue_style($this->slider_plugin, plugin_dir_url(__FILE__).'css/social-link-admin.css', [], $this->version, 'all');
        }

        /**
         * Register the JavaScript for the admin area.
         *
         * @since    1.0.0
         */
        public function enqueue_scripts()
        {

            /*
             * This function is provided for demonstration purposes only.
             *
             * An instance of this class should be passed to the run() function
             * defined in slider_plugin_Loader as all of the hooks are defined
             * in that particular class.
             *
             * The slider_plugin_Loader will then create the relationship
             * between the defined hooks and the functions defined in this
             * class.
             */

            wp_enqueue_script($this->slider_plugin, plugin_dir_url(__FILE__).'js/social-link-admin.js', ['jquery'], $this->version, false);
        }

    public function homepage_slider()
    {
        $labels = [
            'name'                => _x('Slides', 'Post Type General Name', 'slider-plugin'),
            'singular_name'       => _x('Slide', 'Post Type Singular Name', 'slider-plugin'),
            'menu_name'           => __('Homepage Slider', 'slider-plugin'),
            'parent_item_colon'   => __('Parent Slide:', 'slider-plugin'),
            'all_items'           => __('All Slides', 'slider-plugin'),
            'view_item'           => __('View Slide', 'slider-plugin'),
            'add_new_item'        => __('Add New Slide', 'slider-plugin'),
            'add_new'             => __('New Slide', 'slider-plugin'),
            'edit_item'           => __('Edit Slide', 'slider-plugin'),
            'update_item'         => __('Update Slide', 'slider-plugin'),
            'search_items'        => __('Search slides', 'slider-plugin'),
            'not_found'           => __('No slides found', 'slider-plugin'),
            'not_found_in_trash'  => __('No slides found in Trash', 'slider-plugin'),
        ];

        $args = [
            'label'               => __('homepage_slider', 'slider-plugin'),
            'description'         => __('Homepage Slides', 'slider-plugin'),
            'labels'              => $labels,
            'supports'            => ['title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields'],
            'taxonomies'          => ['category', 'post_tag'],
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => true,
            'menu_position'       => 20,
            'menu_icon'           => '',
            'can_export'          => false,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
        ];
        register_post_type('homepage_slider', $args);
    }
}
