<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Application pages
 */
class PagesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Go to root page
        $response = $this->get('/');

        // Assertion: Expects a 200 response
        $response->assertStatus(200);
    }
}
