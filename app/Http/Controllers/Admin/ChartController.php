<?php

namespace App\Http\Controllers\Admin;

use App\Models\Data;
use App\Models\Chart;
use App\Models\Library;
use Illuminate\Support\Arr;
// use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChartRequests;


class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $charts = Chart::orderBy('id', 'desc')->simplePaginate(20);

      return view('admin.charts.index', compact('charts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $libraries = Library::all();
      $datas = Data::all();

      return view('admin.charts.create', compact('libraries', 'datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ChartRequests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChartRequests $request)
    {
      $validated = $request->validated();

      $validated = Arr::except($validated, ['libraries', 'datas']);
      $validated['available'] = $request->has('available');
      
      $chart = Chart::create($validated);
      
      $chart->libraries()->sync($request->libraries);
      $chart->datas()->sync($request->datas);

      return redirect()->route('admin.charts.index')->with('message', 'Chart recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
      return view('admin.charts.show', compact('chart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
      $libraries = Library::all();
      $datas = Data::all();

      return view('admin.charts.edit', compact('chart', 'libraries', 'datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ChartRequests  $request
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(ChartRequests $request, Chart $chart)
    {
      $validated = $request->validated();

      $validated = Arr::except($validated, ['libraries', 'datas']);
      $validated['available'] = $request->has('available');

      $chart->update($validated);
      
      $chart->libraries()->sync($request->libraries);
      $chart->datas()->sync($request->datas);
      
      return back()->with('message', 'Chart updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
      $chart->delete();

      return back()->with('message', 'Chart deleted');
    }
}
