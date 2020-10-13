<?php

namespace Pyz\Zed\Merchant\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method MerchantPersistenceFactoryInterface getFactory()
 */
class MerchantRepository extends AbstractRepository implements MerchantRepositoryInterface
{
    /**
     * @param int[] $merchantIds
     * @return array
     */
    public function findByIdMerchant(array $merchantIds): array
    {
        $query = $this->getFactory()->createMerchantQuery()
            ->filterByIdMerchant_In($merchantIds);

        return $this->buildQueryFromCriteria($query)->find();
    }
}
