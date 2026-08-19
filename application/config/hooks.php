<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/
$hook['post_system'][] = [
    'class'    => 'ErrorHook',
    'function' => 'shutdown',
    'filename' => 'ErrorHook.php',
];
$hook['post_controller_constructor'][] = [
    'class'    => 'SecurityValidationHook',
    'function' => 'handle',
    'filename' => 'SecurityValidationHook.php',
    'filepath' => 'hooks'
];
$hook['post_controller_constructor'][] = [
    'class'    => 'XssValidationHook',
    'function' => 'handle',
    'filename' => 'XssValidationHook.php',
    'filepath' => 'hooks',
];