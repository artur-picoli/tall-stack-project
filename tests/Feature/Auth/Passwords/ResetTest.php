<?php

namespace Tests\Feature\Auth\Passwords;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Rules\PasswordRule;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_password_reset_page()
    {
        $user = User::factory()->create();

        $token = Str::random(16);

        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        $this->get(route('password.reset', [
            'email' => $user->email,
            'token' => $token,
        ]))
            ->assertSuccessful()
            ->assertSee($user->email)
            ->assertSeeLivewire('auth.passwords.reset');
    }

    /** @test */
    public function can_reset_password()
    {
        $user = User::factory()->create();

        $token = Str::random(16);

        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        Livewire::test('auth.passwords.reset', [
            'token' => $token,
        ])
            ->set('email', $user->email)
            ->set('password', 'Senha@@123')
            ->set('passwordConfirmation', 'Senha@@123')
            ->call('resetPassword');

        $this->assertTrue(Auth::attempt([
            'email' => $user->email,
            'password' => 'Senha@@123',
        ]));
    }

    /** @test */
    public function token_is_required()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => null,
        ])
            ->call('resetPassword')
            ->assertHasErrors(['token' => 'required']);
    }

    /** @test */
    public function email_is_required()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => Str::random(16),
        ])
            ->set('email', null)
            ->call('resetPassword')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    public function email_is_valid_email()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => Str::random(16),
        ])
            ->set('email', 'email')
            ->call('resetPassword')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    function password_is_required()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => Str::random(16),
        ])
            ->set('password', '')
            ->call('resetPassword')
            ->assertHasErrors(['password' => 'required']);
    }

    /** @test */
    function password_is_minimum_of_eight_characters()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => Str::random(16),
        ])
            ->set('password', 'secret')
            ->call('resetPassword')
            ->assertHasErrors(['password' => PasswordRule::class]);
    }

    /** @test */
    function password_matches_password_confirmation()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => Str::random(16),
        ])
            ->set('password', 'new-password')
            ->set('passwordConfirmation', 'not-new-password')
            ->call('resetPassword')
            ->assertHasErrors(['password' => 'same']);
    }
}
