<?php

session_start();
include('dbcon.php');

if(isset($_POST['register_new'])){

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    $userProperties = [
        'displayName' => $nome ." ". $sobrenome,
        'nome' => $nome,
        'sobrenome' => $sobrenome,
        'email' => $email,
        'emailVerified' => false,
        'telefone' => "+55".$telefone,
        'senha' => $senha
    ];

    $createdUser = $auth->createUser($userProperties);

    if($createdUser){
        $_SESSION['status'] = "Usuário inserido com sucesso";
        header("Location: register.php");
    }else{
        $_SESSION['status'] = "Usuário  não inserido";
        header("Location: register.php");
    }

}

if(isset($_POST['save_data'])){

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $postData = [
        'nome' => $nome,
        'sobrenome' => $sobrenome,
        'email' => $email,
        'telefone' => $telefone
    ];

    $ref_table = "contatos";
    $postRef = $database->getReference($ref_table)->push($postData);

    if($postRef){
        $_SESSION['status'] = "Dados inseridos com sucesso";
        header("Location: add-contact.php");
    }else{
        $_SESSION['status'] = "Dados  não inseridos";
        header("Location: add-contact.php");
    }
}

if(isset($_POST['update_data'])){

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $updateData = [
        'nome' => $nome,
        'sobrenome' => $sobrenome,
        'email' => $email,
        'telefone' => $telefone
    ];

    $ref_table = "contatos/".$id;
    $updateQuery = $database->getReference($ref_table)->update($updateData);

    if($updateQuery){
        $_SESSION['status'] = "Dados  alterados com sucesso";
        header("Location: edit.php?id=".$id);
    }else{
        $_SESSION['status'] = "Dados  não alterados";
        header("Location: edit.php?id=".$id);
    }

}

if(isset($_POST['delete_data'])){

    $id = $_POST['id'];

    $ref_table = "contatos/".$id;

    $deleteQuery = $database->getReference($ref_table)->remove();

    if($deleteQuery){
        $_SESSION['status'] = "Dado removido com sucesso";
        header("Location: index.php");
    }else{
        $_SESSION['status'] = "Dado não removido";
        header("Location: index.php");
    }

}