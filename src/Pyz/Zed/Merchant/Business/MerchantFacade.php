<?php

namespace Pyz\Zed\Merchant\Business;

use Pyz\Zed\Merchant\Persistence\MerchantRepositoryInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method MerchantRepositoryInterface getRepository()
 */
class MerchantFacade extends AbstractFacade implements MerchantFacadeInterface
{
    /**
     * @param array $merchantIds
     * @return array
     */
    public function getMerchantByIdMerchant(array $merchantIds): array
    {
        return $this->getRepository()->findByIdMerchant($merchantIds);
    }

}
