<?php

namespace DigitalMarketingFramework\Notification\Db;

use DigitalMarketingFramework\Core\Initialization;
use DigitalMarketingFramework\Core\Notification\NotificationChannelInterface;
use DigitalMarketingFramework\Core\Registry\RegistryDomain;
use DigitalMarketingFramework\Notification\Db\Notification\DbNotificationChannel;

class NotificationDbInitialization extends Initialization
{
    protected const PLUGINS = [
        RegistryDomain::CORE => [
            NotificationChannelInterface::class => [
                DbNotificationChannel::class,
            ],
        ],
    ];

    protected const SCHEMA_MIGRATIONS = [];

    public function __construct(
        string $packageAlias = '',
    ) {
        parent::__construct('notification-db', '1.0.0', $packageAlias);
    }
}
