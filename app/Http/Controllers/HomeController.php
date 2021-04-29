<?php

namespace App\Http\Controllers;

use App\Status;
use App\Ticket;
use App\Priority;
use App\Category;
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
      return view('home');
    }

    public function list()
    {

      if (request()->status) {
          $statuses = Status::all();
          $tickets = Ticket::where('status_id', request()->status)->get();
      } else {
          $statuses = Status::all();
          $tickets = Ticket::where('status_id', '1')->get();
      }

      return view('tickets.index', compact('tickets', 'statuses'));

    }

    public function show($id)
    {

      $ticket = Ticket::where('id', $id)->firstOrFail();

      return view('tickets.ticket')->with([
      'ticket' => $ticket,
      ]);

    }

    public function new()
    {
      $priority = Priority::all();
      $category= Category::all();
      return view('tickets.new', compact('priority','category'));
    }

    public function create(Request $request)
    {

      $this->validate($request, [
          'titulo' => 'required',
          'category' => 'required',
          'priority' => 'required',
          'description' => 'required',
      ]);

      $ticket = new Ticket;
      $ticket->titulo = $request->get('titulo');
      $ticket->user_id = auth()->id();
      $ticket->status_id = "1";
      $ticket->priority_id = $request->get('priority');
      $ticket->category_id = $request->get('category');
      $ticket->description = $request->get('description');
      $ticket->save();

      return redirect()->route('home')->withFlash('Tu ticket ha sido enviado');

    }

    public function delet(Ticket $ticket)
   {

     $ticket->delete();

     return back()->withFlash('Ticket eliminado');
   }

}
