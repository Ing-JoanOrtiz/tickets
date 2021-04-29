@extends('layouts.app')

@section('content')

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
                          <a href="" class="btn btn-xs btn-primary">
                            <img src="/icons/t.png" width="10" height="10"> Tomar
                          </a>
                          <form method="POST" action="{{route('ticket-delet', $ticket)}}" style="display: inline">
                            {{csrf_field()}} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger" onclick="return confirm('¿Está seguro de querer eliminar?')">
                              <img src="/icons/x.png" width="10" height="10"> Rechazar
                            </button>
                          </form>
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