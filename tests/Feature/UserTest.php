<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function a_user_can_be_add_to_database()
    {


        $response = $this->post('/users',[
            'name' =>'MA',
            'email' => 'm@app.com',
            'password'=> '12345678'
        ]);

        $response->assertOk();
        $this->assertCount(1,User::all());


    }

    /** @test */
    public function a_name_is_required()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/users',[
            'name' =>'',
            'email' => 'm@app.com',
            'password'=> '12345678'
        ]);

        $response->assertSessionHasErrors();


    }

    /** @test */
    public function a_email_is_required()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/users',[
            'name' =>'MA',
            'email' => '',
            'password'=> '12345678'
        ]);

        $response->assertSessionHasErrors();


    }

    /** @test */
    public function a_email_is_email()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/users',[
            'name' =>'MA',
            'email' => 'mo',
            'password'=> '12345678'
        ]);

        $response->assertSessionHasErrors();


    }

    /** @test */
    public function a_user_is_update_to_database()
    {


        $this->post('/users',[
            'name' =>'MA',
            'email' => 'm@app.com',
            'password'=> '12345678'
        ]);

        $user = User::first();

        $response = $this->patch('/users/' . $user->id ,[
            'name' =>'M3A',
            'email' => 'mo@me.com',
            'password'=> '12345678'
        ]);

        $this->assertEquals('M3A' , User::first()->name);
        $this->assertEquals('mo@me.com' , User::first()->email);


    }


    /** @test */
    public function a_user_is_deleted_from_database()
    {


        $this->post('/users',[
            'name' =>'MA',
            'email' => 'm@app.com',
            'password'=> '12345678'
        ]);

        $user = User::first();

        $response = $this->delete('/users/' . $user->id );

        $this->assertCount(0,User::all());
        $response->assertRedirect('/');


    }
}
