<?php

namespace Pyz\Zed\Merchant\Business;

interface MerchantFacadeInterface
{
    public function getMerchantByIdMerchant(array $merchantIds): array;
}
