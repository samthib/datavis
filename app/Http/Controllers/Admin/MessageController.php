<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

use App\Http\Requests\MessageRules;

use Illuminate\Support\Facades\Mail;

use App\Mail\SendEmail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $messages = Message::where('sent', 0)
                          ->orderBy('id', 'desc')
                          ->simplePaginate(20);

      return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sent()
    {
      $messages = Message::where('sent', 1)
                          ->orderBy('id', 'desc')
                          ->simplePaginate(20);

      return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\MessageRules  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRules $request)
    {
      $validated = $request->validated();

      Message::create($validated);

      Mail::to($validated['email'])->send(new SendEmail($validated));

      return redirect()->route('admin.messages.sent.index')->with('message', 'Message envoyé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
      return view('admin.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
      return view('admin.messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
      $message->delete();

      return back();
    }
}
