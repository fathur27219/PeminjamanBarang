<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfilePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_profile_page(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'user',
        ]);

        $response = $this->actingAs($user)->get(route('user.profil'));

        $response->assertOk();
        $response->assertViewIs('User.profil');
        $response->assertSee('Profil Saya');
        $response->assertSee($user->name);
    }
}
