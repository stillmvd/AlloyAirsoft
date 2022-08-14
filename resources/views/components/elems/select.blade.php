@props(['teams' => '', 'teams_count' => ''])

<select {{ $attributes->class(
    "w-full px-5 pt-4 pb-0 box-border rounded-2xl ring-2 ring-[#707070] bg-[#111111] font-medium text-[#FFFFFF] text-[1.1rem] appearance-none
     focus:outline-none
     laptop:pt-4 laptop:text-[1.1rem] 
     tablet-xl:pt-3 tablet-xl:text-[1rem] 
     tablet:pt-6 tablet:pb-3
     phone:pt-6 phone:pb-3
     zero:pt-6 zero:pb-3
    "
)->merge([

]) }}>
    <option selected disabled></option>
    @for ($i = 0; $i < $teams_count; $i++)
        <option value="{{ $i+1 }}">{{ $teams[$i]->name }}</option>
    @endfor
</select>