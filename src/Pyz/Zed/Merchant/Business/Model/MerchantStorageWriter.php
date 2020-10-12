<?php

namespace Pyz\Zed\Merchant\Business\Model;

use Generated\Shared\Transfer\PublishMerchantToStorageTransfer;
use Generated\Shared\Transfer\PyzMerchantStorageEntityTransfer;
use Propel\Runtime\Exception\PropelException;
use Pyz\Zed\Merchant\Persistence\MerchantEntityManager;
use Pyz\Zed\Merchant\Persistence\MerchantRepository;

class MerchantStorageWriter
{
    /**
     * @var MerchantEntityManager
     */
    protected $entityManager;

    /**
     * @var MerchantRepository
     */
    protected $repository;

    /**
     * @param MerchantEntityManager $entityManager
     * @param MerchantRepository $repository
     */
    public function __construct(MerchantEntityManager $entityManager, MerchantRepository $repository)
    {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    /**
     * @param array $merchantIds
     * @throws PropelException
     */
    public function publish(array $merchantIds): void
    {
        $modifiedMerchants = $this->repository->queryMerchantsById($merchantIds);

        foreach ($modifiedMerchants as $merchant) {
            $storageTransfer = new PublishMerchantToStorageTransfer();
            $storageTransfer->setMerchantId($merchant->getIdMerchant());
            $storageTransfer->setMerchantData($merchant->toArray());

            $this->entityManager->saveMerchantStorage($storageTransfer);
        }
    }

    /**
     * @param array $merchantIds
     */
    public function unpublish(array $merchantIds): void
    {
        $deletedMerchants = $this->repository->queryMerchantsById($merchantIds);

        foreach ($deletedMerchants as $merchant) {
            $storageTransfer = new PyzMerchantStorageEntityTransfer();
            $storageTransfer->fromArray($merchant->toArray(), true);

            $this->entityManager->deleteMerchantStorage($storageTransfer);
        }
    }

}
