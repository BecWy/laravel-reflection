<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }


    // public function testRoutes()
    // {
    //     $appURL = env('APP_URL');

    //     $urls = [
    //         '/',
    //         '/login',
    //         '/dashboard',
    //         '/companies',
    //         'companies/create',
    //         '/companies/9/edit',
    //         '/companies/11/delete',
    //         '/employees',
    //         '/employees/create',
    //         '/employees/2/edit',
    //         '/employees/7/delete'
    //     ];

    //     echo  PHP_EOL;

    //     foreach ($urls as $url) {
    //         $response = $this->get($url);
    //         if((int)$response->status() !== 200){
    //             echo  $appURL . $url . ' (FAILED) did not return a 200.';
    //             $this->assertTrue(false);
    //         } else {
    //             echo $appURL . $url . ' (success ?)';
    //             $this->assertTrue(true);
    //         }
    //         echo  PHP_EOL;
    //     }

    // }

    
}
