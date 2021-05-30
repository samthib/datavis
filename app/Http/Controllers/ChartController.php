<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Visit;
use App\Models\Design;
use App\Models\Page;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display the specified in an hidden url to be further injected in an <iframe>.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function shadow(Chart $chart)
    {
      return view('charts.shadow', compact('chart'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ip = request()->ip();

      /* Visits counter */
      $visits = Visit::firstOrCreate(
        ['date' => date(now()->toDateString())],
        ['count' => 0]
      );

      $visits->increment('count');

      $charts = Chart::where('available', 1)->orderBy('id', 'desc')->simplePaginate(6);

      return view('charts.index', compact('charts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
      return view('charts.show', compact('chart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}
