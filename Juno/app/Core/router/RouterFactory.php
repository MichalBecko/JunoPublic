<?php

namespace App;

use Nette\Application\Routers\RouteList,
    Nette\Application\IRouter;

/**
 * Router factory
 */class RouterFactory
{        
    
    /** @var RouteList */
    private $router;

    public function __construct($createdRoutes) {
        $this->router = new RouteList();
        
        foreach ($createdRoutes as $routeList) {
            $this->addRouteList($routeList);
        }
    }

    /**
     * Add routelist to router
     * @param RouteList $routeList
     */
    private function addRouteList($routeList) {
        $this->router[] = $routeList;
    }

    /**
     * @return IRouter
     */
    public function createRouter() {
        $router = $this->getRouter();
        return $router;
    }

    /**
     * Returns current router
     * @return RouteList
     */
    public function getRouter() {
        return $this->router;
    }

}

