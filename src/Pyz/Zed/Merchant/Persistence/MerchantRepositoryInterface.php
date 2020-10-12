<?php

namespace Pyz\Zed\Merchant\Persistence;

interface MerchantRepositoryInterface
{
    /**
     * @param int[] $merchantIds
     * @return array
     */
    public function findByIdMerchant(array $merchantIds): array;
}
