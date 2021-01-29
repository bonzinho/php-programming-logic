<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserResourceApitest extends TestCase
{
    /**
     * Store
     *
     * @return void
     */
    public function testStore()
    {
        $payload = [
            'name' => 'Vitor Client',
            'email' => 'testEmail@client.pt',
            'gender' => 'm',
            'birthday' => '1985-02-21'
        ];

        $response = $this->postJson('/api/users', $payload);

        $response->assertStatus(201);
    }

    /**
     * Store Email Error
     *
     * @return void
     */
    public function testStoreEmailError()
    {
        $payload = [
            'name' => 'Vitor Client',
            'email' => 'testEmailclient.pt',
            'gender' => 'm',
            'birthday' => '1985-02-21'
        ];

        $response = $this->postJson('/api/users', $payload);

        $response->assertStatus(422);
    }

    /**
     *
     *
     * @return void
     */
    public function testShow()
    {



        $user = User::first();

        $response = $this->getJson('/api/users/' . $user->id);

        $response->assertStatus(200);
    }

    /**
     *
     *
     * @return void
     */
    public function testUpdate()
    {

        $user = User::first();

        $payload = [
            'name' => 'Vitor Update',
            'email' => 'updateTestEMail@client.pt',
            'gender' => 'm',
            'birthday' => '1985-02-21'
        ];

        $response = $this->putJson('/api/users/' . $user->id, $payload);


        $response->assertStatus(200);
    }


    /**
     * Store Email Error
     *
     * @return void
     */
    public function testIndex()
    {

        $response = $this->getJson('/api/users');
        $response->assertStatus(200);
    }




    /**
     *
     *
     * @return void
     */
    public function testDeleteUser()
    {

        $payload = [
            'name' => 'Vitor Client',
            'email' => 'testEmailclient@teste.pt',
            'gender' => 'm',
            'birthday' => '1985-02-21'
        ];

        $user = User::create($payload);

        $response = $this->deleteJson('/api/users/' . $user->id);

        $response->assertStatus(204);
    }
}
