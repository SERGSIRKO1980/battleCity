<?php
    function get_config_property ($key) {
        $properties = [
            'title' => 'Auto Blog',
            'author' => 'Kozlik Sergey',
            'email' => 'kozlik1844@gmail.com'
        ];

        if (isset($key)) {
            if ($properties[$key]) {
                return $properties[$key];
            } else {
                return 'Unknown key';
            }
        } else {
            return null;
        }
    }
