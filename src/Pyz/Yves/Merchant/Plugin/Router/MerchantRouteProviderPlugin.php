<?php

namespace Pyz\Yves\Merchant\Plugin\Router;

use Spryker\Yves\Router\Route\RouteCollection;
use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;

class MerchantRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    protected const MODUlE_NAME = 'Merchant';
    protected const CONTROLLER_NAME = 'Merchant';

    protected const ROUTE_NAME_GET_MERCHANT = 'get_merchant';
    protected const ROUTE_PATH_GET_MERCHANT = '/merchant/{idMerchant}';
    protected const ROUTE_ACTION_GET_MERCHANT = 'getMerchantByIdMerchantAction';

    /**
     * @inheritDoc
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = $this->addGetMerchantRoute($routeCollection);

        return $routeCollection;
    }

    /**
     * @param RouteCollection $routeCollection
     * @return RouteCollection
     */
    private function addGetMerchantRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildGetRoute(
            self::ROUTE_PATH_GET_MERCHANT,
            self::MODUlE_NAME,
            self::CONTROLLER_NAME,
            self::ROUTE_ACTION_GET_MERCHANT
        );

        $route->addRequirements(['idMerchant' => '\d+']);

        $routeCollection->add(self::ROUTE_NAME_GET_MERCHANT, $route);

        return $routeCollection;
    }
}
