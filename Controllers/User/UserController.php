<?php

namespace Controllers\User;

use Models\User\UserManager;

class UserController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function register()
    {
        require_once './errors.php';

        $errors = [
            'firstname' => '',
            'lastname' => '',
            'email' => '',
            'password' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $_POST = filter_input_array(INPUT_POST, [
                'firstname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'lastname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'email' => [
                    'filter' => FILTER_VALIDATE_EMAIL,
                    'filter' => FILTER_SANITIZE_EMAIL
                ]
            ]);

            $firstname = $_POST['firsname'] ?? '';
            $lastname = $_POST['lastname'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!$firstname) {
                $errors['firstname'] = ERROR_FIRSTNAME;
            }
            if (!$lastname) {
                $errors['lastname'] = ERROR_LASTNAME;
            }
            if (!$email) {
                $errors['email'] = ERROR_MISSING_MAIL;
            }

            if (!$password) {
                $errors['password'] = ERROR_MISSING_PASSWORD;
            } elseif (mb_strlen($errors['password'] < 10)) {
                $errors['password'] = ERROR_CHARACTER_PASSWORD;
            }

            if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
                $this->userManager->register($firstname, $lastname, $email, $password);
                header('Location: login');
            }
        }
        require_once './Views/formUser.php';
    }
}
