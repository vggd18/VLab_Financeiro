# Projeto de Monitoramento Financeiro - VLAB

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

