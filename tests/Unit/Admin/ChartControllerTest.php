<?php

namespace Tests\Unit\Admin;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use App\Models\User;
use App\Models\Chart;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ChartControllerTest extends TestCase
{
  public $responseInit;

  public function setUp(): void
  {
    parent::setUp();

    $user = User::factory()->create();
    $this->responseInit = $this->actingAs($user)
      ->withSession(['banned' => false]);
  }

  public function test_admin_index()
  {
    $response = $this->responseInit
    ->get(route('admin.charts.index'));

    $response->assertSuccessful();
    $response->assertViewIs('admin.charts.index');
    $response->assertViewHas('charts');
  }

  public function test_admin_create()
  {
    $response = $this->responseInit
      ->get(route('admin.charts.create'));

    $response->assertSuccessful();
    $response->assertViewIs('admin.charts.create');
    $response->assertViewHasAll(['libraries', 'datas']);
  }

  public function test_admin_store()
  {
    $datas = [
      'title' => 'azerty',
      'subtitle' => 'azerty',
      'description' => 'azerty',
      'js' => 'azerty',
      'css' => 'azerty',
      'libraries' => [5, 6, 7],
      'datas' => [2, 3, 4],
      'available' => 1,
    ];

    $response = $this->responseInit
      ->post(route('admin.charts.store'), $datas);

    $response->assertStatus(302);
    $response->assertRedirect(route('admin.charts.index'));
    $response->assertSessionHas('message', 'Chart recorded');
  }

  public function test_admin_show()
  {
    $chart = Chart::first();

    $response = $this->responseInit
      ->get(route('admin.charts.show', $chart));

    $response->assertSuccessful();
    $response->assertViewIs('admin.charts.show');
    $response->assertViewHas('chart');
  }

  public function test_admin_edit()
  {
    $chart = Chart::first();

    $response = $this->responseInit
      ->get(route('admin.charts.edit', $chart));

    $response->assertSuccessful();
    $response->assertViewIs('admin.charts.edit');
    $response->assertViewHasAll(['chart', 'libraries', 'datas']);
  }

  public function test_admin_update()
  {
    $chart = Chart::latest()->first();

    $datas = [
      'title' => 'azerty_update',
      'subtitle' => 'azerty_update',
      'description' => 'azerty_update',
      'js' => 'azerty_update',
      'css' => 'azerty_update',
      'libraries' => [3, 5, 6],
      'datas' => [5, 6, 7],
      'files' => [1],
      'medias' => [1],
      'available' => 1,
    ];

    $response = $this->responseInit
      ->from(route('admin.charts.edit', $chart))
      ->put(route('admin.charts.update', $chart), $datas);

    $response->assertStatus(302);
    $response->assertRedirect(route('admin.charts.edit', $chart));
    $response->assertSessionHas('message', 'Chart updated');
  }

  public function test_admin_destroy()
  {
    $chart = Chart::latest()->first();

    $response = $this->responseInit
      ->from(route('admin.charts.index'))
      ->delete(route('admin.charts.update', $chart));
      
    $response->assertStatus(302);
    $response->assertRedirect(route('admin.charts.index'));
    $response->assertSessionHas('message', 'Chart deleted');
  }
}
