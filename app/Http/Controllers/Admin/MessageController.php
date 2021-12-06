<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Design;
use App\Mail\SendEmail;
use App\Models\Message;
use Illuminate\Mail\Markdown;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\MessageRequests;

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

      return view('admin.messages.inbox.index', compact('messages'));
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

      return view('admin.messages.sent.index', compact('messages'));
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
     * @param  \Illuminate\Http\MessageRequests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequests $request)
    {
      $validated = $request->validated();

      /* Add customs datas of the website */
      $design = Design::where('active', 1)->first();
      $user = User::first();
      
      $validated['logo'] = asset('storage/'.$design->logo);
      $validated['hero'] = asset('storage/'.$design->hero);
      $validated['sender'] = $user->name;
      $validated['photo'] = asset('storage/'.$user->profile_photo_path);

      Message::create($validated);
      Mail::to($validated['email'])->send(new SendEmail($validated));

      return redirect()->route('admin.messages.sent.index')->with('message', 'Message sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
     public function show(Message $message)
     {
       $data = $message->toArray();

       /* If email as been sent or received */
       if ($message->sent == 0) {
         $markdown = new Markdown(view(), config('mail.markdown'));
         $email = $markdown->render('emails.contact', compact('data'));
         return view('admin.messages.show', compact('message', 'email'));
       } elseif ($message->sent != 0) {
         $email = view('emails.send', compact('data'))->render();
         return view('admin.messages.show', compact('message', 'email'));
       }
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
     * @param  \Illuminate\Http\MessageRequests  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequests $request, Message $message)
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

      return back()->with('message', 'Message deleted');
    }
}
