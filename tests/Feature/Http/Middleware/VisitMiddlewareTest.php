<?php

namespace Tests\Feature\Http\Middleware;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Visit;
class VisitMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_increment_visit_counter()
    {
        $visitLast = Visit::create([
            'count' => 0,
            'date' => now()
        ]);

        $this->get('/');

        $visitNew = Visit::latest()->first();

        $this->assertEquals($visitLast->count + 1, $visitNew->count);
    }
}
