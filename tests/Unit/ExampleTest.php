<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_i_can_create_user()
    {
        User::factory()->create([
            'email' => 'test@test.com'
        ]);

        $this->assertEquals(1, User::count());
    }
}
