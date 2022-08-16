<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\MessageRequests;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;

class MessageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\MessageRequests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequests $request)
    {
      $validated = $request->validated();

      Message::create($validated);

      Mail::send(new ContactEmail($validated));

      return redirect()->route('messages.create')->with('message', 'Message envoyé');
    }
}
