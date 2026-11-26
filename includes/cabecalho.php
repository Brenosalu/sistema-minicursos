<?php

require_once __DIR__ . '/../funcoes.php';
iniciarSessao();

$tituloPagina = $tituloPagina ?? 'Sistema de Minicursos';
$logado = estaLogado();
$paginaAtual = basename($_SERVER['PHP_SELF']);

$itensMenu = $logado
    ? [
        'inicio.php'             => 'Início',
        'eventos.php'            => 'Minicursos',
        'criar-evento.php'       => 'Novo minicurso',
        'meus-agendamentos.php'  => 'Meus agendamentos',
        'logout.php'             => 'Sair',
    ]
    : [
        'login.php'    => 'Entrar',
        'cadastro.php' => 'Cadastrar',
    ];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($tituloPagina) ?> | Sistema de Minicursos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<header class="topo">
    <div class="container">
        <a class="marca" href="<?= $logado ? 'inicio.php' : 'login.php' ?>">Sistema de Minicursos</a>
        <nav aria-label="Menu principal">
            <ul class="menu">
                <?php foreach ($itensMenu as $arquivo => $rotulo): ?>
                    <li>
                        <a href="<?= $arquivo ?>"<?= $paginaAtual === $arquivo ? ' class="ativo" aria-current="page"' : '' ?>>
                            <?= htmlspecialchars($rotulo) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>

<main class="container">
<?php
if (!empty($_SESSION['msg'])) {
    $tipoMsg = ($_SESSION['msg']['tipo'] ?? '') === 'sucesso' ? 'msg-sucesso' : 'msg-erro';
    echo '<div class="' . $tipoMsg . '" role="alert">'
        . htmlspecialchars($_SESSION['msg']['texto'] ?? '')
        . '</div>';
    unset($_SESSION['msg']);
}
?>
