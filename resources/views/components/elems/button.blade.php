<input {{ $attributes->class(
    'py-4 px-6 col-span-2 text-white text-[1.7rem] font-semibold rounded-2xl bg-transparent ring-2 ring-[#02DF8F] cursor-pointer ease duration-[.2s]
     hover:ring-2 hover:ring-transparent hover:bg-[#02DF8F] hover:text-[#111111]
     tablet-xl:col-span-2 tablet:col-span-1
     phone:col-span-2 phone:col-span-1
     zero:col-span-2 zero:col-span-1
    '
)->merge([
    'type' => 'submit',
]) }}>