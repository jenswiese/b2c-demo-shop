<?php

namespace Pyz\Zed\DataImport\Business\Model\Merchant;

use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;

class MerchantAddressConcatinationStep implements DataImportStepInterface
{
    protected const MERCHANT_ADDRESS_KEY = 'address';
    protected const MERCHANT_STREET_KEY = 'street';
    protected const MERCHANT_ZIPCODE_KEY = 'zipcode';
    protected const MERCHANT_COUNTRY_KEY = 'country';

    protected $addressItems = [
        self::MERCHANT_STREET_KEY,
        self::MERCHANT_ZIPCODE_KEY,
        self::MERCHANT_COUNTRY_KEY,
    ];

    /**
     * @inheritDoc
     */
    public function execute(DataSetInterface $dataSet): void
    {
        if ($this->isAddressComplete($dataSet)) {
            $this->concatAddress($dataSet);
        }
    }

    /**
     * @param DataSetInterface $dataSet
     */
    private function concatAddress(DataSetInterface $dataSet): void
    {
        $resolvedAddressItems = array_map(static function (string $itemKey) use ($dataSet) {
            return $dataSet[$itemKey];
        }, $this->addressItems);

        $address = vsprintf('%s, %s %s', $resolvedAddressItems);

        $dataSet[static::MERCHANT_ADDRESS_KEY] = $address;
    }

    /**
     * @param DataSetInterface $dataSet
     * @return bool
     */
    private function isAddressComplete(DataSetInterface $dataSet): bool
    {
        foreach ($this->addressItems as $item) {
            if (!isset($dataSet[$item]) || empty($dataSet[$item])) {
                return false;
            }
        }

        return true;
    }
}
