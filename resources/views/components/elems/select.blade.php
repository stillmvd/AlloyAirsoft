@props(['teams' => '', 'teams_count' => ''])

<select {{ $attributes->class(
    "w-full box-border text-white text-[1.1rem] z-20 px-5 pt-4 h-full font-medium rounded-2xl ring-2 ring-subwhite bg-bg appearance-none
     focus:outline-none"
)->merge([

]) }}>
    @for ($i = 0; $i < $teams_count; $i++)
        <option value="{{ $teams[$i]->id }}">{{ $teams[$i]->name }}</option>
    @endfor
</select>
