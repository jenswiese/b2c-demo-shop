<?php

namespace Pyz\Zed\Merchant\Persistence;

use ArrayIterator;
use Generated\Shared\Transfer\PyzMerchantEntityTransfer;
use Orm\Zed\Merchant\Persistence\PyzMerchant;
use Propel\Runtime\Collection\Collection;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method MerchantPersistenceFactory getFactory()
 */
class MerchantRepository extends AbstractRepository
{
    /**
     * @param int[] $merchantIds
     * @return ArrayIterator
     */
    public function queryMerchantsById(array $merchantIds): ArrayIterator
    {
        $collection = $this->getFactory()->createMerchantQuery()
            ->filterByIdMerchant_In($merchantIds)
            ->find();

        return $this->mapPropelCollectionToTransferObjects($collection);
    }

    /**
     * @param Collection $entityCollection
     * @return ArrayIterator
     */
    protected function mapPropelCollectionToTransferObjects(Collection $entityCollection): ArrayIterator
    {
        $transferObjects = array_map(static function (PyzMerchant $merchant) {
            return (new PyzMerchantEntityTransfer())->fromArray($merchant->toArray(), true);
        }, $entityCollection->getArrayCopy());

        return new ArrayIterator($transferObjects);
    }
}
