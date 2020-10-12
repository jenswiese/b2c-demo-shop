<?php

namespace Pyz\Zed\MerchantStorage\Persistence;

use Generated\Shared\Transfer\MerchantStorageTransfer;
use Spryker\Shared\Kernel\Transfer\EntityTransferInterface;

interface MerchantStorageEntityManagerInterface
{
    /**
     * @param MerchantStorageTransfer $transfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveMerchantStorage(MerchantStorageTransfer $transfer): void;

    /**
     * @param EntityTransferInterface $entityTransfer
     */
    public function deleteMerchantStorage(EntityTransferInterface $entityTransfer): void;
}
