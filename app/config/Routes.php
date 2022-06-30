<?php


namespace app\config;

use app\core\Route;

require_once ('app//controller//AppController.php');
require_once ('app//controller//LoginController.php');
require_once ('app//controller//ClienteController.php');
require_once ('app//controller//MeusDadosController.php');

require_once ('app//controller//FuncionarioController.php');
require_once ('app//controller//ProcessoController.php');
require_once ('app//controller//EnderecoController.php');



require_once ('app/core/Route.php');

class Routes extends Route {

    public function setAllowInitialRoutes(){
        $this->routes['/'] = array('controller' => 'AppController', 'action'=> 'index');
        $this->routes['/login'] = array('controller' => 'LoginController', 'action'=> 'index');
        $this->routes['/login'] = array('controller' => 'LoginController', 'action'=> 'makeLogin');

        $this->routes['/logout'] = array('controller' => 'LoginController', 'action'=> 'logout');


        $this->routes['/home'] = array('controller' => 'AppController', 'action'=> 'home');

        $this->routes['/processos'] = array('controller' => 'ProcessoController', 'action'=> 'index');
        $this->routes['/processos/store'] = array('controller' => 'ProcessoController', 'action'=> 'store');
        $this->routes['/processos/edit'] = array('controller' => 'ProcessoController', 'action'=> 'edit');
        $this->routes['/processos/update'] = array('controller' => 'ProcessoController', 'action'=> 'update');
        $this->routes['/processos/delete'] = array('controller' => 'ProcessoController', 'action'=> 'delete');
        $this->routes['/processos/form'] = array('controller' => 'ProcessoController', 'action'=> 'form');

        $this->routes['/clientes'] = array('controller' => 'ClienteController', 'action'=> 'index');
        $this->routes['/clientes/store'] = array('controller' => 'ClienteController', 'action'=> 'store');
        $this->routes['/clientes/edit'] = array('controller' => 'ClienteController', 'action'=> 'edit');
        $this->routes['/clientes/update'] = array('controller' => 'ClienteController', 'action'=> 'update');
        $this->routes['/clientes/delete'] = array('controller' => 'ClienteController', 'action'=> 'delete');
        $this->routes['/clientes/form'] = array('controller' => 'ClienteController', 'action'=> 'form');


        $this->routes['/perfil-cliente'] = array('controller' => 'ClienteController', 'action'=> 'perfilCliente');

        $this->routes['/enderecos'] = array('controller' => 'EnderecoController', 'action'=> 'index');
        $this->routes['/enderecos/store'] = array('controller' => 'EnderecoController', 'action'=> 'store');
        $this->routes['/enderecos/edit'] = array('controller' => 'EnderecoController', 'action'=> 'edit');
        $this->routes['/enderecos/update'] = array('controller' => 'EnderecoController', 'action'=> 'update');
        $this->routes['/enderecos/delete'] = array('controller' => 'EnderecoController', 'action'=> 'delete');
        $this->routes['/enderecos/form'] = array('controller' => 'EnderecoController', 'action'=> 'form');

        $this->routes['/funcionarios'] = array('controller' => 'FuncionarioController', 'action'=> 'index');
        $this->routes['/funcionarios/store'] = array('controller' => 'FuncionarioController', 'action'=> 'store');
        $this->routes['/funcionarios/edit'] = array('controller' => 'FuncionarioController', 'action'=> 'edit');
        $this->routes['/funcionarios/desativar'] = array('controller' => 'FuncionarioController', 'action'=> 'desativar');
        $this->routes['/funcionarios/form'] = array('controller' => 'FuncionarioController', 'action'=> 'form');

        $this->routes['/meus-dados'] = array('controller' => 'MeusDadosController', 'action'=> 'index');
        $this->routes['/meus-dados/create'] = array('controller' => 'MeusDadosController', 'action'=> 'atualizaDados');
        $this->routes['/meus-dados/edit'] = array('controller' => 'MeusDadosController', 'action'=> 'atualizaSenha');
        

    }


}