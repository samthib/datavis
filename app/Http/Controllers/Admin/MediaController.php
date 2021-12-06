<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRequests;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::orderBy('name', 'asc')->orderBy('type', 'asc')->simplePaginate(20);

        return view('admin.medias.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\MediaRequests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaRequests $request)
    {
        $validated = $request->validated();

        /* Record the image or the video */
        if ($validated['type'] == 'image') {
            $validated['file'] = optional($request->file('file'))->store('medias/images', 'public') ?? '';
        } elseif ($validated['type'] == 'video') {
            $validated['file'] = optional($request->file('file'))->store('medias/videos', 'public') ?? '';
        }

        $media = Media::create($validated);

        return redirect()->route('admin.medias.index', compact('media'))->with('message', 'Media recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        return view('admin.medias.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        return view('admin.medias.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\MediaRequests  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(MediaRequests $request, Media $media)
    {
        $validated = $request->validated();

        /* Update the file */
        if (!empty($request->file('file'))) {
            Storage::delete('public/' . $media->file);
            /* Record the image or the video */
            if ($validated['type'] == 'image') {
                $validated['file'] = optional($request->file('file'))->store('medias/images', 'public') ?? '';
            } elseif ($validated['type'] == 'video') {
                $validated['file'] = optional($request->file('file'))->store('medias/videos', 'public') ?? '';
            }
        }

        $media->update($validated);

        return back()->with([compact('media'), 'message' => 'Media updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        /* Check if file is actualy used by a graph version */
        if ($media->charts->isNotEmpty()) {
            return back()->with('error', 'Media file in use by a graphic');
        }

        Storage::delete('public/' . $media->file);

        $media->delete();

        return back()->with('message', 'Media deleted');
    }
}
