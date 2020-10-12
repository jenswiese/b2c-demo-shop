<?php

namespace Pyz\Zed\MerchantStorage\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method MerchantStorageBusinessFactory getFactory
 */
class MerchantStorageFacade extends AbstractFacade implements MerchantStorageFacadeInterface
{
    /**
     * @inheritDoc
     */
    public function publish(array $merchantIds): void
    {
        $this->getFactory()->createMerchantStorageWriter()->publish($merchantIds);
    }

    /**
     * @inheritDoc
     */
    public function unpublish(array $merchantIds): void
    {
        $this->getFactory()->createMerchantStorageWriter()->unpublish($merchantIds);
    }
}
