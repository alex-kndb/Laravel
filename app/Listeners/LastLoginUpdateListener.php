<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Models\User;
use Carbon\CarbonImmutable;

class LastLoginUpdateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(object $event): void
    {
        $user = $event->user;
        if (isset($user) && ($user instanceof User)) {
            $user->last_login_at = CarbonImmutable::now();
            $user->save();
        }
    }
}
