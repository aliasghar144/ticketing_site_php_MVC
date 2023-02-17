<?php

class Router
{
    public function __construct()
    {
        $request_type = $_SERVER['REQUEST_METHOD'];
        $url = '/' . $_GET['url'];
        $routes = [
            'asUserLogin' => [
                'type' => "GET",
                'pattern_url' => '/^\/auth\/userlogin$/',
                'controller' => 'authController',
                'action' => 'userlogin',
            ],
            'asCompanyLogin' => [
                'type' => "GET",
                'pattern_url' => '/^\/auth\/companylogin$/',
                'controller' => 'authController',
                'action' => 'companylogin',
            ],
            'loggedIn' => [
                'type' => 'POST',
                'pattern_url' => '/^\/auth\/login_user$/',
                'controller' => 'authController',
                'action' => 'login_user',
            ],
            'logout' => [
                'type' => 'GET',
                'pattern_url' => '/^\/auth\/logout$/',
                'controller' => 'authController',
                'action' => 'logout',
            ],
            'asUserRegister' => [
                'type' => "GET",
                'pattern_url' => '/^\/auth\/userregister$/',
                'controller' => 'authController',
                'action' => 'userregister'
            ],
            'asCompanyRegister' => [
                'type' => "GET",
                'pattern_url' => '/^\/auth\/companyregister$/',
                'controller' => 'authController',
                'action' => 'companyregister'
            ],
            'registered' => [
                'type' => "POST",
                'pattern_url' => '/^\/auth\/register_user$/',
                'controller' => 'authController',
                'action' => 'register_user'
            ],
            'dashboard' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/index$/',
                'controller' => 'dashboardController',
                'action' => 'index',
                'middleware' => ['personPolicy:is_login'],
            ],
            'list_tickets' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/tickets$/',
                'controller' => 'ticketController',
                'action' => 'show_tickets',
                'middleware' => ['personPolicy:is_login', 'personPolicy:is_company'],
            ],
            'add_ticket' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/add_ticket$/',
                'controller' => 'ticketController',
                'action' => 'add_ticket',
                'middleware' => ['personPolicy:is_login', 'personPolicy:is_company'],
            ],
            'add_one_ticket' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/add_one_ticket$/',
                'controller' => 'ticketController',
                'action' => 'add_one_ticket',
                'middleware' => ['personPolicy:is_login', 'personPolicy:is_company'],
            ],
            'answer_ticket' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/answer_ticket\/\d{1,10}$/',
                'controller' => 'ticketController',
                'action' => 'answer_ticket',
                'middleware' => ['personPolicy:is_login', 'personPolicy:is_company'],
            ],
            'reply_one_ticket' => [
                'type' => "POST",
                'pattern_url' => '/^\/dashboard\/reply_one_ticket\/\d{1,10}$/',
                'controller' => 'ticketController',
                'action' => 'reply_one_ticket',
                'middleware' => ['personPolicy:is_login', 'personPolicy:is_company'],
            ],
            'delete_ticket' => [
                'type' => "GET",
                'pattern_url' => '/^\/dashboard\/delete_ticket\/\d{1,10}$/',
                'controller' => 'ticketController',
                'action' => 'delete_ticket',
                'middleware' => ['personPolicy:is_login', 'personPolicy:is_company'],
            ],
        ];
        foreach ($routes as $route) {
            if (preg_match($route['pattern_url'],$url,$matches) && $request_type == $route['type']) {
                //middleware check
                if (isset($route['middleware']) && $route['middleware'] != '') {
                    foreach ($route['middleware'] as $middleware) {
                        $middleware_class = explode(':', $middleware)[0];
                        $middleware_action = explode(':', $middleware)[1];

                        require_once 'app/middleware/' . $middleware_class . '.php';
                        $new_middleware = new $middleware_class();
                        $new_middleware->$middleware_action();
                    }
                }
                $params = (array) explode('/', $matches[0])[3];
                require 'app/controllers/' . $route['controller'] . '.php';
                $object = new $route['controller']();
                call_user_func_array([$object, $route['action']], $params);
                die();
            }
        }
        echo "PAGE NOT FOUND";
    }
}