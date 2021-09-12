<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'order_by' => ['nullable','sometimes','in:desc,asc'],
        ]);
        $tickets = auth()->user()->tickets()->when($request->order_by,function($q) use($request) {
            $q->orderBy('deadline' , $request->order_by);
        })->get();
        
//         $allTickets = Ticket::where('user_id' , '=' , Auth::id())->get();
        return view ('viewAllTickets' , compact('tickets'));
    }

//     public function sort()
//     {
//         $allTickets = Ticket::orderBy('deadline' , 'DESC')
//         ->where('user_id' , '=' , Auth::id())->get();
//         return view ('viewAllTickets' , ['allTickets'  => $allTickets]);

//     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view ('addTicket' ,compact('users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_data = $request->validate([
            'description' => ['required'],
            'status' => ['required'],
            'deadline' => ['required'],
        ]);
       // $emails=['ahmedelshahat@gmail.com','noraelshahat@gmail.com'];
        auth()->user()->tickets()->create($request_data);
       
        Mail::to('ahmedelshahat@gmail.com')
        ->send(new SendEmail($request_data));

        
//         $allTickets = Ticket::where('user_id' , '=' , Auth::id())->get();
        return redirect()->route('tickets')->with('success','Thanx for telling us :)'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return 'hi show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request_data = $request->validate([
            'description' => ['required'],
            'status' => ['required'],
            'deadline' => ['required'],
        ]);
        $ticket->update($request_data);
        return redirect()->route('tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets');
    }
}
