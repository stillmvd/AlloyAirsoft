@extends('layouts.base')
{{--Добавить переключатель is_del!!!!--}}
@section('content')
  <main class="grow">
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
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Name') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Surname') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Callsign') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Email') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Phone') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Game') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Team') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Achievements') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Price') }}</th>
              <th class="font-semibold text-left bg-card_bg/75 rounded-tr-xl rounded-br-xl"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($players as $player)
          <tr class="text-[#979797]">
            <td class="font-medium">{{ $player->id }}</td>
            <td class="font-medium">{{ $player->name }}</td>
            <td class="font-medium">{{ $player->surname }}</td>
            <td class="font-medium">{{ $player->callsign }}</td>
            <td class="font-medium">{{ $player->email }}</td>
            <td class="font-medium">{{ $player->phone }}</td>
{{--            Тут будут матчи в которых игрок принимал участия--}}
            <td class="font-medium"></td>
            <td class="font-medium">{{ $player->team_name }}</td>
{{--              Тут очивки --}}
            <td class="font-medium"></td>
            <td class="font-medium">{{ $player->price }}</td>
            <td>
{{--                to do переписать на ajax--}}
              <a href="{{ route('deletePlayer', $player->id) }}" class="hover:text-red text-subwhite font-medium tracking-wide ease-out duration-100">
                {{ __('Delete') }}
              </a>
            </td>
          </tr>
          @endforeach
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
        @foreach($players as $player)
            <tr class="text-[#979797]">
                <td class="font-medium">{{ $player->id }}</td>
                <td class="font-medium">{{ $player->name }}</td>
                <td class="font-medium">{{ $player->surname }}</td>
                <td class="font-medium">{{ $player->callsign }}</td>
                <td class="font-medium">{{ $player->email }}</td>
                <td class="font-medium">{{ $player->phone }}</td>
            </tr>
        @endforeach
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
        @foreach($players as $player)
            <tr class="text-[#979797]">
                <td class="font-medium">{{ $player->id }}</td>
                <td class="font-medium">{{ $player->name }}</td>
                <td class="font-medium">{{ $player->callsign }}</td>
                <td class="font-medium">{{ $player->email }}</td>
            </tr>
        @endforeach
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
        @foreach($players as $player)
            <tr class="text-[#979797]">
                <td class="font-medium">{{ $player->name }}</td>
                <td class="font-medium">{{ $player->callsign }}</td>
            </tr>
        @endforeach
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
        @foreach ($emails as $email)
        <tr class="text-[#979797]">
            <td class="font-medium">{{ $email->id }}</td>
            <td class="font-medium">{{ $email->email }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </main>
@endsection
