<?php

class BraicanUtil {

    static function map_acf_fields($obj) {
        $id = $obj->ID;
        $acf_fields = get_fields($id);

        $obj->custom_fields = $acf_fields;

        return $obj;
    }
}
