<?php

declare(strict_types=1);

namespace Spiral\RoadRunnerLaravel;

final class Defaults
{
    /**
     * Returns an array of built-in listeners for the BeforeLoopStartedEvent.
     *
     * @return array<class-string>
     *
     * @see Events\BeforeLoopStartedEvent
     */
    public static function beforeLoopStarted(): array
    {
        return [
            Listeners\FixSymfonyFileValidationListener::class,
            Listeners\WarmInstancesListener::class,
        ];
    }

    /**
     * Returns an array of built-in listeners for the BeforeLoopIterationEvent.
     *
     * @return array<class-string>
     *
     * @see Events\BeforeLoopIterationEvent
     */
    public static function beforeLoopIteration(): array
    {
        return [
            Listeners\CloneConfigListener::class,
            Listeners\EnableHttpMethodParameterOverrideListener::class,
            Listeners\RebindHttpKernelListener::class, // Laravel 7 issue: <https://git.io/JvPpf>
            Listeners\RebindViewListener::class,
            Listeners\RebindAuthorizationGateListener::class,
            Listeners\RebindBroadcastManagerListener::class,
            Listeners\RebindDatabaseManagerListener::class,
            Listeners\RebindMailManagerListener::class,
            Listeners\RebindNotificationChannelManagerListener::class,
            Listeners\RebindPipelineHubListener::class,
            Listeners\RebindQueueManagerListener::class,
            Listeners\RebindValidationFactoryListener::class,
            Listeners\UnqueueCookiesListener::class,
            Listeners\FlushAuthenticationStateListener::class,
            Listeners\ResetSessionListener::class,
            Listeners\ResetProvidersListener::class,
            Listeners\ResetLocaleStateListener::class,
        ];
    }

    /**
     * Returns an array of built-in listeners for the BeforeRequestHandlingEvent.
     *
     * @return array<class-string>
     *
     * @see Events\BeforeRequestHandlingEvent
     */
    public static function beforeRequestHandling(): array
    {
        return [
            Listeners\RebindRouterListener::class,
            Listeners\InjectStatsIntoRequestListener::class,
            Listeners\BindRequestListener::class,
            Listeners\ForceHttpsListener::class,
            Listeners\SetServerPortListener::class,
        ];
    }

    /**
     * Returns an array of built-in listeners for the AfterRequestHandlingEvent.
     *
     * @return array<class-string>
     *
     * @see Events\AfterRequestHandlingEvent
     */
    public static function afterRequestHandling(): array
    {
        return [];
    }

    /**
     * Returns an array of built-in listeners for the AfterLoopIterationEvent.
     *
     * @return array<class-string>
     *
     * @see Events\AfterLoopIterationEvent
     */
    public static function afterLoopIteration(): array
    {
        return [
            Listeners\FlushDumperStackListener::class,
            Listeners\FlushArrayCacheListener::class,
            Listeners\ResetDatabaseRecordModificationStateListener::class,
            Listeners\ClearInstancesListener::class,
        ];
    }

    /**
     * Returns an array of built-in listeners for the AfterLoopStoppedEvent.
     *
     * @return array<class-string>
     *
     * @see Events\AfterLoopStoppedEvent
     */
    public static function afterLoopStopped(): array
    {
        return [];
    }

    /**
     * Returns an array of built-in listeners for the LoopErrorOccurredEvent.
     *
     * @return array<class-string>
     *
     * @see Events\LoopErrorOccurredEvent
     */
    public static function loopErrorOccurred(): array
    {
        return [];
    }

    /**
     * Get the container bindings / services that should be pre-resolved before the worker loop starting by default.
     *
     * @return array<string>
     *
     * @see Listeners\WarmInstancesListener
     */
    public static function servicesToWarm(): array
    {
        return [
            'auth',
            'cache',
            'cache.store',
            'config',
            'cookie',
            'db',
            'db.factory',
            'encrypter',
            'files',
            'hash',
            'log',
            'router',
            'routes',
            'session',
            'session.store',
            'translator',
            'url',
            'view',
        ];
    }

    /**
     * Get the container bindings / services that should be cleared (flushed) on every worker iteration.
     *
     * @return array<string>
     *
     * @see Listeners\ClearInstancesListener
     */
    public static function servicesToClear(): array
    {
        return [];
    }

    /**
     * Get the service-providers list to reset on every worker loop iteration.
     *
     * @return array<class-string>
     *
     * @see Listeners\ResetProvidersListener
     */
    public static function providersToReset(): array
    {
        return [];
    }
}