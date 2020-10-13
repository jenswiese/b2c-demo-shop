<?php

namespace Pyz\Client\Merchant;

use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Storage\StorageClientInterface;

class MerchantFactory extends AbstractFactory implements MerchantFactoryInterface
{
    /**
     * @return StorageClientInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getStorageClient(): StorageClientInterface
    {
        return $this->getProvidedDependency(MerchantDependencyProvider::CLIENT_STORAGE);
    }
}
