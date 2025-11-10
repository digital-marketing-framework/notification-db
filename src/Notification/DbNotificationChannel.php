<?php

namespace DigitalMarketingFramework\Notification\Db\Notification;

use DateTime;
use DigitalMarketingFramework\Core\Notification\NotificationChannel;
use DigitalMarketingFramework\Notification\Db\Notification\Entity\NotificationInterface;
use DigitalMarketingFramework\Notification\Db\Notification\Repository\NotificationRepositoryInterface;

class DbNotificationChannel extends NotificationChannel
{
    protected function getConfigPackageKey(): string
    {
        return 'notification-db';
    }

    protected function getNotificationRepository(): NotificationRepositoryInterface
    {
        return $this->registry->getService(NotificationRepositoryInterface::class);
    }

    public function notify(
        string $environment,
        string $title,
        string $message,
        mixed $details,
        string $component,
        int $level,
    ): void {
        $body = $this->getBody($environment, $title, $message, $details, $component, $level);

        // Create notification object
        $repository = $this->getNotificationRepository();
        $notificationClass = get_class($repository->findById(0) ?? throw new \RuntimeException('Cannot determine notification class'));

        /** @var NotificationInterface $notification */
        $notification = new $notificationClass();
        $notification->setTitle($title);
        $notification->setMessage($body);
        $notification->setLevel($level);
        $notification->setComponent($component);
        $notification->setDetails($details !== null ? json_encode($details, JSON_THROW_ON_ERROR) : null);
        $notification->setTimestamp(new DateTime());
        $notification->setRead(false);

        // Save to database
        $repository->save($notification);
    }
}
