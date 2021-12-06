<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use Illuminate\Support\Str;
use App\Http\Requests\FileRequests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::orderBy('name', 'asc')->orderBy('type', 'asc')->simplePaginate(20);

        return view('admin.files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FileRequests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequests $request)
    {
        /* Validation rules */
        $validated = $request->validated();

        /* Set a unique name to each files with the original extension */
        $fileName = uniqid() . "-" . $request->file('file')->getClientOriginalName();
        $fileName = Str::kebab($fileName);
        $validated['file'] = $request->file('file')->storeAs('files', $fileName, 'public');

        File::create($validated);

        return redirect()->route('admin.files.index')->with('message', 'File recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        /* Get the files from the file */
        try {
            $content = file_get_contents(url('storage/' . $file->file));
        } catch (\Exception $e) {
            $content = "Exception code : " . $e->getCode() . "\n";
            $content .= "Exception message : " . $e->getMessage();
        }

        return view('admin.files.show', compact('file', 'content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        /* Get the files from the file */
        try {
            $content = file_get_contents(url('storage/' . $file->file));
        } catch (\Exception $e) {
            $content = "Exception code : " . $e->getCode() . "\n";
            $content .= "Exception message : " . $e->getMessage();
        }

        return view('admin.files.edit', compact('file', 'content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\FileRequests  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(FileRequests $request, File $file)
    {
        /* Validation rules */
        $validated = $request->validated();

        /* Set a unique name to each files with the original extension */
        if ($request->hasFile('file')) {

            /* Check if file is actualy used by a graph version */
            if ($file->charts->isNotEmpty()) {
                return back()->with('error', 'Files file in use by a graphic');
            }

            Storage::delete('public/' . $file->file);

            $fileName = uniqid() . "-" . $request->file('file')->getClientOriginalName();
            $fileName = Str::kebab($fileName);
            $validated['file'] = $request->file('file')->storeAs('files', $fileName, 'public');
        }

        $file->update($validated);

        return back()->with('message', 'File updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        /* Check if file is actualy used by a graph version */
        if ($file->charts->isNotEmpty()) {
            return back()->with('error', 'File file in use by a graphic');
        }

        Storage::delete('public/' . $file->file);

        $file->delete();

        return back()->with('message', 'File deleted');
    }
}
