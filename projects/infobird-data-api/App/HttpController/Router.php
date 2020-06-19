<?php
/**
 * Users: xiaonian
 * Date: 2020/05/09
 * Time: 16:40
 */
namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\AbstractRouter;
use FastRoute\RouteCollector;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;

class Router extends AbstractRouter
{
    function initialize(RouteCollector $routeCollector)
    {
		$routeCollector->put('/api/form', 'Form/add');
		$routeCollector->get('/api/form', 'Form/one');
		$routeCollector->get('/api/formList', 'Form/list');
		
		$routeCollector->put('/api/data', 'Data/add');
		$routeCollector->post('/api/data', 'Data/update');
		$routeCollector->get('/api/data', 'Data/one');
		$routeCollector->get('/api/dataList', 'Data/list');
    }
}