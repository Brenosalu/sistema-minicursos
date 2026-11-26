
<?php

// Função responsável por ler um arquivo JSON
function lerJson($nomeArquivo) {
    $caminho = __DIR__ . "/dados/" . basename($nomeArquivo);

    if (!file_exists($caminho)) {
        return [];
    }

    $conteudo = file_get_contents($caminho);

    if ($conteudo === false) {
        return [];
    }

    $dados = json_decode($conteudo, true);

    return is_array($dados) ? $dados : [];
}


// Função responsável por gravar dados em um arquivo JSON
function gravarJson($nomeArquivo, $dados) {
    $caminho = __DIR__ . "/dados/" . basename($nomeArquivo);

    $conteudo = json_encode(
        $dados,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    if ($conteudo === false) {
        return false;
    }

    $resultado = file_put_contents(
        $caminho,
        $conteudo,
        LOCK_EX
    );

    return $resultado !== false;
}


 // Inicia a sessão do usuário
function iniciarSessao() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

// Verifica se existe um usuário conectado
function estaLogado() {
    iniciarSessao();

    return isset($_SESSION['usuario_id']);
}

 // Impede o acesso de usuários não autenticados
function exigirLogin() {
    if (!estaLogado()) {
        header("Location: login.php");
        exit;
    }
}
