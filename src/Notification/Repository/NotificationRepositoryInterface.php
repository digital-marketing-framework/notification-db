<?php

namespace DigitalMarketingFramework\Notification\Db\Notification\Repository;

interface NotificationRepositoryInterface
{
    /**
     * @param object $object
     * @phpstan-param T $object
     */
    public function save($notification): void;

    /**
     * @param object $object
     * @phpstan-param T $object
     */
    public function delete($notification): void;

    public function findById(int $id): ?object;

    /**
     * @return object[]
     */
    public function findAll(): array;
}
