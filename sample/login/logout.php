<?php
require_once 'etd-qa-session.php';

(isset($_GET['login'])) ? $login = $_GET['login'] : $login = 'login.php';

clear_session();
isset($_SESSION['login']) ? var_dump($_SESSION['login']) : var_dump('');

// $url = array('chk' => 'logout', 'org' => '#', 'dest' => 'login.php');
$url = array('chk' => 'logout', 'org' => '#', 'dest' => $login);
check_session($url);