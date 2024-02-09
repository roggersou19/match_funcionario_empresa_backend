# Nome do Projeto

Match entre Funcionarios e Empresas

## Versões ulizadas nesse projeto

Laravel 10
Php 8.2
Mysql 8.0.29

## Instalação

1. Clone o repositório:

   git clone https://github.com/seu-usuario/seu-projeto.git

2. Instale as dependências usando o Composer:

   composer install

3. Publique os arquivos de configuração do JWT:

   php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

4. Gere a chave secreta do JWT:

   php artisan jwt:secret

5. Execute as migrações e alimente o banco de dados:

   php artisan migrate --seed

## Diretrizes para versionamento

Prezados,

Depois subir o projeto diretamente no repositório, percebi que havia uma segunda página no Desafio com os requisitos e critérios de avaliação. Diante disso, apresento neste documento os padrões que costumo seguir em minhas práticas:

feat: Utilizado para novas funcionalidades.
fix: Designa correções de bugs.
chore: Reservado para tarefas de manutenção ou limpeza do código.
docs: Destinado a atualizações na documentação.
style: Aplicado a mudanças relacionadas à formatação, espaçamento, etc.
test: Utilizado para adição ou modificação de testes.

Exemplos práticos de commits:

git commit -m "feat: task 13 / Processo de associação de Conhecimentos dos Funcionários e Empresas"
git commit -m "fix: task 13 / Correção de bug associado à rota get não retornando dados"
git commit -m "chore: task 11 / Refatoração do código para adequação aos padrões"
git commit -m "docs: Inclusão de novas diretrizes devido à mudança de versão"
git commit -m "test: Task 13 / adaptação para o teste de validação do match"

Para cada nova sprint, tenho o hábito de criar uma nova branch de "release" com o nome da Sprint e um título que descreva seu objetivo. Realizamos o merge com uma branch intermediária de "Develop/Validação" para que todos os itens sejam consolidados e homologados antes da atualização da master e do deploy em produção.


## Observações Gerais

No teste denominado MatchTest, buscamos preservar a lógica original "scopeMatchSkillsWithCompany" implementada no modelo Employee e comparar os resultados obtidos. O propósito é mitigar possíveis riscos ao realizar melhorias e modificações no código, permitindo assim validar o objetivo central do projeto, que consiste em evidenciar as correlações entre os funcionários e as empresas.


## Considerações

Prezado,

Agradeço pela nossa conversa e fico satisfeito com o feedback positivo recebido sobre nosso diálogo inicial. Espero corresponder às expectativas e, caso eu tenha a oportunidade de colaborar neste projeto, comprometo-me a aprimorar meus estudos no frontend, atingindo o nível que vocês esperam de um profissional Full Stack.

Desde já agradeço a oportunidade, Rogger de Souza Oliveira.