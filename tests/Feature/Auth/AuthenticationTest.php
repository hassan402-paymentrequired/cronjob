<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;


    public function test_user_registration()
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
            'email' => $user->email
        ]);
    }

    public function test_user_can_login_with_the_right_phone_number()
    {
        User::factory()->create();
        $user = [
            'phone_number' => '07049137994',
            'password' => 'password'
        ];
        $res = $this->postJson('/api/v1/auth/login', $user);

        $res->assertStatus(200);
    }

    public function test_user_cannot_login_with_wrong_phone_number()
    {
        User::factory()->create();
        $user = [
            'phone_number' => '07049137995',
            'password' => 'password'
        ];

        $res = $this->postJson('/api/v1/auth/login', $user);

        $res->assertStatus(400);
    }

    public function test_vendor_can_login_with_email_and_password()
    {
        User::factory()->create();

        $user = [
            'email' => 'test@gmail.com',
            'password' => 'password'
        ];

        $res = $this->postJson('/api/v1/auth/login-provider', $user);

        $res->assertStatus(200);
    }

    public function test_vendor_cannot_login_with_wrong_email_or_password()
    {
        User::factory()->create();

        $user = [
            'email' => 'test@gmail.com',
            'password' => 'passwor'
        ];

        $res = $this->postJson('/api/v1/auth/login-provider', $user);

        $res->assertStatus(400);
    }

    public function test_user_can_request_new_otp()
    {
        $user = User::factory()->create();
        $res = $this->actingAs($user)->postJson('/api/v1/auth/resend-code');

        $res->assertStatus(200);
    }


    public function test_user_can_verify_account_with_the_right_code()
    {
        $code = strval(mt_rand(1000, 9999));
        $user = User::factory()->create([
            'verification_code' => $code
        ]);

        $res = $this->actingAs($user)->postJson('/api/v1/auth/verify-account', ['code' => $code]);

        $res->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'verification_code' => null,
        ]);
    }


    public function test_user_cannot_verify_account_with_the_wrong_code()
    {
        $code = strval(mt_rand(1000, 9999));
        $user = User::factory()->create([
            'verification_code' => $code
        ]);

        $res = $this->actingAs($user)->postJson('/api/v1/auth/verify-account', ['code' => '2304']);

        $res->assertStatus(404);
    }
}
