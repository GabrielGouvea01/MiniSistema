# MiniSistema — Gestão de Alunos

## Sobre o projeto

O **MiniSistema** é uma aplicação web desenvolvida em PHP para gerenciamento de alunos. O sistema permite:

- Cadastrar alunos;
- Listar todos os alunos;
- Consultar um aluno pelo ID;
- Atualizar dados de alunos;
- Excluir alunos;
- Criar usuários;
- Realizar login e logout;
- Controlar o acesso por sessão.

A aplicação utiliza PostgreSQL como banco de dados e PDO para realizar a conexão e executar comandos SQL.

## Estrutura do projeto

```text
miniSistema/
├── index.php
├── app/
│   ├── create.php
│   ├── delete.php
│   ├── select.php
│   ├── select_w.php
│   └── update.php
├── Database/
│   └── connect.php
├── includes/
│   ├── footer.php
│   ├── functions.php
│   └── header.php
├── login/
│   ├── cadastrar.php
│   ├── login.php
│   ├── logout.php
│   └── verifica_user.php
└── style/
    └── style.css
```

## Arquivo principal

### `index.php`

É a página inicial do sistema.

- Exibe a mensagem de boas-vindas;
- Inclui o cabeçalho através de `includes/header.php`;
- Inclui o rodapé através de `includes/footer.php`;
- Apresenta o título “Gestão de Alunos”.

## Pasta `app`

Contém as páginas responsáveis pelas operações dos alunos.

### `create.php`

Página de cadastro de alunos.

O formulário recebe:

- Nome;
- Turma;
- Data de nascimento;
- Status do aluno, ativo ou inativo.

Após o envio, chama a função `cadastrar()` localizada em `includes/functions.php`.

A página também verifica se o usuário está autenticado.

### `delete.php`

Página responsável pela exclusão de alunos.

- Recebe o ID do aluno;
- Chama a função `deletar()`;
- Remove o registro correspondente da tabela `alunos`.

### `select.php`

Exibe a lista completa de alunos cadastrados.

- Chama a função `listar()`;
- Consulta todos os registros da tabela `alunos`;
- Apresenta os dados encontrados.

### `select_w.php`

Permite consultar um aluno específico.

- Recebe o ID do aluno;
- Chama a função `consultar()`;
- Exibe nome, turma, nascimento e status do aluno.

### `update.php`

Página utilizada para atualizar os dados de um aluno.

O formulário recebe:

- ID;
- Nome;
- Turma;
- Data de nascimento;
- Status.

Depois do envio, chama a função `atualizar()`.

## Pasta `Database`

### `connect.php`

Responsável pela conexão com o banco de dados PostgreSQL.

Configura:

- Endereço do servidor;
- Nome do banco;
- Usuário;
- Senha.

A conexão é realizada usando `PDO`. A variável `$conexao` é utilizada pelas demais funções do sistema para executar consultas no banco.

## Pasta `includes`

Contém arquivos reutilizáveis pela aplicação.

### `functions.php`

Centraliza as funções de acesso ao banco de dados.

Principais funções:

- `cadastrar()` — insere um aluno;
- `deletar()` — exclui um aluno pelo ID;
- `listar()` — lista todos os alunos;
- `consultar()` — busca um aluno pelo ID;
- `atualizar()` — altera os dados de um aluno;
- `cadastrar_user()` — cadastra um usuário;
- `consulta_user()` — consulta um usuário pelo e-mail.

O arquivo também inclui `Database/connect.php` para obter a conexão com o banco.

### `header.php`

Define o cabeçalho e o menu de navegação do sistema.

O menu possui links para:

- Página inicial;
- Cadastro de alunos;
- Exclusão;
- Relatório;
- Consulta individual;
- Atualização;
- Criação de usuários;
- Login;
- Logout.

### `footer.php`

Define o rodapé padrão das páginas. Atualmente exibe o texto:

> Sou o footer

## Pasta `login`

Contém os recursos relacionados à autenticação dos usuários.

### `login.php`

Página de login.

- Solicita e-mail e senha;
- Consulta o usuário no banco;
- Compara os dados informados;
- Armazena o ID do usuário na sessão;
- Redireciona o usuário para a página inicial quando o login é válido.

### `cadastrar.php`

Página de cadastro de novos usuários.

- Recebe e-mail e senha;
- Chama a função `cadastrar_user()`;
- Insere o novo usuário na tabela `usuario`.

Atualmente, essa página exige que o usuário já esteja autenticado.

### `logout.php`

Responsável por encerrar a sessão do usuário.

- Limpa os dados da sessão;
- Destrói a sessão;
- Redireciona para a página inicial.

### `verifica_user.php`

Arquivo de proteção de páginas.

- Inicia a sessão, caso ainda não esteja iniciada;
- Verifica se existe um ID de usuário na sessão;
- Redireciona para a tela de login caso o usuário não esteja autenticado.

Esse arquivo é incluído nas páginas protegidas da pasta `app`.

## Pasta `style`

### `style.css`

Arquivo de estilos gerais da aplicação.

Atualmente, define que o conteúdo do elemento `body` deve ficar centralizado:

```css
body {
    text-align: center;
}
```

## Fluxo de autenticação

1. O usuário acessa a página de login.
2. Informa e-mail e senha.
3. O sistema consulta o usuário no banco de dados.
4. Se os dados forem válidos, o ID é salvo em `$_SESSION['id']`.
5. As páginas protegidas verificam essa sessão usando `verifica_user.php`.
6. No logout, a sessão é destruída.

## Banco de dados

O projeto utiliza, principalmente, as seguintes tabelas:

### Tabela `alunos`

Possui campos relacionados aos alunos:

- `id`;
- `nome`;
- `nasc`;
- `turma`;
- `ativo`.

### Tabela `usuario`

Utilizada para autenticação:

- `id`;
- `email`;
- `senha`.

## Tecnologias utilizadas

- PHP;
- PostgreSQL;
- PDO;
- HTML;
- CSS;
- Sessões do PHP.

## Observações

Para produção, recomenda-se:

- Armazenar senhas usando `password_hash()`;
- Validar e sanitizar os dados dos formulários;
- Corrigir mensagens de erro do banco de dados;
- Usar `password_verify()` no login;
- Adicionar tratamento para registros inexistentes;
- Corrigir validações dos formulários;
- Evitar exibir informações técnicas diretamente ao usuário;
- Configurar corretamente os caminhos dos arquivos CSS e links.