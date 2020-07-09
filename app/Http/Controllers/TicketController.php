<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Ticket;
use App\User;
use Auth;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $allTickets = Ticket::where('user_id' , '=' , Auth::id())->get();
        return view ('viewAllTickets' , ['allTickets'  => $allTickets]);
    }

    public function sort()
    {
        $allTickets = Ticket::orderBy('deadline' , 'DESC')
        ->where('user_id' , '=' , Auth::id())->get();
        return view ('viewAllTickets' , ['allTickets'  => $allTickets]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view ('addTicket' ,['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $emails=['ahmedelshahat@gmail.com','noraelshahat@gmail.com'];
        Ticket::create($request->all());
        

        Mail::to('ahmedelshahat@gmail.com')
        ->send(new SendEmail($request->all()));

        
        $allTickets = Ticket::where('user_id' , '=' , Auth::id())->get();
        return view ('viewAllTickets' , ['allTickets'  => $allTickets])
        ->with('success','Thanx for telling us :)');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'hi show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $OneTicket = Ticket::find($id);
        return view('editTicket',['oneTicket' => $OneTicket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket )
    {
        $ticket->update($request->all());
        return redirect('/ticket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remove_one = Ticket::find($id);
        $remove_one->delete();
        return redirect('/ticket');
    }
}
