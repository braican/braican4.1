<?php

class BraicanUtil {

    public function __construct() {
        add_filter('braican_api_project', array($this, 'map_acf_fields'));
        add_filter('braican_api_project', array($this, 'map_post_thumbnail'));
    }

    public function map_acf_fields($obj) {
        $id = $obj->ID;
        $acf_fields = get_fields($id);

        if ($acf_fields) {
            foreach ($acf_fields as $key => $field) {
                $obj->{$key} = $field;
            }
        }

        return $obj;
    }

    public function map_post_thumbnail($obj) {
        $id = $obj->ID;
        
        $obj->thumbnail = false;

        if (has_post_thumbnail($id)) {
            $obj->thumbnail = get_the_post_thumbnail_url($id, 'full');
        }

        return $obj;
    }
}
