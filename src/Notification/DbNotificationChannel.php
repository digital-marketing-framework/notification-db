<?php

namespace DigitalMarketingFramework\Notification\Db\Notification;

use DigitalMarketingFramework\Core\Notification\NotificationChannel;

class DbNotificationChannel extends NotificationChannel
{
    protected function getConfigPackageKey(): string
    {
        return 'notification-db';
    }

    public function notify(
        string $environment,
        string $title,
        string $message,
        mixed $details,
        string $component,
        int $level,
    ): void {
        $this->getBody($environment, $title, $message, $details, $component, $level);
        // TODO
    }
}
