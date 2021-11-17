<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use App\Models\Chart;
use App\Models\User;

class ChartControllerTest extends TestCase
{
  public function test_shadow()
  {
    $chart = Chart::first();

    $response = $this->get(route('charts.shadow', $chart));

    $response->assertSuccessful();
    $response->assertViewIs('charts.shadow');
  }


  public function test_index()
  {
    $response = $this->get(route('charts.index'));

    $response->assertSuccessful();
    $response->assertViewIs('charts.index');
    $response->assertViewHas('charts');
  }
}
