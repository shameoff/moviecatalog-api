<?php

const CONTROLLERS_DIR = __DIR__ . "/application/controllers/";
const CORE_DIR = __DIR__ . "/application/core/";
const PROJECT_DIR = __DIR__;
const APPLICATION_DIR = __DIR__ . "/application/";


function clean($data) {
    if (is_array($data)) {
        foreach ($data as $key => $value) {

            // Delete key
            unset($data[$key]);

            // Set new clean key
            $data[clean($key)] = clean($value);
        }
    } else {
        $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
    }

    return $data;
}
echo json_encode($_SERVER);
echo "\n";
echo json_encode(clean($_SERVER));