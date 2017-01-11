<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 10/01/2017
 * Time: 12:51
 */

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}