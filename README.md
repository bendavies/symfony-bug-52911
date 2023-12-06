# Symfony Scheduler Cache TTL Bug.

There is a bug in the Symfony Scheduler component where the cache TTL erroneously set to a value less than
a Scheduler's Message Frequency. 

This causes the Scheduler to not run at all.

## Steps to reproduce

1. Clone this repository
2. Run `composer install`
3. Run `bin/console messenger:consume scheduler_default -vvv`
4. Observe that "[notice] Hello World!" is not printed every 5 seconds.