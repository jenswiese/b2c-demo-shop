<?php

namespace Pyz\Zed\Merchant\Communication\Plugin\Event\Listener;

use Generated\Shared\Transfer\EventEntityTransfer;
use Pyz\Zed\Merchant\Business\MerchantFacade;
use Pyz\Zed\Merchant\MerchantEvents\MerchantEvents;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Event\Dependency\Plugin\EventBulkHandlerInterface;

/**
 * @method MerchantFacade getFacade()
 */
class MerchantStorageListener extends AbstractPlugin implements EventBulkHandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handleBulk(array $transfers, $eventName): void
    {
        $merchantIds = $this->extractMerchantIdsFromTransfers($transfers);

        if ($eventName === MerchantEvents::ENTITY_PYZ_MERCHANT_DELETE) {
            $this->getFacade()->unpublish($merchantIds);
        } else {
            $this->getFacade()->publish($merchantIds);
        }
    }

    /**
     * @param EventEntityTransfer[] $transfers
     * @return int[]
     */
    private function extractMerchantIdsFromTransfers(array $transfers): array
    {
        return array_map(function (EventEntityTransfer $eventEntityTransfer) {
            return $eventEntityTransfer->getId();
        }, $transfers);
    }
}
