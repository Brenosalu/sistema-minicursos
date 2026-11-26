# Sistema de Inscrição em Minicursos

Projeto desenvolvido para a disciplina **SIN 493 – Tópicos Especiais III**, da Universidade Federal de Viçosa (UFV), Campus Rio Paranaíba.

## 1. Objetivo

Desenvolver um sistema Web que permita cadastrar usuários, consultar minicursos disponíveis, realizar inscrições (agendamentos) e cancelar agendamentos.

## 2. Tecnologias utilizadas

- HTML5
- CSS3
- JavaScript puro
- PHP puro
- JSON para armazenamento de dados
- Git e GitHub para versionamento
- XAMPP (Apache e PHP) para execução local

## 3. Como executar o projeto

**Passo 1:** Instale o XAMPP e o Git.

**Passo 2:** Abra o terminal na pasta `C:\xampp\htdocs` e execute:

`git clone https://github.com/Brenosalu/sistema-minicursos.git`

**Passo 3:** Abra a pasta `sistema-minicursos` no VS Code.

**Passo 4:** Crie os arquivos JSON locais a partir dos modelos. No PowerShell, dentro da pasta do projeto, execute:

`Copy-Item dados/usuarios.json.exemplo dados/usuarios.json`

`Copy-Item dados/eventos.json.exemplo dados/eventos.json`

`Copy-Item dados/agendamentos.json.exemplo dados/agendamentos.json`

**Passo 5:** Abra o XAMPP Control Panel e inicie o Apache.

**Passo 6:** Acesse pelo navegador:

`http://localhost/sistema-minicursos/`

## 4. Organização do projeto

- `index.php`: página inicial provisória.
- `funcoes.php`: funções compartilhadas de leitura, gravação e controle de sessão.
- `cabecalho.php` e `rodape.php`: início e fim do HTML, compartilhados por todas as páginas (ver seção 8).
- `dados/`: arquivos JSON e seus modelos.
- `css/estilo.css`: estilos do sistema (único arquivo de CSS).
- `js/`: scripts JavaScript.
- `ESTRUTURA_DADOS.md`: documentação dos campos utilizados no armazenamento.

## 5. Organização das branches

- `main`: versão principal.
- `feature/autenticacao`: login e cadastro de usuários.
- `feature/minicursos`: cadastro e consulta de minicursos.
- `feature/agendamentos`: inscrições e cancelamentos.
- `feature/visual-documentacao`: interface e documentação.

Cada integrante deverá trabalhar na branch correspondente à sua responsabilidade e utilizar Pull Requests para integrar as alterações à `main`.

## 6. Funções compartilhadas

O arquivo `funcoes.php` disponibiliza:

- `lerJson($nomeArquivo)`: lê dados de um arquivo JSON.
- `gravarJson($nomeArquivo, $dados)`: grava dados em um arquivo JSON.
- `iniciarSessao()`: inicia ou recupera uma sessão PHP.
- `estaLogado()`: verifica se existe um usuário autenticado.
- `exigirLogin()`: restringe o acesso às páginas internas.

## 7. Segurança dos dados

Os arquivos JSON reais não devem ser enviados ao GitHub.

O `.gitignore` impede seu versionamento normal e o `.htaccess` impede acesso direto à pasta de dados pelo Apache.

## 8. Guia rápido para quem vai criar páginas

### 8.1 Como começar

1. Atualize sua cópia: `git checkout main` e `git pull`.
2. Volte para a sua branch: `git checkout feature/sua-branch`.
3. Traga as novidades da `main`: `git merge main`.
4. Abra o Apache no XAMPP e teste em `http://localhost/sistema-minicursos/`.

### 8.2 Estrutura de toda página

Toda página usa o cabeçalho e o rodapé compartilhados. Assim o menu e o visual ficam iguais em todo o sistema, e **ninguém cria menu ou CSS próprio**.

```php
<?php
require_once 'funcoes.php';
exigirLogin();                    // só em páginas internas

$tituloPagina = 'Minicursos';     // aparece na aba do navegador
include 'cabecalho.php';
?>

<h1>Minicursos</h1>
<!-- conteúdo da página -->

<?php include 'rodape.php'; ?>
```

O `cabecalho.php` já abre o `<html>`, carrega o `css/estilo.css` e mostra o menu (que muda se a pessoa estiver logada ou não). O `rodape.php` fecha o HTML.

Se o PHP precisar redirecionar (`header('Location: ...')`), isso deve ser feito **antes** do `include 'cabecalho.php'`, pois depois dele o HTML já começou.

### 8.3 Mensagens de sucesso e erro

Antes de redirecionar, grave a mensagem na sessão:

```php
$_SESSION['msg'] = ['tipo' => 'sucesso', 'texto' => 'Inscrição realizada!'];
// ou: ['tipo' => 'erro', 'texto' => 'E-mail ou senha incorretos.']
header('Location: eventos.php');
exit;
```

O cabeçalho da página seguinte mostra a mensagem uma única vez e depois a apaga.

### 8.4 Classes de CSS disponíveis

| Classe | Para que serve |
|---|---|
| `.formulario` | caixa que envolve um formulário |
| `.campo` | cada par rótulo + campo (`label` + `input`) |
| `.campo-senha` + `.alternar-senha` | campo de senha com botão mostrar/ocultar |
| `.erro-campo` e `.invalido` | mensagem de erro do JavaScript abaixo do campo e borda vermelha |
| `.botao` | botão principal |
| `.botao-secundario` | botão de contorno (ações menos importantes) |
| `.botao-perigo` | botão vermelho (ex.: cancelar agendamento) |
| `.lista-eventos` e `.evento` | grade de cards de minicursos |
| `.detalhes` | caixa da página de detalhes |
| `.vazio` | aviso quando não há nada para listar |
| `.msg-sucesso` e `.msg-erro` | mensagens (usadas pelo cabeçalho) |

Exemplo de card de minicurso:

```html
<ul class="lista-eventos">
  <li class="evento">
    <h3>Introdução ao PHP</h3>
    <p class="info">12/12/2026 às 14:00 – Sala 101</p>
    <div class="acoes">
      <a class="botao" href="detalhes.php?id=1">Ver detalhes</a>
    </div>
  </li>
</ul>
```

### 8.5 Fluxo de trabalho com Git

1. Trabalhe só na sua branch.
2. Antes do commit, rode `git status` e confira se aparecem apenas os seus arquivos (os `.json` reais **não** devem aparecer).
3. `git add` dos seus arquivos, `git commit -m "mensagem clara"` e `git push`.
4. Abra um Pull Request para a `main` no GitHub.

### 8.6 Regras do trabalho (resumo do enunciado)

- Apenas HTML, CSS, JavaScript e PHP puros. Dados em arquivos JSON lidos e gravados pelo PHP.
- Nada de frameworks, bibliotecas JS, Node.js ou banco de dados.
- O PHP deve revalidar tudo o que o JavaScript validar.
- Páginas internas exigem login (`exigirLogin()`).

## 9. Situação do desenvolvimento

- Base e Git (estrutura, `funcoes.php`, JSONs): concluída.
- Estilo base, cabeçalho e rodapé: concluídos.
- Autenticação: em desenvolvimento.
- Minicursos: em desenvolvimento.
- Agendamentos: em desenvolvimento.
- Página inicial e ajustes finais de visual: em desenvolvimento.

## 10. Informações para a entrega final

**Integrantes:**

- Nome completo 1
- Nome completo 2
- Nome completo 3
- Nome completo 4
- Nome completo 5

**Funcionalidades implementadas:** a completar.

**Usuário e senha de teste:** a completar.

**Imagens das principais telas:** a completar (login, cadastro, início, minicursos, detalhes, novo minicurso e meus agendamentos).