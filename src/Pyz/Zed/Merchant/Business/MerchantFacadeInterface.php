<?php

namespace Pyz\Zed\Merchant\Business;

interface MerchantFacadeInterface
{
    /**
     * @param int[] $merchantIds
     * @return array
     */
    public function getMerchantByIdMerchant(array $merchantIds): array;
}
