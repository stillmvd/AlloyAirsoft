@props(['teams' => '', 'teams_count' => ''])

<select {{ $attributes->class(
    "w-full px-5 pt-4 pb-0 box-border rounded-2xl ring-2 ring-[#707070] bg-[#111111] font-medium focus:outline-none text-[#FFFFFF] text-[1.1rem] appearance-none"
)->merge([

]) }}>
    <option selected disabled></option>
    @for ($i = 0; $i < $teams_count; $i++)
        <option value="{{ $i+1 }}">{{ $teams[$i]->name }}</option>
    @endfor
</select>