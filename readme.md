# SisVendas
![](https://img.shields.io/github/stars/SamuelPietro/SisVendas) ![](https://img.shields.io/github/forks/SamuelPietro/SisVendas) ![](https://img.shields.io/github/languages/top/SamuelPietro/SisVendas) ![](https://img.shields.io/github/release/SamuelPietro/SisVendas) ![](https://img.shields.io/github/issues/SamuelPietro/SisVendas) ![](https://img.shields.io/github/repo-size/SamuelPietro/SisVendas)

Sistema de vendas completo com importação de planilhas e cadastro de clientes, vendas e relatorios.



A aplicação foi desenhada com base no seguinte problema:
    O usuário possui um controle de vendas em Planilhas Excel. Ele pretende ter uma forma de subir (upload) essas planilhas na internet,
    atualizando / criando os clientes e abastecendo um cadastro de vendas, para ter visão de seus principais indicadores / Relatórios. 

## Instalação

1. Clone o repositório para a pasta raiz do seu servidor.
   * Recomendamos o uso do XAMPP para executar o SisVendas em maquinas locais,
      mas você pode usar o propio servidor do PHP executando o comando "`php -S localhost:8000 -t public/`".

2. Crie um banco de dados com o nome de sua preferência.
3. Importe o arquivo "db.sql" dentro do diretório "database".
4. Informe os dados de configuração do sistema em "Core/config.php".
5. Execute "composer install" no seu terminal. 



    composer install
    

Agora basta acessar a aplicação em seu navegador usando `localhost`
* Caso não use o XAMPP o caminho para acessar a aplicação será `localhost:8000`


## Desenvolvedor
    Samuel Pietro

## Contribuir
Contribuições são sempre bem-vindas, sintam-se livres para solicitar novas funções e correções de bugs.


## Liguagens e Ferramentas

- [PHP v8.1.x](https://www.php.net/releases/8.1/en.php)
- [MariaDB v10.4.24](https://mariadb.com/kb/en/mariadb-10424-release-notes/)
- [Bootstrap v5.2.x](https://getbootstrap.com/docs/5.1/getting-started/introduction/)
- [Jquery v3.6.x](https://blog.jquery.com/2021/03/02/jquery-3-6-0-released/)
- [Font-Awesome v6.1.1](https://fontawesome.com/v6/docs/changelog/)
- [jQuery Mask Plugin v1.14.16](https://igorescobar.github.io/jQuery-Mask-Plugin/)
- [Google Charts](https://developers.google.com/chart)

