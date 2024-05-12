<?php

require_once 'php/Passageiro.php';
require_once 'php/Passagem.php';
require_once 'bd/PassageiroDAO.php';
require_once 'bd/PassagemDAO.php';
require_once 'bd/Conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $cpf = $_POST["CPF"];
    $telefone = $_POST["telefone"];
    $data_compra = $_POST['data_compra'];
    $opcaoValor = $_POST["opcaoValor"];

    // Define o valor da passagem com base na opção selecionada
    if ($opcaoValor === "a-b") {
        $valorPassagem = 10; // Valor para a opção "De A para B"
    } elseif ($opcaoValor === "a-c") {
        $valorPassagem = 20; // Valor para a opção "De A para C"
    } else {
        // Valor padrão ou tratamento de erro, se necessário
        $valorPassagem = 0;
    }

    // Cria uma conexão com o banco de dados usando o padrão Singleton
    $conn = Conexao::getConn();

    // Cria um novo passageiro com os dados do formulário
    $passageiro = new Passageiro('', $nome, $cpf, $telefone);

    // Insere o passageiro no banco de dados e recupera seu ID
    $passageiroDAO = new PassageiroDAO();
    $passageiroId = $passageiroDAO->create($passageiro);

    if ($passageiroId) {
        // Cria uma nova passagem com os dados
        $passagem = new Passagem('', $data_compra, $valorPassagem, null, $passageiroId); // Deixe viagem_id como NULL

        // Insere a passagem no banco de dados
        $passagemDAO = new PassagemDAO();
        $passagemId = $passagemDAO->create($passagem);

        if ($passagemId) {
            // Redireciona para a página de detalhes da passagem
            header("Location: comprada.html?id=$passagemId");
            exit();
        } else {
            // Caso ocorra algum erro ao criar a passagem, redireciona para uma página de erro
            header("Location: erro.php");
            exit();
        }
    } else {
        // Caso ocorra algum erro ao criar o passageiro, redireciona para uma página de erro
        header("Location: erro.php");
        exit();
    }
}

?>