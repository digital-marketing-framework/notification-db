<?php

namespace DigitalMarketingFramework\Notification\Db\Backend\Controller\SectionController;

use DigitalMarketingFramework\Core\Backend\Controller\SectionController\SectionController;
use DigitalMarketingFramework\Core\Backend\Request;
use DigitalMarketingFramework\Core\Backend\Response\Response;
use DigitalMarketingFramework\Core\Registry\RegistryInterface;
use DigitalMarketingFramework\Notification\Db\Notification\Repository\NotificationRepositoryInterface;

class NotificationSectionController extends SectionController
{
    protected NotificationRepositoryInterface $notificationRepository;

    public function __construct(
        string $keyword,
        RegistryInterface $registry,
    ) {
        parent::__construct($keyword, $registry, ['list']);
        // TODO: Get repository from registry when concrete implementation exists
        // $this->notificationRepository = $registry->getNotificationRepository();
    }

    public function matchRequest(Request $request): bool
    {
        return $request->getType() === 'page'
            && $request->getSection() === 'notification'
            && in_array($request->getAction(), $this->allowedActions, true);
    }

    protected function listAction(): Response
    {
        // Get repository if available
        try {
            $this->notificationRepository = $this->registry->getService(NotificationRepositoryInterface::class);
            $notifications = $this->notificationRepository->findAll();
        } catch (\Exception $e) {
            // Repository not available yet (e.g., during development)
            $notifications = [];
        }

        $this->viewData['notifications'] = $notifications;
        $this->viewData['totalCount'] = count($notifications);

        return $this->render();
    }
}
