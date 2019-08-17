<?php
/**
 * Add the custom post types.
 *
 * @package BraicanApi.
 */

namespace BraicanApi\Managers;

class PostTypes {
    public static function register() {
        /**
         * Project, single page
         */
        register_post_type('project', array(
            'labels' => array(
                'name'               => __( 'Projects', 'sherman' ),
                'singular_name'      => __( 'Project', 'sherman' ),
                'add_new_item'       => __( 'Add new Project', 'sherman' ),
                'edit_item'          => __( 'Edit Project', 'sherman' ),
                'new_item'           => __( 'New Project', 'sherman' ),
                'view_item'          => __( 'View Project', 'sherman' ),
                'search_items'       => __( 'Search Projects', 'sherman' ),
                'not_found'          => __( 'No Projects found', 'sherman' ),
                'not_found_in_trash' => __( 'No Projects found in Trash', 'sherman' ),
            ),
            'supports'  => array('title', 'editor', 'thumbnail'),
            'public'    => true,
            'menu_icon' => 'dashicons-hammer',
            'rewrite'   => array(
                'slug' => 'work',
            ),
        ));
    }
}
