<?php

namespace Pyz\Client\Merchant;

use Generated\Shared\Transfer\MerchantStorageTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method MerchantFactoryInterface getFactory()
 */
class MerchantClient extends AbstractClient implements MerchantClientInterface
{
    protected const MERCHANT_STORAGE_KEY_PATTERN = 'merchant:%s';

    /**
     * @param int $idMerchant
     * @return MerchantStorageTransfer
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getMerchantByIdMerchant(int $idMerchant): MerchantStorageTransfer
    {
        $key = sprintf(static::MERCHANT_STORAGE_KEY_PATTERN, $idMerchant);
        $merchantData = $this->getFactory()->getStorageClient()->get($key);

        $storageTransfer = new MerchantStorageTransfer();
        $storageTransfer->fromArray($merchantData, true);

        return $storageTransfer;
    }
}
