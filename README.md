# PHP-CRUD-MVC
![PHP](https://becode.com.br/wp-content/uploads/2017/09/php-post-1.png)

# Projeto de Estudos - PHP-CRUD-MVC

### PHP + Apache + Mysql + MaterializeCSS
Implementação de um projeto de CRUD em PHP (Cadastro de Produtos) utilizando o acesso ao banco de dados Mysql e o MaterializeCSS.

### Requisitos Solicitados :
CRUD simples de cadastro de produtos.

Os atributo desses produtos são:
- Nome
- Preço
- Descrição
- Imagem

### Observações Gerais
Criada uma estrutura de pastas para facilitar a organização do projeto.

| Pasta  | Descrição  | Observações |
|---|---|---|
| `/app`  | Arquivos referentes a implementação lógica da aplicação  | |
| `../config`  | Arquivos de configuração | |
| `../controller`  | Classes de Controllers | |
| `../core`  | Classes base | |
| `../dao`  | Classes DAO de persistência dos dados | |
| `../model`  | Classes de Models | |
| `/resources`  | Diretório com arquivos de frontend  | |
| `../static`  | Arquivos estáticos utilizados nas views  | |
| `../templates`  | Classes de Views | |
| `../var`  | Diretório para armazenamento dos arquivos gerais  | |


### Como utilizar?

Clone o projeto para o seu repositório local:

```
git clone https://github.com/lucasapoena/PHP-CRUD-MVC
```

- Executar a query **app/config/init.sql** ou importar o arquivo no phpMyAdmin para criar as tables.
- Editar o arquivo **app/config/Config.php**; 
    - Edite a constante **BASE_DIR** com o path do seu projeto;
    - Edite suas informações de banco de dados;

```
# Configuração dos paths
define('BASE_DIR', "/bleez/PHP-CRUD-MVC");

# Configurações do banco de dados
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '123456');
define('DB_DATABASE', 'db_loja');

```

### License

MIT © 2019 [Lucas Apoena](https://github.com/lucasapoena/) and [contributors](https://github.com/lucasapoena/PHP-CRUD-MVC/graphs/contributors).
