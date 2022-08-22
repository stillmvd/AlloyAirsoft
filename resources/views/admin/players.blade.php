@extends('layouts.base')

@section('content')
<div class="overflow-x-auto">
    <table class="table table-compact w-full">
      <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>callsign</th>
            <th>email</th>
            <th>phone</th>
            <th>team_id</th>
            <th>game_id</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < $players_count; $i++)
        <tr>
            <td>{{ $players[$i]->id }}</td>
            <td>{{ $players[$i]->name }}</td>
            <td>{{ $players[$i]->surname }}</td>
            <td>{{ $players[$i]->callsign }}</td>
            <td>{{ $players[$i]->email }}</td>
            <td>{{ $players[$i]->phone }}</td>
            <td>{{ $players[$i]->team_id }}</td>
            <td>{{ $players[$i]->game_id }}</td>
        </tr>
        @endfor
      </tbody>
      <tfoot>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>callsign</th>
            <th>email</th>
            <th>phone</th>
            <th>team_id</th>
            <th>game_id</th>
        </tr>
      </tfoot>
    </table>
  </div>
@endsection
