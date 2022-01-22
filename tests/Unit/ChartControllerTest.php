<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use App\Models\Chart;

class ChartControllerTest extends TestCase
{
  public function setUp(): void
  {
    parent::setUp();
  }

  public function test_shadow()
  {
    $chart = Chart::factory()->create();

    $response = $this->get(route('charts.shadow', $chart));

    $response->assertSuccessful();
    $response->assertViewIs('charts.shadow');
    $response->assertViewHas('chart');
  }

  public function test_index()
  {
    Chart::factory()->count(3)->create();

    $response = $this->get(route('charts.index'));

    $response->assertSuccessful();
    $response->assertViewIs('charts.index');
    $response->assertViewHas('charts');
  }

  public function test_show()
  {
    $chart = Chart::factory()->create();

    $response = $this->get(route('charts.show', $chart));

    $response->assertSuccessful();
    $response->assertViewIs('charts.show');
    $response->assertViewHas('chart');
  }
}
