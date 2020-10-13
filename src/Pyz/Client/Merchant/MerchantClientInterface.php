<?php

namespace Pyz\Client\Merchant;

use Generated\Shared\Transfer\MerchantStorageTransfer;

interface MerchantClientInterface
{
    public function getMerchantByIdMerchant(int $idMerchant): MerchantStorageTransfer;
}
