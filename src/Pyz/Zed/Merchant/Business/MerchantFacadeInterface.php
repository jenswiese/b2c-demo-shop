<?php

namespace Pyz\Zed\Merchant\Business;

interface MerchantFacadeInterface
{
    /**
     * @param array $merchantIds
     */
    public function publish(array $merchantIds): void;

    /**
     * @param array $merchantIds
     */
    public function unpublish(array $merchantIds): void;
}
