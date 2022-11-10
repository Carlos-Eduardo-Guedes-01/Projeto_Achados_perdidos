<?php
require_once 'conexao/conecta.php';
#if(empty($_POST['email']) || empty($_POST['pass'])){
#    header("Location: index.php");
#   exit();
#}
$email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
$senha=filter_input(INPUT_POST,'pass',FILTER_SANITIZE_SPECIAL_CHARS);
session_start();
$query_sql=$conexao->query("select*from usuario where email='$email' and senha='$senha'");
$row=mysqli_affected_rows($conexao);
if($row>0){
    $_SESSION['email']=$email;
    $_SESSION['senha']=$senha;
    header('Location: busca.php');
}
else{
    $email_adm=filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
    $senha_adm=filter_input(INPUT_POST,'pass',FILTER_SANITIZE_SPECIAL_CHARS);
    $query_sql=$conexao->query("select*from adm where email='$email_adm' and senha='$senha_adm'");
    $row=mysqli_num_rows($query_sql);
    if($row==1){
        $_SESSION['email']=$email_adm;
        $_SESSION['senha']=$senha_adm;
        header('Location: admin.php');
    }
    if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])){
        header('Location: index.php');
    }
}
