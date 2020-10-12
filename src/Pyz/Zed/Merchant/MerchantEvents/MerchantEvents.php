<?php

namespace Pyz\Zed\Merchant\MerchantEvents;

interface MerchantEvents
{
    public const MERCHANT_PUBLISH = 'Merchant.pyz_merchant.publish';
    public const MERCHANT_UNPUBLISH = 'Merchant.pyz_merchant.unpublish';

    public const ENTITY_PYZ_MERCHANT_CREATE = "Entity.pyz_merchant.create";
    public const ENTITY_PYZ_MERCHANT_UPDATE = "Entity.pyz_merchant.update";
    public const ENTITY_PYZ_MERCHANT_DELETE = "Entity.pyz_merchant.delete";
}
