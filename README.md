# Leitor da tabela com os resultados do forms de divulgação de ações de extensão

Lê os dados da tabela e salva todas as respostas em um array do tipo `FormResponse` para posterior migração para um banco de dados relacional. \
Perguntas opcionais não respondidas são salvas como `null`.

## Dependências
* google/apiclient (v2.0)

## Pré-requisitos
Antes de executar o script é preciso realizar as seguintes etapas
1. Criar uma [conta de serviço do google](https://cloud.google.com/iam/docs/service-accounts).
2. baixar as credenciais da conta de serviço, movê-la para a pasta root do projeto e renomear o arquivo para `credentials.json`.
3. Conceder acesso de leitor da tabela para a conta de serviço criada.

## Executar o script
Na pasta do projeto:
```bash
php -f table_reader.php
```