<?php
session_start();
require_once 'connect.php';

$_SESSION['other'] = 'Другие пользователи';
header('location: ../profile.php');