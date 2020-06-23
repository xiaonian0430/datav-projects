<?php
/**
 * @Description: 路由器
 * @author: Xiao Nian
 * @date: 2020-06-22 09:40:22
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
        $routeCollector->get('/api/roseChart', 'RoseChart/data');
        $routeCollector->post('/api/users/login', 'Users/login');
    }
}
