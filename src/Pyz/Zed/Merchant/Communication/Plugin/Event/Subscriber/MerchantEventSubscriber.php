<?php

namespace Pyz\Zed\Merchant\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\Merchant\Communication\Plugin\Event\Listener\MerchantStorageListener;
use Pyz\Zed\Merchant\MerchantEvents\MerchantEvents;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;

class MerchantEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @param EventCollectionInterface $eventCollection
     * @return EventCollectionInterface
     */
    public function getSubscribedEvents(EventCollectionInterface $eventCollection)
    {
        $eventsToSubscribe = [
            MerchantEvents::ENTITY_PYZ_MERCHANT_CREATE,
            MerchantEvents::ENTITY_PYZ_MERCHANT_UPDATE,
            MerchantEvents::ENTITY_PYZ_MERCHANT_DELETE,
            MerchantEvents::MERCHANT_PUBLISH,
            MerchantEvents::MERCHANT_UNPUBLISH,
        ];

        foreach ($eventsToSubscribe as $eventName) {
            $eventCollection->addListenerQueued($eventName, new MerchantStorageListener());
        }

        return $eventCollection;
    }
}
