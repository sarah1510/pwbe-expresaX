<?php

function lerArquivo($nomeFuncionario){
    $arquivo = file_get_contents($nomeFuncionario);
    $jsonArray = json_decode($arquivo)

    return $jsonArray;
}


function buscarFuncionario($funcionarios, $nome){
    $funcionariosFiltro = [];
    foreach($funcionarios as $funcionaro){
        if($funcionario -> nome == $nome){
            $funcionariosFiltro[] = $funcionario;
        }
    }
    return $funcioanriosFiltro;
}