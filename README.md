# LIBRAKIDS
<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/libras.png" width="200" heigth="200">
Protótipo de um sistema feito sob encomenda.

### SOBRE
Sistema criado a pedido de alunos da UEMG. Trata-se de um backend para controle das informações para alimentar um APP desenvolvido para Android.
A proposta do sistema, segundo os autores, é um aplicativo cujo público alvo são crianças surdas em fase préoperacional(3 anos) que sero supervisonadas por algum adulto.
Oferecendo exercícios em linguagem de sinais (LIBRAS) e questionários de fixação de forma a familiarizar a criança com a lingua materna.

### PARTICIPANTES

<pre>
SDK Android (programação nativa) e Layout do app: Ramon Vicente FREELANCER) - Santa Catarina
Modificações no App: Viviana Fernandes (SECRETARIA DA EDUCAÇÃO) - São Paulo
Backend e frontend: Lameck S.F (FREELANCER) - Minas Gerais

<b>Autores (Minas Gerais):</b>
Alexandre Garcia
Fernando Ribeiro
</pre>

<hr>

### FRONTEND

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-02-59.png" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-42-22.png" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-42-26.png" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-42-34.png" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-42-44.png" width="500" heigth="500">

<hr>

### BACKEND

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-03-45.png" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-14-37.png" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-15-27.png" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-15-13.png" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-15-06.png" width="500" heigth="500">

<img src="https://github.com/EuFreela/LIBRAKIDS/blob/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-14-57.png" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-14-37.png" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/Captura%20de%20tela%20de%202018-11-30%2019-04-20.png" width="500" heigth="500">


### APP

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/feature-image-1-1.jpg" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/feature-image-2-2.jpg" width="500" heigth="500">

<img src="https://raw.githubusercontent.com/EuFreela/LIBRAKIDS/master/imgs/images-bottom-12-3.png" width="500" heigth="500">


<hr>

### PROTÓTIPO

O protótipo é uma ideia de como opoderia ser o sistema de acordo com que descreveram no trabalho de concluso de curso.

### INSTALAÇÃO

1. Execute o arquivo no terminal: sudo sh <a href="https://github.com/EuFreela/LIBRAKIDS/blob/master/install.sh">install.sh</a>

2. Se ocorreu tudo ok com o ambiente LAMP, acesse os endereços:
2.1. localhost/phpmyadmin;
2.2. Crie um banco de dados;
2.3. Importe o sql que provavelmente ja esta com dados preenchidos. Isso implica que no estudelibras, backend nos diretrios video, img e cards.

3. Terminal: copie a pasta estudelibras para dentro do apache. Nela contem o backend e o frontend da aplicação.
$ cd /var/www/html/estudelibras

4. Configure o roteador para que o servidor rode no ip: 192.168.1.102. Caso contrário, mude o i no SKD ANDROID e faça um novo build do apk. O app acessa o servidor em rede local.

5. Os links da aplicação estão default para linkarem a este endereo ip fixo. Caso mude o IP é necessário alguns ajustes como: no link no frontend para baixar o apk. A ultima versão esta no diretório FINAL e não no link.

### SOBRE

Os ultimos ajustes no apk foram de ultima hora para apresentação do sistema e não foi atualizado no link do forntend "baixar o aplicativo". Há várias verses neste repositrio, a pasta entitulada de FINAL seria a ultima dev item.










