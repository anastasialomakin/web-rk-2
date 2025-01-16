<?php
    session_start();
    include 'database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'];
        if ($action === 'login') {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $user = getUserByLoginOrEmail($login, $conn); 

           if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: ../account.php');
               exit;
            } else {
               header('Location: ../login.php?error=1');
               exit;
            }
        }
        if ($action === 'register') {
            $username = $_POST['username'];
            $email = $_POST['email'];
             $phone = $_POST['phone'];
             $password = $_POST['password'];
             $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
           $result = createUser($username, $email, $phone, $hashedPassword, $conn);
             if($result){
                 header('Location: ../register.php?success=1');
            exit;
              } else{
                 echo "Ошибка регистрации.";
             }
        }
       if ($action === 'logout') {
             session_destroy();
            header('Location: ../index.php');
            exit;
       }
    }
?>