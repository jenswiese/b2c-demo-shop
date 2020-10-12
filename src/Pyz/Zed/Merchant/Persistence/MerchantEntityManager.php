<?php

namespace Pyz\Zed\Merchant\Persistence;

use Generated\Shared\Transfer\PublishMerchantToStorageTransfer;
use Orm\Zed\Merchant\Persistence\PyzMerchantStorage;
use Spryker\Shared\Kernel\Transfer\EntityTransferInterface;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method MerchantPersistenceFactory getFactory()
 */
class MerchantEntityManager extends AbstractEntityManager
{
    /**
     * @param PublishMerchantToStorageTransfer $transfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveMerchantStorage(PublishMerchantToStorageTransfer $transfer): void
    {
        $merchantStorage = new PyzMerchantStorage();
        $merchantStorage->setFkMerchant($transfer->getMerchantId());
        $merchantStorage->setData($transfer->getMerchantData());
        $merchantStorage->save();
    }

    /**
     * @param EntityTransferInterface $entityTransfer
     */
    public function deleteMerchantStorage(EntityTransferInterface $entityTransfer): void
    {
        $transferToEntityMapper = $this->createTransferToEntityMapper();
        $parentEntity = $transferToEntityMapper->mapEntityCollection($entityTransfer);
        $parentEntity->delete();
    }
}
