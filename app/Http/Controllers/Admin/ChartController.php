<?php

namespace App\Http\Controllers\Admin;

use App\Models\Data;
use App\Models\File;
use App\Models\Chart;
use App\Models\Media;
use App\Models\Library;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
      $libraries = Library::orderBy('name', 'asc')->get();
      $datas = Data::orderBy('name', 'asc')->get();
      $medias = Media::orderBy('name', 'asc')->get();
      $files = File::orderBy('name', 'asc')->get();

      return view('admin.charts.create', compact('libraries', 'datas', 'medias', 'files'));
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
      $validated = Arr::except($validated, ['libraries', 'datas', 'files', 'medias']);
      $validated['title'] = Str::slug($validated['title'], '_');
      $validated['available'] = $request->has('available');
      
      $chart = Chart::create($validated);
      
      $chart->libraries()->sync($request->libraries);
      $chart->datas()->sync($request->datas);
      $chart->files()->sync(request('files'));//$request->files refere to files uploded
      $chart->medias()->sync($request->medias);

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
      $libraries = Library::orderBy('name', 'asc')->get();
      $datas = Data::orderBy('name', 'asc')->get();
      $medias = Media::orderBy('name', 'asc')->get();
      $files = File::orderBy('name', 'asc')->get();

      return view('admin.charts.edit', compact('chart', 'libraries', 'datas', 'medias', 'files'));
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

      $validated = Arr::except($validated, ['libraries', 'datas', 'files', 'medias']);
      $validated['title'] = Str::slug($validated['title'], '_');
      $validated['available'] = $request->has('available');

      $chart->update($validated);
      
      $chart->libraries()->sync($request->libraries);
      $chart->datas()->sync($request->datas);
      $chart->files()->sync(request('files'));//$request->files refere to files uploded
      $chart->medias()->sync($request->medias);
      
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
