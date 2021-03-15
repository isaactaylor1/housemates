<?php

namespace Tests\Feature\Staff;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker as WithFaker;

class AuthTest extends TestCase
{
   CONST USERNAME = 'testuser';
   CONST PASSWORD = 123456;

   use WithFaker;

   public function testTrue () {
      $this->assertTrue(true);
   }

   public function _testRegister () {
      $response = $this->json('POST','http://staff.azor.laravel/auth/register', ['user' => [
         'name' => $this->faker->name(),
         'username' => $this->faker->domainWord(),
         'email' => $this->faker->email(),
         'password_1' => $this->faker->creditCardNumber(),
         'terms' => true,
      ]]);
      fwrite(STDOUT, implode((array) $response));
      $response->assertStatus(201);
   }

   public function _testLogin () {
      $response = $this->json('POST','http://staff.azor.laravel/auth/login', ['user' => [
         'username' => Self::USERNAME,
         'password' => Self::PASSWORD,
      ]]);
      fwrite(STDOUT, implode((array) $response));
      $response->assertStatus(200);
   }

   public function _testReset () {
      $response = $this->json('POST','http://staff.azor.laravel/auth/reset/create', ['user' => Self::USERNAME]);
      fwrite(STDOUT, implode((array) $response));
      $response->assertStatus(201);
   }
}
