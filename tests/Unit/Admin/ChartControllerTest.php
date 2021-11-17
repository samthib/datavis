<?php

namespace Tests\Unit\Admin;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use App\Models\Chart;
use App\Models\User;

class ChartControllerTest extends TestCase
{
  public function test_admin_create()
  {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
                     ->withSession(['banned' => false])
                     ->get(route('admin.charts.create'));

    $response->assertSuccessful();
    $response->assertViewIs('admin.charts.create');
    $response->assertViewHasAll(['libraries', 'datas']);
  }
}
