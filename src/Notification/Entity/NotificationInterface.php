<?php

namespace DigitalMarketingFramework\Notification\Db\Notification\Entity;

use DateTimeInterface;

interface NotificationInterface
{
    public function getTitle(): string;

    public function setTitle(string $title): self;

    public function getMessage(): string;

    public function setMessage(string $message): self;

    public function getLevel(): int;

    public function setLevel(int $level): self;

    public function getComponent(): string;

    public function setComponent(string $component): self;

    public function getDetails(): ?string;

    public function setDetails(?string $details): self;

    public function getTimestamp(): DateTimeInterface;

    public function setTimestamp(DateTimeInterface $timestamp): self;

    public function isRead(): bool;

    public function setRead(bool $read): self;
}
