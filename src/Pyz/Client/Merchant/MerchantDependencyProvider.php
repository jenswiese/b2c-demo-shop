<?php

namespace Pyz\Client\Merchant;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class MerchantDependencyProvider extends AbstractDependencyProvider
{
    public const CLIENT_STORAGE = 'CLIENT_STORAGE';

    /**
     * @param Container $container
     * @return Container|void
     */
    public function provideServiceLayerDependencies(Container $container): Container
    {
        $container = $this->addStorageClient($container);

        return $container;
    }

    /**
     * @param Container $container
     * @return Container
     */
    private function addStorageClient(Container $container): Container
    {
        $container[static::CLIENT_STORAGE] = function (Container $container) {
            return $container->getLocator()->storage()->client();
        };

        return $container;
    }
}
