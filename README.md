# Sistema de Inscrição em Minicursos

Projeto desenvolvido para a disciplina **SIN 493 – Tópicos Especiais III**, da Universidade Federal de Viçosa (UFV), Campus Rio Paranaíba.

## 1. Objetivo

Desenvolver um sistema Web que permita cadastrar usuários, consultar minicursos disponíveis, realizar inscrições e cancelar agendamentos.

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
- `dados/`: arquivos JSON e seus modelos.
- `css/`: estilos do sistema.
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

## 8. Situação do desenvolvimento

Parte 1

## 9. Informações para a entrega final

A completar