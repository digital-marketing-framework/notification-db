<?php

namespace DigitalMarketingFramework\Notification\Db;

use DigitalMarketingFramework\Core\Backend\Controller\SectionController\SectionControllerInterface;
use DigitalMarketingFramework\Core\Backend\Section\Section;
use DigitalMarketingFramework\Core\Initialization;
use DigitalMarketingFramework\Core\Notification\NotificationChannelInterface;
use DigitalMarketingFramework\Core\Registry\RegistryDomain;
use DigitalMarketingFramework\Notification\Db\Backend\Controller\SectionController\NotificationSectionController;
use DigitalMarketingFramework\Notification\Db\Notification\DbNotificationChannel;

class NotificationDbInitialization extends Initialization
{
    protected const PLUGINS = [
        RegistryDomain::CORE => [
            NotificationChannelInterface::class => [
                DbNotificationChannel::class,
            ],
            SectionControllerInterface::class => [
                NotificationSectionController::class,
            ],
        ],
    ];

    protected const SCHEMA_MIGRATIONS = [];

    public function __construct(
        string $packageAlias = '',
    ) {
        parent::__construct('notification-db', '1.0.0', $packageAlias);
    }

    protected function getBackendSections(): array
    {
        return [
            new Section(
                'Notifications',
                'NOTIFICATION',
                'page.notification.list',
                'View and manage system notifications',
                'PKG:digital-marketing-framework/notification-db/res/assets/icons/notifications.svg',
                'View',
                60
            ),
        ];
    }
}
