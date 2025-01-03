# API-COVID-19-KIDOPI

Uma web interface para os dados do número de casos confirmados e mortes de vários países afetados pela COVID-19.
Os dados são fornecidos por meio da API-Covid-19, da Kidopi.

## Dependencias

Este projeto utiliza as seguintes dependencias:

* xampp     --> Servidor local para desenvolvimento web
* php       --> Linguagem principal
* composer  --> Gerenciador de dependencias do php
* dotenv    --> Criação de variáveis de ambiente

### IMPORTANTE!

Para que o projeto funcione corretamente, é necessário que todas as dependências estejam instaladas e configuradas em seu ambiente de produção.

A seguir, você encontra alguns links que podem ajuda-lo a instalar e configurar as dependências necessárias:

#### XAMPP {#xampp-tag}

[Instalação e configuração do XAMPP (Apache, MySQL, PHP) no Windows](https://www.youtube.com/watch?v=0Y9OZ0vc1SU)

[Instalação e configuração do XAMPP (Apache, MySQL, PHP) no Linux](https://www.youtube.com/watch?v=aUN0j5Q9quQ)

[Instalação e configuração do XAMPP (Apache, MySQL, PHP) no MacOs](https://www.youtube.com/watch?v=bUqOgDrcsm4)

#### Composer

[Instalação do Composer](https://www.youtube.com/watch?v=VeK3UvBKtqU);

#### DOTENV

Para instalar o dotenv, abra um terminal no diretório principal do programa e digite o seguinte comando: `composer install`

## Objendo o programa

Obtendo o program

Clique no botão verde escrito `<> Code`.

Se você quiser instalar o arquivo .zip, clique na opção Download ZIP. Após isso, descompacte o arquivo .zip baixado no lugar de sua escolha.

Caso tenha optado por baixar via `git clone`, copie o link https do programa --> `https://github.com/Pedrohenr1qq/API-Covid-19-Kidopi.git`.

Abra um terminal.

Vá para o diretório htdocs do XAMPP o programa e digite o seguinte comando:

```
git clone https://github.com/Pedrohenr1qq/pizzeria-API.git 
```

Verifique se o programa foi baixado corretamente. Caso sim, você pode seguir com a explicação abaixo.

Caso contrário, talvez esse link possa ajudar: [Clonando um repositório do GitHub](https://www.youtube.com/watch?v=5ctmK6fV1NQ)

## Configurando o DOTENV

Crie um arquivo com nome `.env` no diretório principal do seu programa <b>(API-Covid-19-Kidopi)<b>.

Copie e cole o conteudo do arquivo `.env.example` para dentro de .env

Mude os valores das variáveis de ambiente de acordo com seu ambiente de produção.

Se quiser, pode usar os valores padrões:

* DB_HOST=localhost
* DB_USER=root
* DB_PASSWORD=       (a senha no mysql do root, por padrão, é vazia)
* DB_DATABASE=covid19
* DB_TABLE=acessLogs

Para a API_KEY, acesse o link `https://dev.kidopilabs.com.br/exercicio/covid.php?pais=Brazil` e procure pela URL da API-Covid-19. Copie e cole o link no valor da variavel de ambiente API_KEY. 

Caso o link acima não esteja mais disponível, então é poque o acesso à API não está mais liberado publicamente.

Um exemplo seria:
```
API_KEY=https://<url-da-API>
```

## Como usar o programa

Feita a instalação do programa, inicie o servidor com o XAMPP (Caso não saiba fazer isso, assista o vídeo de configuração e instalação do [XAMPP](#xampp-tag), de acordo com seu sistema operacional)

Após iniciado o servidor, copie e cole o seguinte link no seu navegador: `http://localhost/API-Covid-19-Kidopi/public/index.php?countryIndex=0`

Deve aparecer pra você a pagina da interface web onde estão os dados da COVID19 de acordo com o país selecionado.

Selecione o país de preferência, entre os disponíveis e veja os dados gerais por estado/provincia.
