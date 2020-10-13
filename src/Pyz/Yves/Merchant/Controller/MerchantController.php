<?php

namespace Pyz\Yves\Merchant\Controller;

use Pyz\Client\Merchant\MerchantClientInterface;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @method MerchantClientInterface getClient()
 */
class MerchantController extends AbstractController
{
    /**
     * @param int $idMerchant
     * @return JsonResponse
     */
    public function getMerchantByIdMerchantAction(int $idMerchant): JsonResponse
    {
        $merchant = $this->getClient()->getMerchantByIdMerchant($idMerchant);

        return $this->jsonResponse($merchant->toArray());
    }
}
