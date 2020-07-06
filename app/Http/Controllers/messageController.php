<?php

namespace App\Http\Controllers;

use App\Contactus;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class messageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contac_us = Contactus::all();
        return view('contact-us',['contact_us' => $contac_us]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required ',
            'email' => 'email|nullable',
            'mobile' => 'numeric|nullable',
            'message' => 'required'
        ]);

     $objmessage = new Message();
     $objmessage->name = $request->name;
     $objmessage->email =  $request->email;
     $objmessage->mobile = $request->mobile;
     $objmessage->message = $request->message;
        $objmessage->user_id = Auth::id();
     $objmessage->save();
     return redirect()->back()->with('result',__('generic.thanks_send_message'));

    }
    public function user_message($id)
    {
        return view('voyager::messages.pasokh',['id' => $id]);
    }
    public function pasokh_user_message(Request $request ,$id)
    {

        $message =  Message::find($id);
        $message->pasokh = $request->pasokh ;
        $message->save();
        return   redirect()->route("voyager.messages.index")->with([
            'message'    =>__('generic.send_replay_success')  ,
            'alert-type' => 'success',
        ]);
    }

    //override attribute
    public  function  attributes()
    {
        return [
            'email' => 'ایمیل' ,
        ];
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
