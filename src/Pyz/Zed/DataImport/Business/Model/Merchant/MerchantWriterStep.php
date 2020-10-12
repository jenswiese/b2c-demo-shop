<?php

namespace Pyz\Zed\DataImport\Business\Model\Merchant;

use Orm\Zed\Merchant\Persistence\PyzMerchantQuery;
use Pyz\Zed\Merchant\MerchantEvents\MerchantEvents;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\PublishAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;

class MerchantWriterStep extends PublishAwareStep implements DataImportStepInterface
{
    protected const MERCHANT_ID_KEY = 'merchant_id';
    protected const MERCHANT_NAME_KEY = 'name';
    protected const MERCHANT_ADDRESS_KEY = 'address';

    /**
     * @inheritDoc
     */
    public function execute(DataSetInterface $dataSet)
    {
        if (!$this->isValid($dataSet)) {
            return;
        }

        $this->findOrCreateMerchant($dataSet);
    }

    /**
     * @param DataSetInterface $dataSet
     * @return bool
     */
    private function isValid(DataSetInterface $dataSet): bool
    {
        if (!isset($dataSet[self::MERCHANT_ADDRESS_KEY]) || empty($dataSet[self::MERCHANT_ADDRESS_KEY])) {
            return false;
        }

        return true;
    }

    /**
     * @param DataSetInterface $dataSet
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    private function findOrCreateMerchant(DataSetInterface $dataSet)
    {
        $merchantEntity = PyzMerchantQuery::create()
            ->filterByIdMerchant($dataSet[static::MERCHANT_ID_KEY])
            ->findOneOrCreate();

        $merchantEntity
            ->setAddress($dataSet[static::MERCHANT_ADDRESS_KEY])
            ->setName($dataSet[static::MERCHANT_NAME_KEY]);

        if ($merchantEntity->isNew() || $merchantEntity->isModified()) {
            $merchantEntity->save();

            $this->addPublishEvents(
                MerchantEvents::MERCHANT_PUBLISH,
                $merchantEntity->getIdMerchant()
            );
        }
    }
}
