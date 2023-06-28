@extends('layouts.base')

@section('content')
  <main class="grow">
    <div class="w-full flex justify-center">
      <h1 class="text-4xl sm:text-6xl">
        {{ __('All users') }}
      </h1>
    </div>
    <div class="hidden w-[70%] mx-auto xl:flex">
      <table class="w-full bg-dark rounded-xl border-collapse table-auto" cellpadding="15%">
        <thead>
          <tr class="text-white">
              <th class="font-semibold text-left bg-card_bg/75 rounded-tl-xl rounded-bl-xl">Id</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Registered') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Avatar') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Email') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Active') }}</th>
              <th class="font-semibold text-left bg-card_bg/75">{{ __('Admin') }}</th>
              <th class="font-semibold text-left bg-card_bg/75 rounded-tr-xl rounded-br-xl"> </th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr class="text-subwhite">
                <td class="font-medium">{{ $user['id'] }}</td>
                <td class="font-medium">{{ $user['created_at'] !== NULL ? $user['created_at'] : '' }}</td>
                <td>
                  @if ($user['pathToAvatar'] != NULL)
                    <img src="{{ asset($user['pathToAvatar']) }}" alt="avatar" class="w-14 rounded-full select-none">
                  @else
                    <img src="{{ asset('image/avatar_not_found.png') }}" alt="avatar" class="w-14 rounded-full select-none">
                  @endif
                </td>
                <td class="font-medium">{{ $user['email'] }}</td>
                <td class="font-medium">{{ $user['isActive'] }}</td>
                <td class="font-medium">{{ $user['isAdmin'] }}</td>
                <td>
                  @unless ($user['isAdmin'])
                    <a href="{{ route('deleteUser', $user['id']) }}" class="hover:text-red text-subwhite font-medium tracking-wide ease-out duration-100">
                        {{ __('Delete') }}
                    </a>
                  @endunless
              </td>
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
              <th class="font-semibold text-left bg-card_bg/75">Created_at</th>
              <th class="font-semibold text-left bg-card_bg/75">Email</th>
              <th class="font-semibold text-left bg-card_bg/75">isAdmin</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr class="text-subwhite">
                <td class="font-medium">{{ $user['id'] }}</td>
                <td class="font-medium">{{ $user['created_at'] }}</td>
                <td class="font-medium">{{ $user['email'] }}</td>
                <td class="font-medium">{{ $user['isAdmin'] }}</td>
            </tr>
          @endforeach
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
          @foreach($users as $user)
              <tr class="text-subwhite">
                  <td class="font-medium">{{ $user['id'] }}</td>
                  <td class="font-medium">{{ $user['email'] }}</td>
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
                  <td class="font-medium">{{ $email['id'] }}</td>
                  <td class="font-medium">{{ $email['email'] }}</td>
              </tr>
          @endforeach
      </tbody>
    </table>
  </main>
@endsection
