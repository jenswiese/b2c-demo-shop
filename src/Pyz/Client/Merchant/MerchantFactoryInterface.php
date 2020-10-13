<?php

namespace Pyz\Client\Merchant;

use Spryker\Client\Storage\StorageClientInterface;

interface MerchantFactoryInterface
{
    /**
     * @return StorageClientInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getStorageClient(): StorageClientInterface;
}
