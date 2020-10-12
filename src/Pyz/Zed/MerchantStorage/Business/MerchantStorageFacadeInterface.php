<?php

namespace Pyz\Zed\MerchantStorage\Business;

interface MerchantStorageFacadeInterface
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
