# Criando projeto CLI com entrada de dados pelo teclado com PHP

Projeto em php com exemplos de funções que possibilitam entrada de dados via parametro ao chamar o arquivo `index.php` e solicitação de entrada `bank/bank-account.php`. Esse projeto trás exemplos de como criar script com php via terminal.

### Como rodar os arquivos

- **arquivo de filmes:** `php index.php "nome do filme" 2025 9 5 9`
- **Arquivo de conta de banco:** `php band/bank-account.php` esse arquivo vai imprimir instrições no terminal para o usuário poder realizar operações em uma conta bancária fictícia, como depositar, sacar, visualizar saldo, imprimir saldo...

![Exemplo de imagem](./bank/example-image.jpeg)

### Recebendo entrada de dados

- **$argv:** é um array onde a primeira posição (0) é o nome do arquivo e as outras são os parametros separados por vírgula
- **$argc:** armazena a quantidade de itens do array de argv, ou seja, se o arquivo foi chamado com 3 parametros `php index.php "parametro 1" "parametro 2" "parametro 3"` o **$argc** vai retornar **4** nome do arquivo + 3 parametros.

### Solicitando entrada de dados em momento específico

- **fgets(STDIN):** é responsável por receber o que foi digitado no teclado e só para enquanto o usuário pressionar `Enter`, é importante usar a function `trim()` para remover a quebra de linha do Enter, você também pode fazer o cast da variável com `$number = (int) fgets(STDIN)`