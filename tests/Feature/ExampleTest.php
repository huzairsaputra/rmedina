<?php

//namespace Tests\Feature;
//
//use Database\Seeders\DatabaseSeeder;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Tests\TestCase;
//
//class ExampleTest extends TestCase
//{
//    use RefreshDatabase;
//
//    protected function setUp(): void
//    {
//        parent::setUp();
//
//        //$this->seed(DatabaseSeeder::class);
//    }
//
//    /**
//     * A basic test example.
//     *
//     * @return void
//     */
//    public function testBasicTest()
//    {
//        $response = $this->get('/login');
//
//        $response->assertStatus(200);
//    }
//}

it('test basic test')->get('login')->assertStatus(200);
