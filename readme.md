# SisVendas
![](https://img.shields.io/github/stars/SamuelPietro/SisVendas) ![](https://img.shields.io/github/forks/SamuelPietro/SisVendas) ![](https://img.shields.io/github/languages/top/SamuelPietro/SisVendas) ![](https://img.shields.io/github/release/SamuelPietro/SisVendas) ![](https://img.shields.io/github/issues/SamuelPietro/SisVendas) ![](https://img.shields.io/github/repo-size/SamuelPietro/SisVendas)

Sistema de vendas completo com importação de planilhas e cadastro de clientes, vendas e relatorios.

A importação das planilhas de venda são feitas na aba vendas > importar vendas.
Sempre que importar um cliente ou serviço que não existe no sistema estes serão cadastrados automaticamente. 

É possivel encontrar um layout de para importação juntos aos arquivos do sitema, na pasta public/files/modelo.csv
A aplicação foi desenhada com base no seguinte problema:
    O usuário possui um controle de vendas em Planilhas Excel. Ele pretende ter uma forma de subir (upload) essas planilhas na internet,
    atualizando / criando os clientes e abastecendo um cadastro de vendas, para ter visão de seus principais indicadores / Relatórios. 

## Instalação em maquina local

1. Instale o XAMPP [(Download)](https://www.apachefriends.org/download.html)
2. Após instalado execute-o e inicie os modulos Apache e MySql
3. Clone o repositório para a pasta raiz do seu host local. "c:/xampp/htdocs".
4. Em seu navegador vá até http://localhost/phpmyadmin e crie um novo banco de dados com o nome face
5. Importe o arquivo "db.sql" dentro do diretório "database" para esse novo banco de dados criado.
6. Execute "composer install" no seu terminal para gerar as rotas. 


    composer install

7. (Opcional) Altere os dados de configuração do sistema e de acesso ao banco de dados quando preciso em "Core/config.php".
Agora basta acessar a aplicação em seu navegador usando `localhost`

___
### Instalação para desenvolvimento

* Para fins de desenvolvimento você pode usar o propio servidor do PHP executando o comando "`php -S localhost:8000 -t public/`".
Neste caso o caminho para acessar a aplicação será `localhost:8000`


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

