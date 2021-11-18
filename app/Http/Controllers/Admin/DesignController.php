<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Design;
use App\Models\Chart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\DesignRequests;

class DesignController extends Controller
{
    /**
     * Display the specified in an hidden url to be further injected in an <iframe>.
     *
     * @param  \App\Models\Design  $chart
     * @return \Illuminate\Http\Response
     */
    public function shadow(Design $design)
    {
      $charts = Chart::where('available', 1)->orderBy('id', 'desc')->simplePaginate(6);

      return view('charts.index', compact('charts', 'design'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $designs = Design::orderBy('id', 'desc')->simplePaginate(20);

      return view('admin.designs.index', compact('designs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.designs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DesignRequests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignRequests $request)
    {
      $validated = $request->validated();

      /* Reset the current layout if new one selected */
      if (isset($request->active)) {
        Design::where('active', 1)->update(['active' => 0]);
      }

      /* Record the hero image */
      $heroLink = $request->file('hero')->store('img/heros', 'public');

      /* Record the logo image */
      $logoLink = $request->file('logo')->store('img/logos', 'public');


      $design = Design::create([
        "active" => isset($request->active) ? 1 : 0,
        "link" => $request->subtitle,
        "title" => $request->title,
        "subtitle" => $request->subtitle,
        "description" => $request->description,
        "hero" => $heroLink,
        "logo" => $logoLink,
        "color" => $request->color,
      ]);

      return redirect()->route('admin.designs.index', compact('design'))->with('message', 'Design recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show(Design $design)
    {
        return view('admin.designs.show', compact('design'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit(Design $design)
    {
        return view('admin.designs.edit', compact('design'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\DesignRequests  $request
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(DesignRequests $request, Design $design)
    {
      $validated = $request->validated();

      /* Reset the current layout if new one wished */
      if (isset($request->active)) {
        Design::where('id', '!=', $design->id)->update(['active' => 0]);
      }

      $design->update([
        "active" => isset($request->active) ? 1 : 0,
        "link" => $request->subtitle,
        "title" => $request->title,
        "subtitle" => $request->subtitle,
        "description" => $request->description,
        "color" => $request->color,
      ]);

      /* Update the hero image */
      if (!empty($request->file('hero'))) {
        $hero = $design->value('hero');
        Storage::delete('public/'.$hero);
        $heroLink = $request->file('hero')->store('img/heros', 'public');

        $design->update([
          "hero" => $heroLink,
        ]);
      }

      /* Update the logo image */
      if (!empty($request->file('logo'))) {
        $logo = $design->value('logo');
        Storage::delete('public/'.$logo);
        $logoLink = $request->file('logo')->store('img/logos', 'public');

        $design->update([
          "logo" => $logoLink,
        ]);
      }

      return back()->with([compact('design'), 'message' => 'Design updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function destroy(Design $design)
    {
      if ($design->active == 1) {
        return back()->with('error', 'Design in use by the application');
      }

      $hero = $design->value('hero');
      Storage::delete('public/'.$hero);

      $logo = $design->value('logo');
      Storage::delete('public/'.$logo);

      $design->delete();

      return back()->with('message', 'Design deleted');
    }
}
