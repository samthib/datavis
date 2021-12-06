<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library;
use App\Http\Requests\LibraryRequests;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $libraries = Library::orderBy('name', 'asc')->orderBy('type', 'asc')->simplePaginate(20);

      return view('admin.libraries.index', compact('libraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.libraries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\LibraryRequests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryRequests $request)
    {
      /* Validation rules */
      $validated = $request->validated();

      Library::create($validated);

      return redirect()->route('admin.libraries.index')->with('message', 'Library recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
      /* Get the datas from the file */
      try {
        $content = file_get_contents($library->link);
      } catch (\Exception $e) {
        $content = "Exception code : " . $e->getCode() . "\n";
        $content .= "Exception message : " . $e->getMessage();
      }

      return view('admin.libraries.show', compact('library', 'content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $library)
    {
      /* Get the datas from the file */
      try {
        $content = file_get_contents($library->link);
      } catch (\Exception $e) {
        $content = "Exception code : " . $e->getCode() . "\n";
        $content .= "Exception message : " . $e->getMessage();
      }

      return view('admin.libraries.edit', compact('library', 'content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\LibraryRequests  $request
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(LibraryRequests $request, Library $library)
    {
      /* Validation rules */
      $validated = $request->validated();

      $library->update($validated);

      return back()->with('message', 'Library updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
      /* Check if library is actualy used by a graph version */
      if ($library->charts->isNotEmpty()) {
        return back()->with('error', 'Library in use by a graphic');
      }

      $library->delete();

      return back()->with('message', 'Library deleted');
    }
}
