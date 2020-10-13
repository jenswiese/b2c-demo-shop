<?php

namespace Pyz\Zed\Merchant\Persistence;

use Orm\Zed\Merchant\Persistence\PyzMerchantQuery;

interface MerchantPersistenceFactoryInterface
{
    /**
     * @return PyzMerchantQuery
     */
    public function createMerchantQuery(): PyzMerchantQuery;
}
