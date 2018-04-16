<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Http\Controllers\Web\Hooks;

use Orion\Travelr\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Cashier\Http\Controllers\WebhookController;
use Teapot\StatusCode;

class StripeWebhookController extends WebhookController
{
    // TODO: Identify relevant listeners
    public function handleChargeRefunded(array $payload): Response
    {
        /** @var User $user */
        $user = $this->getUserByStripeId($payload['data']['object']['customer']);

        return new Response('OK', StatusCode::OK);
    }
}
