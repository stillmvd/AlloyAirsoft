@extends('layouts.base')

@section('content')
  <div class="w-full flex justify-center">
    <h1 class="text-4xl sm:text-6xl">
      {{ __('All users') }}
    </h1>
  </div>
  <div class="hidden w-full xl:flex">
    <table class="w-full bg-dark rounded-xl border-collapse table-auto" cellpadding="15%">
      <thead>
        <tr class="text-white">
            <th class="font-semibold text-left bg-card_bg/75 rounded-tl-xl rounded-bl-xl">Id</th>
            <th class="font-semibold text-left bg-card_bg/75">Created_At</th>
            <th class="font-semibold text-left bg-card_bg/75">Email</th>
            <th class="font-semibold text-left bg-card_bg/75">isActive</th>
            <th class="font-semibold text-left bg-card_bg/75">isAdmin</th>
            <th class="font-semibold text-left bg-card_bg/75 rounded-tr-xl rounded-br-xl"> </th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < $users_count; $i++)
          <tr class="text-[#979797]">
              <td class="font-medium">{{ $users[$i]->id }}</td>
              <td class="font-medium">{{ $users[$i]->created_at }}</td>
              <td class="font-medium">{{ $users[$i]->email }}</td>
              <td class="font-medium">{{ $users[$i]->isActive }}</td>
              <td class="font-medium">{{ $users[$i]->isAdmin }}</td>
              <td>
                <a href="{{ route('deleteUser', $users[$i]->id) }}" class="font-medium hover:text-red text-[#979797] text-[15px]">
                    Delete
                </a>
            </td>
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
            <th class="font-semibold text-left bg-card_bg/75">Created_at</th>
            <th class="font-semibold text-left bg-card_bg/75">Email</th>
            <th class="font-semibold text-left bg-card_bg/75">isAdmin</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < $users_count; $i++)
          <tr class="text-[#979797]">
              <td class="font-medium">{{ $users[$i]->id }}</td>
              <td class="font-medium">{{ $users[$i]->created_at }}</td>
              <td class="font-medium">{{ $users[$i]->email }}</td>
              <td class="font-medium">{{ $users[$i]->isAdmin }}</td>
          </tr>
        @endfor
      </tbody>
    </table>
  </div>

  <div class="flex w-full sm:hidden">
    <table class="w-full bg-dark rounded-xl border-collapse table-auto" cellpadding="15%">
      <thead>
        <tr class="text-white">
            <th class="font-semibold text-left bg-card_bg/75">Id</th>
            <th class="font-semibold text-left bg-card_bg/75">Email</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < $users_count; $i++)
            <tr class="text-[#979797]">
                <td class="font-medium">{{ $users[$i]->id }}</td>
                <td class="font-medium">{{ $users[$i]->email }}</td>
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
