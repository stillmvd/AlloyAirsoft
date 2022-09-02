@props(['teams' => '', 'teams_count' => ''])

<select {{ $attributes->class(
    "w-full box-border text-white text-[1.1rem] z-20 px-5 h-full font-medium rounded-2xl ring-2 ring-subwhite bg-bg appearance-none
     focus:outline-none
     laptop:pt-4 laptop:text-[1.1rem]
     tablet-xl:pt-3 tablet-xl:pb-0 tablet-xl:text-[1rem]
     tablet:pt-6 tablet:pb-3
     phone:pt-6 phone:pb-3
     zero:pt-6 zero:pb-3"
)->merge([

]) }}>
    @for ($i = 0; $i < $teams_count; $i++)
        <option value="{{ $teams[$i]->id }}">{{ $teams[$i]->name }}</option>
    @endfor
</select>
