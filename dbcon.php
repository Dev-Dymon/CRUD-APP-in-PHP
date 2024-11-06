<?php

$con =  mysqli_connect("localhost","root","","php_crud_app");

if (!$con) {
    die('Connnection failed'.mysqli_connect_error());
}
