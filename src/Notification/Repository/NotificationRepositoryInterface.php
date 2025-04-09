<?php

namespace DigitalMarketingFramework\Notification\Db\Notification\Repository;

use DigitalMarketingFramework\Notification\Db\Notification\Entity\NotificationInterface;

interface NotificationRepositoryInterface
{
    public function save(NotificationInterface $notification): void;

    public function delete(NotificationInterface $notification): void;

    public function findById(int $id): ?NotificationInterface;

    /**
     * @return NotificationInterface[]
     */
    public function findAll(): array;
}
