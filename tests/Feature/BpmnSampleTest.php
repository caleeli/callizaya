<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use JDD\Workflow\Facades\Workflow;
use JDD\Workflow\Models\Process;
use Tests\TestCase;

/**
 * Workflow
 */
class BpmnSampleTest extends TestCase
{
    use DatabaseMigrations;
    use AnimateWorkflowTrait;

    /**
     * Execute the sample process.
     *
     * @diagram svg 8em
     * @return void
     */
    public function testSampleBpmn()
    {
        // Start a process instance from default start event
        Workflow::callProcess('sample.bpmn');

        // Get process instance model
        $instance = Process::first();
        // Get current tokens
        $tokens = $instance->tokens;
        // Get first token
        $token = $tokens[0];
        $tokenId = $token['id'];

        // Assertion: One process instance should be started
        $this->assertEquals(1, Process::count());

        // Assertion: It has one ACTIVE token
        $this->assertEquals(1, count($tokens));
        $this->assertEquals('ACTIVE', $token['status']);

        // Complete the active task
        Workflow::completeTask($instance->id, $tokenId, [
            'user' => [
                'name' => 'name',
                'email' => 'name@example.com',
                'password' => '123456',
            ],
        ]);

        // Refresh the instance from the database
        $instance->refresh();

        // Assertion: Verify the Script Task failed and the Console Task is active
        $this->assertArraySubset(['status' => 'ACTIVE'], $instance->tokens[0]);

        // Complete the active task
        Workflow::completeTask($instance->id, $instance->tokens[0]['id']);

        // Refresh the instance from the database
        $instance->refresh();

        // Assertion: All tokens were closed
        $this->assertEquals(0, count($instance->tokens));
    }

    /**
     * Execute the sample process expecting a script failure.
     *
     * @diagram svg 8em
     * @return void
     */
    public function testSampleWithFailureBpmn()
    {
        // Start a process instance from default start event
        Workflow::callProcess('sample.bpmn');

        // Get process instance model
        $instance = Process::first();
        // Get current tokens
        $tokens = $instance->tokens;
        // Get first token
        $token = $tokens[0];
        $tokenId = $token['id'];

        // Assertion: One process instance should be started
        $this->assertEquals(1, Process::count());

        // Assertion: It has one ACTIVE token
        $this->assertEquals(1, count($tokens));
        $this->assertEquals('ACTIVE', $token['status']);

        // Complete the active task
        Workflow::completeTask($instance->id, $tokenId);

        // Refresh the instance from the database
        $instance->refresh();

        // Assertion: Verify the Script Task failed and the Console Task is active
        $this->assertArraySubset(['status' => 'FAILING'], $instance->tokens[0]);
        $this->assertArraySubset(['status' => 'ACTIVE'], $instance->tokens[1]);
    }
}
