<?php

namespace Pyz\Zed\MerchantStorage\Persistence;

use Generated\Shared\Transfer\MerchantStorageTransfer;
use Orm\Zed\Merchant\Persistence\PyzMerchantStorage;
use Spryker\Shared\Kernel\Transfer\EntityTransferInterface;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

class MerchantStorageEntityManager extends AbstractEntityManager implements MerchantStorageEntityManagerInterface
{
    /**
     * @param MerchantStorageTransfer $transfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveMerchantStorage(MerchantStorageTransfer $transfer): void
    {
        $merchantStorage = new PyzMerchantStorage();
        $merchantStorage->setFkMerchant($transfer->getIdMerchant());
        $merchantStorage->setData($transfer->toArray());
        $merchantStorage->save();
    }

    /**
     * @param EntityTransferInterface $entityTransfer
     */
    public function deleteMerchantStorage(EntityTransferInterface $entityTransfer): void
    {
        $parentEntity = $this->createTransferToEntityMapper()->mapEntityCollection($entityTransfer);
        $parentEntity->delete();
    }
}
