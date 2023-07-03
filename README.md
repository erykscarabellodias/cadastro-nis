# Cadastro NIS

## Sobre o projeto

Projeto para cadastro de cidadãos e geração de códigos NIS no ato da criação.

## Tecnologias utilizadas

* `PHP` v8.1.10
* `doctrine/migrations` v3.6.0
* `illuminate/database` v10.14
* `phpunit` v10

## Estrutura da aplicação

Existem dois pontos de entrada para a aplicação: api/index.php e web/index.php. Enquanto o primeiro toma conta de carregar as dependências do backend e disponibilizar suas rotas, o segundo faz isso com o frontend.

Dentro da pasta src também há esta distinção entre ambientes: backend(api) e web (frontend). O backend está dividido em módulos e seus casos de uso, enquanto o frontend conta com views.

Para acessar as rotas da aplicação é necessário digitar o caminho da aplicação (como <http://localhost>) com a adição do caminho de entrada desejado (/api/index.php para a API ou /web/index.php para o frontend) e passar um query param chamado **r** com o valor da rota desejada. Por exemplo, para acessar a rota **cadastrar-cidadao** no frontend e ter acesso à página de cadastro de cidadãos, é necessário acessar o caminho <http://localhost/cadastro-nis/web/index.php?r=cadastrar-cidadao>.

As páginas HTML apenas realizam requisições à API, que por sua vez retorna mensagens em JSON ou erros HTTP, se for o caso. Portanto, também é possível testar a API com algum client HTTP como Postman ou Insomnia ou ainda fazer outra versão de frontend em um cenário diferente, como uma SPA ou um app mobile.

## Como rodar a aplicação

1. Clone a aplicação em um ambiente com o PHP na versão 8.1.
2. Instale as dependências com o comando `composer install`. (É necessário ter o composer instalado. [Instruções aqui](https://getcomposer.org/doc/00-intro.md))
3. Levante o container docker com o banco de dados com o comando docker-compose up -d. (É necessário ter o docker e o docker-compose instalados. Se não for o caso, basta criar a tabela cadastro-nis em uma instância do MySQL .[Instruções aqui](https://docs.docker.com/compose/install/))
4. Faça uma cópia chamada .env do arquivo .env.example no root do projeto e preencha as variáveis de ambiente de conexão com o banco de dados e o caminho da API. Obs 1: o caminho da API deve ficar como no padrão <http://localhost/cadastro-nis/api/index.php>, substituindo o protocolo, localhost e a pasta onde está o projeto dentro de htdocs pelo ambiente utilizado, se for o caso de um ambiente diferente do XAMPP. Obs 2: as credenciais devem coincidir com as do arquivo docker-compose.yml do root do projeto caso o container do docker seja utilizado para o banco.
5. Rode a migration de criação da estrutura do banco de dados com o comando `./vendor/bin/doctrine-migrations migrate`.

Com isso, a aplicação estará no ar pronta para uso.

## Rotas disponíveis na aplicação

As rotas disponíveis na aplicação são:

### API

Há uma documentação básica das rotas da API dentro do diretório /docs. As rotas são:

* cadastrar-cidadao (POST): rota utilizada para cadastrar um novo cidadão.
* buscar-cidadao (GET): rota utilizada para buscar um cidadão de acordo com um código NIS.

## Frontend

* cadastrar-cidadao: nesta tela é possível cadastrar novos cidadãos.
* consultar-nis: nesta tela é possível buscar um cidadão com base em um código NIS.

## Testes

Utilizei o PHPUnit para escrever testes unitários para os services do backend. Toda a lógica da aplicação fica dentro deles, que são basicamente reaproveitados em controllers. Por conta do tempo disponível criei uma interface de repositório utilizado tanto para na implementação de uso real com o Illuminate quanto com um repositório que apenas guarda dados em memória. Os arquivos de teste estão dentro do diretório tests, na raíz do projeto.

Para rodar os testes basta executar o comando `./bin/vendor/phpunit tests`
