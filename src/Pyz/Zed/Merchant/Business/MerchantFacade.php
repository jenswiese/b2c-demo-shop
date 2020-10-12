<?php


namespace Pyz\Zed\Merchant\Business;


use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method MerchantBusinessFactory getFactory
 */
class MerchantFacade extends AbstractFacade implements MerchantFacadeInterface
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
