<?php

namespace Pyz\Zed\MerchantStorage\Business\Model;

use Generated\Shared\Transfer\MerchantStorageTransfer;
use Generated\Shared\Transfer\PyzMerchantStorageEntityTransfer;
use Propel\Runtime\Exception\PropelException;
use Pyz\Zed\Merchant\Business\MerchantFacade;
use Pyz\Zed\MerchantStorage\Persistence\MerchantStorageEntityManagerInterface;

class MerchantStorageWriter
{
    /**
     * @var MerchantStorageEntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var MerchantFacade
     */
    protected $merchantFacade;

    /**
     * @param MerchantStorageEntityManagerInterface $entityManager
     * @param MerchantFacade $merchantFacade
     */
    public function __construct(MerchantStorageEntityManagerInterface $entityManager, MerchantFacade $merchantFacade)
    {
        $this->entityManager = $entityManager;
        $this->merchantFacade = $merchantFacade;
    }

    /**
     * @param array $merchantIds
     * @throws PropelException
     */
    public function publish(array $merchantIds): void
    {
        $modifiedMerchants = $this->merchantFacade->getMerchantByIdMerchant($merchantIds);

        foreach ($modifiedMerchants as $merchant) {
            $storageTransfer = new MerchantStorageTransfer();
            $storageTransfer->fromArray($merchant->toArray(), true);

            $this->entityManager->saveMerchantStorage($storageTransfer);
        }
    }

    /**
     * @param array $merchantIds
     */
    public function unpublish(array $merchantIds): void
    {
        foreach ($merchantIds as $merchantId) {
            $storageTransfer = new PyzMerchantStorageEntityTransfer();
            $storageTransfer->setFkMerchant($merchantId);

            $this->entityManager->deleteMerchantStorage($storageTransfer);
        }
    }
}
