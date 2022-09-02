@extends('layouts.base')

@section('content')
  <div class="flex justify-center">
    <h1>
      {{ __('All players') }}
    </h1>
  </div>

  <table class="w-full bg-dark rounded-xl border-collapse table-auto" cellpadding="15%">
    <thead>
      <tr class="text-white">
          <th class="font-semibold text-left bg-card_bg/75 rounded-tl-xl rounded-bl-xl">Id</th>
          <th class="font-semibold text-left bg-card_bg/75">Name</th>
          <th class="font-semibold text-left bg-card_bg/75">Surname</th>
          <th class="font-semibold text-left bg-card_bg/75">Callsign</th>
          <th class="font-semibold text-left bg-card_bg/75">Email</th>
          <th class="font-semibold text-left bg-card_bg/75">Phone</th>
          <th class="font-semibold text-left bg-card_bg/75">Game</th>
          <th class="font-semibold text-left bg-card_bg/75 rounded-tr-xl rounded-br-xl">Team</th>
      </tr>
    </thead>
    <tbody>
      @for ($i = 0; $i < $players_count; $i++)
      <tr class="text-[#979797]">
          <td class="font-medium">{{ $players[$i]->id }}</td>
          <td class="font-medium">{{ $players[$i]->name }}</td>
          <td class="font-medium">{{ $players[$i]->surname }}</td>
          <td class="font-medium">{{ $players[$i]->callsign }}</td>
          <td class="font-medium">{{ $players[$i]->emailPlayer }}</td>
          <td class="font-medium">{{ $players[$i]->phone }}</td>
          <td class="font-medium">{{ $games->where('id', $players[$i]->game_id)->value('name') }}</td>
          <td class="font-medium">{{ $teams->where('id', $players[$i]->team_id)->value('name') }}</td>
      </tr>
      @endfor
    </tbody>
  </table>

  <div class="flex justify-center">
    <h1>
      {{ __('Subscribers') }}
    </h1>
  </div>

  <table class="w-[30%] m-auto bg-dark rounded-xl border-collapse table-auto" cellpadding="15%">
    <thead>
      <tr class="text-white">
          <th class="font-semibold text-left bg-card_bg/75 rounded-tl-xl rounded-bl-xl">Id</th>
          <th class="font-semibold text-left bg-card_bg/75">Email</th>
      </tr>
    </thead>
    <tbody>
      @for ($i = 0; $i < $emails_count; $i++)
      <tr class="text-[#979797]">
          <td class="font-medium">{{ $emails[$i]->id }}</td>
          <td class="font-medium">{{ $emails[$i]->email }}</td>
      </tr>
      @endfor
    </tbody>
  </table>
@endsection
