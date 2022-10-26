<?php

use Controllers\User\UserController;

function autoload($class)
{
    require_once "$class.php";
}
spl_autoload_register("autoload");

$userController = new UserController();
$page = $_GET['page'] ?? '';

ob_start();

if (empty($page)) {
    header('Location: login');
} else {
    if ($page === 'register') {
        $userController->register();
    } elseif ($page === 'login') {
        require_once './Views/formUser.php';
    } elseif ($page === 'profile') {
    }
}
$content = ob_get_clean();
require_once './Views/template/template.php';
