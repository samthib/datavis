<?php

namespace Tests\Feature\Http\Middleware;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Visit;

class VisitMiddlewareTest extends TestCase
{
    public function test_increment_visit_counter()
    {
        $visitLast = Visit::latest()->first();

        $response = $this->get('/');

        $visitNew = Visit::latest()->first();

        $this->assertEquals($visitLast->count + 1, $visitNew->count);
    }
}
