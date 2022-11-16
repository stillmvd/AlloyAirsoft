@extends('layouts.base')

@section('content')
  <div class="w-full flex justify-center">
    <h1 class="text-4xl sm:text-6xl">
      {{ __('All players') }}
    </h1>
  </div>
  <div class="hidden w-full xl:flex">
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
            <th class="font-semibold text-left bg-card_bg/75">Team</th>
            <th class="font-semibold text-left bg-card_bg/75">Achievements</th>
            <th class="font-semibold text-left bg-card_bg/75 rounded-tr-xl rounded-br-xl"> </th>
        </tr>
      </thead>
      <tbody>
        <p id="getCountAchievements" class="hidden">{{ $achievements_count }}</p>
        <p id="getCountPlayers" class="hidden">{{ $players_count }}</p>
        @for ($i = 0; $i < $players_count; $i++)
        <tr class="text-[#979797]">
            <td class="font-medium">{{ $players[$i]->id }}</td>
            <td class="font-medium">{{ $players[$i]->name }}</td>
            <td class="font-medium">{{ $players[$i]->surname }}</td>
            <td class="font-medium">{{ $players[$i]->callsign }}</td>
            <td class="font-medium">{{ $players[$i]->emailPlayer }}</td>
            <td class="font-medium">{{ $players[$i]->phone }}</td>
            <td class="font-medium">{{ getGamesForPlayer($players[$i]->id) }}</td>
            <td class="font-medium">{{ $teams->where('id', $players[$i]->team_id)->value('name') }}</td>
            <td class="font-medium">
                <div class="dropdown dropdown-hover">
                    <label tabindex="0" class="btn m-1">Achievements</label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                        <form action="{{ route('getAchievements', $players[$i]->id) }}" method="POST" id="{{ "getAchievements" . $players[$i]->id }}">
                            @csrf
                            @for ($y = 0; $y < $achievements_count; $y++)
                                <li><a>
                                    <div class="form-control">
                                        <label class="cursor-pointer label">
                                            <span class="label-text">{{ $achievements[$y]->nameAchievement }}</span>
                                            <input id="{{ 'change' . $players[$i]->id . $y }}" name={{ $achievements[$y]->nameAchievement }} type="checkbox" class="checkbox checkbox-success" @checked(hasAchievement($players[$i]->id, $achievements[$y]->nameAchievement))/>
                                        </label>
                                    </div>
                                    <input type="submit" value="Submit" class="hidden"/>
                                </a></li>
                            @endfor
                        </form>
                    </ul>
                </div>
            </td>
            {{-- <td><a href="{{ route('deletePlayer', $players[$i]->id) }}" class="font-medium hover:text-red text-[#979797] text-[15px]">Delete</a></td> --}}
        </tr>
        @endfor
      </tbody>
    </table>
  </div>

  <div class="hidden w-full lg:flex xl:hidden">
    <table class="w-full bg-dark rounded-xl border-collapse table-auto" cellpadding="15%">
      <thead>
        <tr class="text-white">
            <th class="font-semibold text-left bg-card_bg/75 rounded-tl-xl rounded-bl-xl">Id</th>
            <th class="font-semibold text-left bg-card_bg/75">Name</th>
            <th class="font-semibold text-left bg-card_bg/75">Surname</th>
            <th class="font-semibold text-left bg-card_bg/75">Callsign</th>
            <th class="font-semibold text-left bg-card_bg/75">Email</th>
            <th class="font-semibold text-left bg-card_bg/75">Phone</th>
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
          </tr>
        @endfor
      </tbody>
    </table>
  </div>

  <div class="hidden w-full sm:flex lg:hidden">
    <table class="w-full bg-dark rounded-xl border-collapse table-auto" cellpadding="15%">
      <thead>
        <tr class="text-white">
            <th class="font-semibold text-left bg-card_bg/75 rounded-tl-xl rounded-bl-xl">Id</th>
            <th class="font-semibold text-left bg-card_bg/75">Name</th>
            <th class="font-semibold text-left bg-card_bg/75">Callsign</th>
            <th class="font-semibold text-left bg-card_bg/75">Email</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < $players_count; $i++)
          <tr class="text-[#979797]">
              <td class="font-medium">{{ $players[$i]->id }}</td>
              <td class="font-medium">{{ $players[$i]->name }}</td>
              <td class="font-medium">{{ $players[$i]->callsign }}</td>
              <td class="font-medium">{{ $players[$i]->emailPlayer }}</td>
          </tr>
        @endfor
      </tbody>
    </table>
  </div>

  <div class="flex w-full sm:hidden">
    <table class="w-full bg-dark rounded-xl border-collapse table-auto" cellpadding="15%">
      <thead>
        <tr class="text-white">
            <th class="font-semibold text-left bg-card_bg/75">Name</th>
            <th class="font-semibold text-left bg-card_bg/75">Callsign</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < $players_count; $i++)
          <tr class="text-[#979797]">
              <td class="font-medium">{{ $players[$i]->name }}</td>
              <td class="font-medium">{{ $players[$i]->callsign }}</td>
          </tr>
        @endfor
      </tbody>
    </table>
  </div>


  <div class="w-full flex justify-center">
    <h1 class="text-4xl sm:text-6xl">
      {{ __('Subscribers') }}
    </h1>
  </div>

  <table class="w-5/12 mx-auto mb-20 bg-dark rounded-xl border-collapse table-auto" cellpadding="15%">
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
