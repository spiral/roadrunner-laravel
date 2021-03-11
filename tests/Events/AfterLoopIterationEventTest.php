<?php

declare(strict_types=1);

namespace Spiral\RoadRunnerLaravel\Tests\Events;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spiral\RoadRunnerLaravel\Events\Contracts;
use Spiral\RoadRunnerLaravel\Tests\AbstractTestCase;
use Spiral\RoadRunnerLaravel\Events\AfterLoopIterationEvent;

/**
 * @covers \Spiral\RoadRunnerLaravel\Events\AfterLoopIterationEvent<extended>
 */
class AfterLoopIterationEventTest extends AbstractTestCase
{
    /**
     * @return void
     */
    public function testInterfacesImplementation(): void
    {
        foreach ($required_interfaces = [
            Contracts\WithApplication::class,
            Contracts\WithHttpRequest::class,
            Contracts\WithHttpResponse::class,
        ] as $interface) {
            $this->assertContains(
                $interface,
                \class_implements(AfterLoopIterationEvent::class),
                "Event does not implements [{$interface}]"
            );
        }
    }

    /**
     * @return void
     */
    public function testConstructor(): void
    {
        $event = new AfterLoopIterationEvent(
            $this->app,
            $request = Request::create('/'),
            $response = new Response()
        );

        $this->assertSame($this->app, $event->application());
        $this->assertSame($request, $event->httpRequest());
        $this->assertSame($response, $event->httpResponse());
    }
}
