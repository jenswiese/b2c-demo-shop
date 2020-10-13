<?php

namespace Pyz\Zed\MerchantStorage\Business;

use Pyz\Zed\Merchant\Business\MerchantFacade;
use Pyz\Zed\MerchantStorage\Business\Model\MerchantStorageWriter;
use Pyz\Zed\MerchantStorage\MerchantStorageDependencyProvider;
use Pyz\Zed\MerchantStorage\Persistence\MerchantStorageEntityManagerInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method MerchantStorageEntityManagerInterface getEntityManager()
 */
class MerchantStorageBusinessFactory extends AbstractBusinessFactory
{
    public function createMerchantStorageWriter(): MerchantStorageWriter
    {
        return new MerchantStorageWriter(
            $this->getEntityManager(),
            $this->getMerchantFacade()
        );
    }

    /**
     * @return MerchantFacade
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getMerchantFacade(): MerchantFacade
    {
        return $this->getProvidedDependency(MerchantStorageDependencyProvider::MERCHANT_FACADE);
    }
}
