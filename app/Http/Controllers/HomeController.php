<?php

namespace App\Http\Controllers;
use App\ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $tickets = ticket::all();
      return view('home', compact('tickets'));
    }

    public function new(Request $request)
    {

      $this->validate($request, [
          'name' => 'required',
          'category' => 'required',
          'desc' => 'required',
      ]);

      $ticket = new ticket;
      $ticket->name = $request->get('name');
      $ticket->category = $request->get('category');
      $ticket->desc = $request->get('desc');
      $ticket->save();

      return redirect()->route('home')->withFlash('Tu ticket ha sido enviado');

    }

    public function delet(Ticket $ticket)
   {

     $ticket->delete();

     return back()->withFlash('Ticket eliminado');
   }

}
