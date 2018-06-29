<?php

require_once 'BraicanUtil.php';

class BraicanAPI {

    public $namespace = 'braican/v1';

    function __construct() {

        add_action('rest_api_init', array($this, 'register_route'));

        new BraicanUtil();
    }

    public function register_route() {
        // project routes

        register_rest_route( $this->namespace, '/projects.json', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_projects'),
        ));

        register_rest_route( $this->namespace, '/project/(?P<id>\d+).json', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_project_by_id'),
            'args' => array(
                'id' => array(
                    'validate_callback' => function($param, $request, $key) {
                        return is_numeric( $param );
                    }
                ),
            )
        ));


        // other content
        
        register_rest_route( $this->namespace, '/home.json', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_home'),
        ));

    }

    /**
     * Get all projects
     */
    public function get_projects() {
        $projects = get_posts(array(
            'post_type'      => 'project',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
        ));

        if (empty($projects)) {
            return new WP_Error( 'no_projects', 'No projects', array( 'status' => 404 ) );
        }

        return array_map(function($project) {
            return apply_filters('braican_api_project', $project);
        }, $projects);
    }

    /**
     * Get project by ID
     */
    public function get_project_by_id(WP_REST_Request $request) {
        $project_id = $request->get_param('id');
        
        $project = get_post($project_id);

        if (empty($project)) {
            return new WP_Error( 'no_project', 'No project with that ID', array( 'status' => 404 ) );
        }

        return apply_filters('braican_api_project', $project);
    }


    /**
     * Get home content
     */
    public function get_home() {
        $front_page = get_option( 'page_on_front' );
        
        if (empty($front_page)) {
            return new WP_Error('no_home', 'No page has been set to home', array('status' => 404));
        }

        return get_fields($front_page);
    }

}