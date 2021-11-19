<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

use App\Http\Requests\DataRequests;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datas = Data::orderBy('name', 'asc')->orderBy('type', 'asc')->simplePaginate(20);

      return view('admin.datas.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.datas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DataRequests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataRequests $request)
    {
      /* Validation rules */
      $validated = $request->validated();

      /* Set a unique name to each files with the original extension */
      $fileName = uniqid() ."-". $request->file('file')->getClientOriginalName();
      $fileName = Str::kebab($fileName);
      $validated['file'] = $request->file('file')->storeAs('datas', $fileName, 'public');

      $datas = Data::create($validated);

      return redirect()->route('admin.datas.index')->with('message', 'Data recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
      /* Get the datas from the file */
      try {
        $content = file_get_contents(url('storage/'.$data->file));
      } catch (\Exception $e) {
        $content = "Exception code : " . $e->getCode() . "\n";
        $content .= "Exception message : " . $e->getMessage();
      }

      return view('admin.datas.show', compact('data', 'content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
      /* Get the datas from the file */
      try {
        $content = file_get_contents(url('storage/'.$data->file));
      } catch (\Exception $e) {
        $content = "Exception code : " . $e->getCode() . "\n";
        $content .= "Exception message : " . $e->getMessage();
      }

      return view('admin.datas.edit', compact('data', 'content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\DataRequests  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(DataRequests $request, Data $data)
    {
      /* Validation rules */
      $validated = $request->validated();

      /* Set a unique name to each files with the original extension */
      if ($request->hasFile('file')) {

        /* Check if data is actualy used by a graph version */
        if ($data->charts->isNotEmpty()) {
          return back()->with('error', 'Datas file in use by a graphic');
        }

        Storage::delete('public/'.$data->file);

        $fileName = uniqid() ."-". $request->file('file')->getClientOriginalName();
        $fileName = Str::kebab($fileName);
        $validated['file'] = $request->file('file')->storeAs('datas', $fileName, 'public');
      }

      $data->update($validated);

      return back()->with('message', 'Data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
      /* Check if data is actualy used by a graph version */
      if ($data->charts->isNotEmpty()) {
        return back()->with('error', 'Data file in use by a graphic');
      }

      Storage::delete('public/'.$data->file);

      $data->delete();

      return back()->with('message', 'Data deleted');
    }
}
