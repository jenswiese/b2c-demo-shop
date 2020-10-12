<?php

namespace Pyz\Zed\Merchant\Persistence;

use Orm\Zed\Merchant\Persistence\PyzMerchantQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class MerchantPersistenceFactory extends AbstractPersistenceFactory implements MerchantPersistenceFactoryInterface
{
    /**
     * @return PyzMerchantQuery
     */
    public function createMerchantQuery(): PyzMerchantQuery
    {
        return PyzMerchantQuery::create();
    }
}
