<?php
session_start();
include('dbcon.php');

if(isset($_POST['login_now'])){

    $email = $_POST['email'];
    $clearTextPassword = $_POST['senha'];

    try {

        $user = $auth->getUserByEmail("$email");

        $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
        $idTokenString = $signInResult->idToken();

        try {
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
            $uid = $verifiedIdToken->claims()->get('sub');

            $_SESSION['verified_user_id'] = $uid;
            $_SESSION['idTokenString'] = $idTokenString;

            $_SESSION['status'] = "Usuário logado com sucesso";
            header("Location: home.php");
            exit();

        } catch (FailedToVerifyToken $e) {
            echo 'The token is invalid: '.$e->getMessage();
        }
        
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        $_SESSION['status'] = "Usuário não encontrado";
        header("Location: login.php");
        exit();
    }
}