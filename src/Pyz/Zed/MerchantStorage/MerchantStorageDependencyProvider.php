<?php

namespace Pyz\Zed\MerchantStorage;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class MerchantStorageDependencyProvider extends AbstractBundleDependencyProvider
{
    public const MERCHANT_FACADE = 'merchant_facade';

    /**
     * @param Container $container
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = $this->addMerchantFacade($container);

        return $container;
    }

    /**
     * @param Container $container
     * @return Container
     */
    private function addMerchantFacade(Container $container)
    {
        $container[self::MERCHANT_FACADE] = function (Container $container) {
            return $container->getLocator()->merchant()->facade();
        };

        return $container;
    }
}
