<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('set_custom_cookie')) {
    function set_custom_cookie() {
        $CI =& get_instance();

        $cookie = array(
            'name'   => 'mis_dm',
            'value'  => 'page',
            'expire' => '3600',
            'domain' => 'mis-darulmaarif.sch.id',
            'path'   => '/',
            'prefix' => '',
            'secure' => TRUE,
            'httponly' => TRUE,
            'samesite' => 'None'
        );

        $CI->input->set_cookie($cookie);
    }
}