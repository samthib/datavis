<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use App\Models\Page;

use App\Models\User;
use App\Models\Chart;
use App\Models\Design;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
  use RefreshDatabase;


  public function test_routes_charts()
  {
    $chart = Chart::factory()->create();

    $this->route_url_equals_route_name('/', 'charts.index');
    $this->route_url_equals_route_name('/charts/'.$chart->slug, 'charts.show', [$chart]);
    $this->route_url_equals_route_name('/shadow/'.$chart->slug, 'charts.shadow', [$chart]);
  }

  public function test_routes_messages()
  {
    $this->route_url_equals_route_name('/messages', 'messages.create');
    $this->route_url_equals_route_name('/messages/store', 'messages.store');
  }

  public function test_routes_pages()
  {
    $page = Page::factory()->create();

    $this->route_url_equals_route_name('/A-propos', 'pages.abouts');
    $this->route_url_equals_route_name('/features', 'pages.features');
    $this->route_url_equals_route_name('/'.$page->slug, 'pages.show', [$page]);
  }

  public function test_routes_admin_dashboards()
  {
    $user = User::factory()->create();
    $response = $this->actingAs($user)
                     ->withSession(['banned' => false])
                     ->get('/admin');

    $response->assertRedirect(route('admin.dashboards.index'));

    $this->route_url_equals_route_name('/admin/dashboards', 'admin.dashboards.index');
  }

  public function test_routes_admin_designs()
  {
    $design = Design::factory()->create();

    $this->route_url_equals_route_name('/admin/designs/shadow/'.$design->id, 'admin.designs.shadow', [$design]);
  }

  public function test_routes_admin_messages()
  {
    $this->route_url_equals_route_name('/admin/messages/inbox', 'admin.messages.inbox.index');
    $this->route_url_equals_route_name('/admin/messages/sent', 'admin.messages.sent.index');
  }

  private function route_url_equals_route_name(String $url, String $name, Array $params = null)
  {
    $this->assertSame(url($url), route($name, $params));
  }
}
