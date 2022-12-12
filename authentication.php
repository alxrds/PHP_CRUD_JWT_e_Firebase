<?php
    session_start();
    include('dbcon.php');

    use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

    if(isset($_SESSION['verified_user_id'])){

        $uid = $_SESSION['verified_user_id'];
        $idTokenString =  $_SESSION['idTokenString'];

        try {
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
        } catch (FailedToVerifyToken $e) {
            echo 'The token is invalid: '.$e->getMessage();
            $_SESSION['status'] = "Token Expirado";
            header("Location: logout.php");
        }

    }else{
        $_SESSION['status'] = "É necessário esta logado para acessar o sistemas";
        header("Location: login.php");
        exit();
    }
