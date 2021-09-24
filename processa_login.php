<?php
    //Inicializa a sessão para o processo de login
    session_start();

    //Importação do arquivo de funções
    require_once("./funcoes.php");

    //Recebendo os dados do formulário
    // var_dump($_POST);exit;

    if(isset($_POST["txt_usuario"]) || isset($_POST["txt_senha"])){
        $usuario = $_POST["txt_usuario"];
        $senha = $_POST["txt_senha"];
        // echo 'teste';exit;
        realizarLogin($usuario, $senha, lerArquivo("dados/usuarios.json"));
        
    }else if($_GET["logout"]){
        finalizarLogin();
    }
