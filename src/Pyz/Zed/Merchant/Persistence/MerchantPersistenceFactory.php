<?php

namespace Pyz\Zed\Merchant\Persistence;

use Orm\Zed\Merchant\Persistence\PyzMerchantQuery;
use Orm\Zed\Merchant\Persistence\PyzMerchantStorageQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class MerchantPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return PyzMerchantQuery
     */
    public function createMerchantQuery(): PyzMerchantQuery
    {
        return PyzMerchantQuery::create();
    }

    /**
     * @return PyzMerchantStorageQuery
     */
    public function createMerchantStorageQuery(): PyzMerchantStorageQuery
    {
        return PyzMerchantStorageQuery::create();
    }
}
