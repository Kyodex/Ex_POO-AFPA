<?php
require 'login_controller.php';
session_start();
if ($_SESSION['login']){
unset($_SESSION['login']);
header("Location: ../views/login.php");
}