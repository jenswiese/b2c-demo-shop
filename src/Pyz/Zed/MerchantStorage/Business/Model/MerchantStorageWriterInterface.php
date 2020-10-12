<?php

namespace Pyz\Zed\MerchantStorage\Business\Model;

use Propel\Runtime\Exception\PropelException;

interface MerchantStorageWriterInterface
{
    /**
     * @param int[] $merchantIds
     * @throws PropelException
     */
    public function publish(array $merchantIds): void;

    /**
     * @param array $merchantIds
     */
    public function unpublish(array $merchantIds): void;
}
