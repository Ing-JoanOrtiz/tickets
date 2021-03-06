@extends('layouts.app')

@section('content')

@if(session()->has('flash'))
<div class="alert alert-success">{{session('flash')}}</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Todos los tickets</div>

                <div class="card-body">

                  @foreach ($statuses as $status)
                    <li class="nav"><a href="{{ route('index-ticket', ['status' => $status->id])}}">{{ $status->name }}</a></li>
                  @endforeach

                  <table id="news-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Folio</th>
                        <th>Titulo</th>
                        <th>Estatus</th>
                        <th>Prioridad</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tickets as $ticket)
                      <tr>
                        <td>{{$ticket->id}}</td>
                        <td>{{$ticket->titulo}}</td>
                        <td>{{$ticket->status->name}}</td>
                        <td>{{$ticket->priority->name}}</td>
                        <td>
                          <a href="{{route('show-ticket', $ticket)}}" class="btn btn-xs btn-info">
                            <img src="/icons/v.png" width="10" height="10"> Ver
                          </a>
                          @if( $ticket->status_id < 3)
                          <a href="{{route('take-ticket', $ticket)}}" class="btn btn-xs btn-primary">
                            <img src="/icons/t.png" width="10" height="10"> Tomar
                          </a>
                          @endif
                          <!--
                          @if( $ticket->status_id < 3)
                          <form method="POST" action="{{route('ticket-delet', $ticket)}}" style="display: inline">
                            {{csrf_field()}} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger" onclick="return confirm('??Est?? seguro de querer eliminar?')">
                              <img src="/icons/x.png" width="10" height="10"> Rechazar
                            </button>
                          </form>
                          @endif
                        -->
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
