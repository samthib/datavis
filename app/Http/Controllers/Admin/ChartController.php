<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\Library;
use App\Models\Data;
use Illuminate\Http\Request;

use App\Http\Requests\ChartRules;


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
     * @param  \Illuminate\Http\ChartRules  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChartRules $request)
    {
      $validated = $request->validated();

      $chart = Chart::create([
        "title" => $request->title,
        "subtitle" => $request->subtitle,
        "description" => $request->description,
        "js" => $request->js,
        "css" => $request->css,
        "available" => isset($request->available) ? 1 : 0,
      ]);

      $chart->libraries()->sync($request->libraries);
      $chart->datas()->sync($request->datas);

      return redirect()->route('admin.charts.index');
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
     * @param  \Illuminate\Http\ChartRules  $request
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(ChartRules $request, Chart $chart)
    {
      $validated = $request->validated();

      $chart->update([
        "title" => $request->title,
        "subtitle" => $request->subtitle,
        "description" => $request->description,
        "js" => $request->js,
        "css" => $request->css,
        "available" => isset($request->available) ? 1 : 0,
      ]);

      $chart->libraries()->sync($request->libraries);
      $chart->datas()->sync($request->datas);

      return back();
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

      return back();
    }
}