<?php

namespace App\Config;


use App\Controllers\HomeController;
use \Silex\Application;

class Router
{
    private $home;
    private $connection;
    private $app;

    public function __construct(Application $app, MySQLConnector $conn)
    {
        $this->connection = $conn;
        $this->home = new HomeController($this->connection->getPdo());
        $this->app = $app;
    }

    public function home()
    {
        $homeCont = $this->app['controllers_factory'];
        $homeCont->get('/', function () {
            return $this->home->getAll();
        });
        $homeCont->get('/{id}', function ($id) {
            return $this->home->getByOffset($id);
        });
        $homeCont->post('/', function () {
            return $this->home->post(file_get_contents('php://input'));
        });
        $homeCont->put('/{id}', function ($id) {
            return $this->home->updateByOffset($id, file_get_contents('php://input'));
        });
        $homeCont->delete('/{id}', function ($id) {
            return $this->home->deleteByOffset($id);
        });

        $homeCont->get('/hello/', function () {
            return 'Hello world!';
        });

        return $homeCont;
    }
}