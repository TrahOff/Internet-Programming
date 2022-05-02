<?php
session_start();
require_once 'connect.php';

unset($_SESSION['other']);
unset($_SESSION['password']);
unset($_SESSION['avatar']);
unset($_SESSION['delete']);
unset($_SESSION['Game']);
unset($_SESSION['end']);

header('location: ../profile.php');
