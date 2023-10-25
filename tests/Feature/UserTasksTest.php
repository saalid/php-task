<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use App\Models\UserDepartment;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\PopulateDatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Arr;
use Tests\TestCase;

class UserTasksTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        config()->set('app.cache.ttl', 0);

        $this->seed(PopulateDatabaseSeeder::class);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_status_is_ok()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
    }

    public function test_users_will_return()
    {
        $response = $this->get('/api/users');

        $users = User::all();

        $json = $response->getContent();
        $array = json_decode($json, true);

        foreach($users as $user) {
            $this->assertNotNull(Arr::first($array['data'], function($item) use($user) {
                return $item['name'] === $user->name;
            }));
        }

        $response->assertStatus(200);
    }

}
