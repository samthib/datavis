<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageControllerTest extends TestCase
{
  use RefreshDatabase;

  public function test_create()
  {
    $response = $this->get(route('messages.create'));

    $response->assertSuccessful();
    $response->assertViewIs('messages.create');
  }

  public function test_store()
  {
    $this->withoutMiddleware();

    Mail::fake();

    $response = $this->post(route('messages.store'), [
      'name' => 'Sally',
      'email' => 'email@email.com',
      'subject' => 'My subject',
      'message' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.",
    ]);

    // Assert that a mailable was sent...
    Mail::assertSent(ContactEmail::class);

    $response->assertStatus(302);
    $response->assertRedirect(route('messages.create'));
    $response->assertSessionHas('message', 'Message envoyé');
  }
}
