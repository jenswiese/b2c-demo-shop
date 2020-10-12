<?php

namespace Pyz\Zed\Merchant\Business;

use Pyz\Zed\Merchant\Business\Model\Importer\MerchantImporter;
use Pyz\Zed\Merchant\Business\Model\MerchantStorageWriter;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class MerchantBusinessFactory extends AbstractBusinessFactory
{
    public function createMerchantStorageWriter(): MerchantStorageWriter
    {
        return new MerchantStorageWriter(
            $this->getEntityManager(),
            $this->getRepository()
        );
    }

    public function createMerchantImporter()
    {
        return new MerchantImporter();
    }
}
