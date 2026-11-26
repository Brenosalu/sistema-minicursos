
# Estrutura dos Dados — Sistema de Minicursos

O sistema utiliza arquivos JSON para armazenar informações.

Todos os arquivos devem conter uma lista de registros.
Inicialmente, cada arquivo contém apenas [].

## 1. usuarios.json

Campos:
- id: identificador numérico único do usuário
- nome: nome completo
- email: e-mail do usuário (único)
- senha: hash gerado por password_hash()

## 2. eventos.json

Campos:
- id: identificador numérico único do minicurso
- nome: nome do minicurso
- descricao: descrição do minicurso
- data: data no formato AAAA-MM-DD
- horario: horário no formato HH:MM
- local: local de realização

## 3. agendamentos.json

Campos:
- id: identificador numérico único do agendamento
- usuario_id: ID do usuário inscrito
- evento_id: ID do minicurso escolhido

## Regras importantes

1. O PHP é responsável pela leitura e gravação.
2. As senhas nunca devem ser salvas em texto puro.
3. O mesmo usuário não pode se inscrever duas vezes
   no mesmo minicurso.
4. Cada usuário deve possuir um e-mail único.
5. Os IDs devem ser únicos em cada arquivo.
6. A sessão de login utiliza $_SESSION['usuario_id'].
7. Os arquivos JSON reais não devem ser enviados
   para o GitHub.
