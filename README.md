# Projeto de Monitoramento Financeiro=

Este projeto foi desenvolvido como parte do processo seletivo da VLAB. O objetivo é implementar um sistema de monitoramento financeiro usando Laravel e um banco de dados relacional.

## Especificações

O sistema permite que os usuários realizem as seguintes ações:

- Cadastrar uma categoria de transação
- Deletar uma categoria de transação
- Listar categorias de transação
- Criar uma transação
- Remover uma transação
- Listar transações
- Filtrar transações
- Criar usuários
- Editar usuários
- Deletar usuários

## Instalação

1. Clone este repositório para a sua máquina local
2. Navegue até a pasta do projeto
3. Execute `composer install` para instalar as dependências
4. Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente
5. Execute `php artisan key:generate` para gerar uma chave de aplicação
6. Execute `php artisan migrate` para criar as tabelas no banco de dados
7. Execute `php artisan serve` para iniciar o servidor de desenvolvimento

## Testes

Para executar os testes, use o comando `php artisan test`.
![Modelo de Entidade-Relacionamento](https://github.com/vggd18/VLab_Financeiro/blob/52ce60e35d6c3655bf65484aba8d047a1e5bbaf1/images/TEST-VLAB-FINANCEIRO.png)


## Modelo de Entidade-Relacionamento
![Modelo de Entidade-Relacionamento](https://github.com/vggd18/VLab_Financeiro/blob/52ce60e35d6c3655bf65484aba8d047a1e5bbaf1/images/V_Lab_BD.png)

# Documentação dos Endpoints

## Endpoints da Categoria

### Criar Categoria

- **URL:** `/category`
- **Método HTTP:** POST
- **Descrição:** Cria uma nova categoria de transação.
- **Parâmetros:**
  - `name` (string): O nome da categoria.
- **Permissões:** Apenas usuários com perfil de usuário podem criar categorias.
- **Códigos de Resposta:**
  - `201`: Categoria criada com sucesso.
  - `403`: Acesso negado se o usuário não tiver permissão para criar categorias.
  - `500`: Falha ao criar a categoria.

### Remover Categoria

- **URL:** `/category/{id}`
- **Método HTTP:** DELETE
- **Descrição:** Remove uma categoria existente com base no ID fornecido.
- **Parâmetros:**
  - `id` (integer): O ID da categoria a ser removida.
- **Permissões:** Apenas usuários com perfil de usuário podem remover categorias.
- **Códigos de Resposta:**
  - `200`: Categoria removida com sucesso.
  - `403`: Acesso negado se o usuário não tiver permissão para remover categorias.
  - `500`: Falha ao remover a categoria.

### Listar Categorias

- **URL:** `/category`
- **Método HTTP:** GET
- **Descrição:** Retorna uma lista de todas as categorias de transação.
- **Permissões:** Todos os usuários têm permissão para listar categorias.
- **Códigos de Resposta:**
  - `200`: Requisição bem-sucedida.
  - `403`: Acesso negado se o usuário não tiver permissão para visualizar categorias.

## Endpoints de Transação

### Criar Transação

- **URL:** `/transaction`
- **Método HTTP:** POST
- **Descrição:** Cria uma nova transação financeira.
- **Parâmetros:**
  - `user` (integer): ID do usuário que efetuou a transação.
  - `category` (string): Nome da categoria da transação.
  - `type` (string): Tipo da transação (recebimento ou pagamento).
  - `value` (float): Valor da transação.
- **Permissões:** Apenas usuários autenticados podem criar transações.
- **Códigos de Resposta:**
  - `200`: Transação criada com sucesso.
  - `403`: Acesso negado se o usuário não estiver autenticado.
  - `500`: Falha ao criar a transação.

### Remover Transação

- **URL:** `/transaction/{id}`
- **Método HTTP:** DELETE
- **Descrição:** Remove uma transação existente com base no ID fornecido.
- **Parâmetros:**
  - `id` (integer): O ID da transação a ser removida.
- **Permissões:** Apenas usuários autenticados podem remover transações.
- **Códigos de Resposta:**
  - `200`: Transação removida com sucesso.
  - `403`: Acesso negado se o usuário não estiver autenticado.
  - `500`: Falha ao remover a transação.

### Listar Transações

- **URL:** `/transaction`
- **Método HTTP:** GET
- **Descrição:** Retorna uma lista de todas as transações financeiras.
- **Permissões:** Apenas usuários autenticados podem listar transações.
- **Códigos de Resposta:**
  - `200`: Requisição bem-sucedida.
  - `403`: Acesso negado se o usuário não estiver autenticado.

### Filtrar Transações

- **URL:** `/transaction/filter`
- **Método HTTP:** GET
- **Descrição:** Filtra as transações com base nos parâmetros fornecidos.
- **Parâmetros:**
  - `column` (string): Nome da coluna para filtrar (user, category, type).
  - `value` (string): Valor a ser usado como filtro.
- **Permissões:** Apenas usuários autenticados podem filtrar transações.
- **Códigos de Resposta:**
  - `200`: Requisição bem-sucedida.
  - `403`: Acesso negado se o usuário não estiver autenticado.

## Endpoints do Usuário

### Criar Usuário

- **URL:** `/user`
- **Método HTTP:** POST
- **Descrição:** Cria um novo usuário no sistema.
- **Parâmetros:**
  - `name` (string): Nome completo do usuário.
  - `cpf` (string): CPF do usuário.
  - `email` (string): E-mail do usuário.
  - `password` (string): Senha do usuário.
  - `perfil` (string): Perfil do usuário (user ou developer).
- **Permissões:** Apenas usuários com perfil de desenvolvedor podem criar usuários.
- **Códigos de Resposta:**
  - `201`: Usuário criado com sucesso.
  - `403`: Acesso negado se o usuário não tiver permissão para criar usuários.
  - `500`: Falha ao criar o usuário.

### Remover Usuário

- **URL:** `/user/{id}`
- **Método HTTP:** DELETE
- **Descrição:** Remove um usuário existente com base no ID fornecido.
- **Parâmetros:**
  - `id` (integer): O ID do usuário a ser removido.
- **Permissões:** Apenas usuários com perfil de desenvolvedor podem remover usuários.
- **Códigos de Resposta:**
  - `200`: Usuário removido com sucesso.
  - `403`: Acesso negado se o usuário não tiver permissão para remover usuários.
  - `500`: Falha ao remover o usuário.

### Editar Usuário

- **URL:** `/user/{id}`
- **Método HTTP:** PUT
- **Descrição:** Edita um usuário existente com base no ID fornecido.
- **Parâmetros:**
  - `id` (integer): O ID do usuário a ser editado.
  - Outros parâmetros opcionais a serem editados (name, cpf, email, password, perfil).
- **Permissões:** Apenas usuários com perfil de desenvolvedor podem editar usuários.
- **Códigos de Resposta:**
  - `200`: Usuário editado com sucesso.
  - `403`: Acesso negado se o usuário não tiver permissão para editar usuários.
  - `500`: Falha ao editar o usuário.

