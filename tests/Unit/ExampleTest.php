<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_i_can_create_user()
    {
        User::factory()->create(['email' => 'test@test.com']);
        $this->assertEquals(1, User::count());
    }

    public function test_that_i_can_create_another_user()
    {
        User::factory()->create(['email' => 'test@test.com']);
        $this->assertEquals(1, User::count());
    }
}
