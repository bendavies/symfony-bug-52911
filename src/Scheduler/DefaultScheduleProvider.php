<?php

namespace App\Scheduler;

use App\Message\HelloWorld;
use Symfony\Component\Lock\LockFactory;
use Symfony\Component\Scheduler\Attribute\AsSchedule;
use Symfony\Component\Scheduler\RecurringMessage;
use Symfony\Component\Scheduler\Schedule;
use Symfony\Component\Scheduler\ScheduleProviderInterface;
use Symfony\Contracts\Cache\CacheInterface;

// ...

#[AsSchedule('default')]
class DefaultScheduleProvider implements ScheduleProviderInterface
{
    public function __construct(
        private readonly CacheInterface $cacheScheduler,
        private readonly LockFactory $lockFactory,
    ) {
    }

    public function getSchedule(): Schedule
    {
        return (new Schedule())
            ->add(RecurringMessage::every('5 seconds',  new HelloWorld()))
            ->lock($this->lockFactory->createLock('default-schedule'))
            ->stateful($this->cacheScheduler)
        ;
    }
}