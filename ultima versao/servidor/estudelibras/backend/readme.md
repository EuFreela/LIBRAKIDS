# LIBRAKIDS

Trata-se de um sistema mobile que integra-se com uma apliação web com o objetivo de ensinar matérias referentes à linguagem de sinais brasileira (LIBRAS).

A versão atual tem como público alvo criandas na fase pré-operacional dos 3 aos 8 anos de idade.

<br>

###INSTALAÇÃO

A instalação sistema:

```
1. Instalação de um servidor PHP. Entre eles wampserver, xampp, entre outros;
2. Importe o diretório "estudelibras" para dentro do servidor instalado. Considerando como exempo o wampserver, no diretório C://wampserver/www/estudelibras;
3. Instale o banco de dados por meio do Workbanch importando o DER. O banco de dados estará limpo - sem dados.
4. Abra o terminal na pasta onde se encontra o backend. COnsiderando o wampserver, o diretório C://wampserver/www/estudelibras/backend
5. Com o terminal aberto, execute o comando para popular o banco de dados com insformações default: php artisan db:seed
6. Acesse o backend da aplicação por meio da url: localhost/estudelibras/backend/public
7. Clique em "login" e entre no sistema: 
email: admin@admin.com 
senha: 1234

8. Cadastre primeiro categorias como: animais; automóveis; móveis; etc
9. Cadastre os cartões de memória que inclui um vídeo e uma imagem que corresponde ao vídeo em libras. Na pasta LIBRA_KIDS/Dados_Libras, contem conteúdo baixado para ser cadastrado no banco de dados. Use-o. Os cards servem para aulas.
10. Cadastre um QUIZ com um vídeo que corresponde a uma pergunta e 3 imagens onde apenas uma corresponde a resposta correta.

11. Acesse o servidor por meio do celular. O endereço padrão é 192.168.1.102/estudelibras/backend/public
```