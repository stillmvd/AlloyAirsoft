<input {{ $attributes->class(
    'py-4 px-6 col-span-2 text-white text-[1.7rem] font-semibold rounded-2xl bg-[#3500D3] ring-[#3500D3] ring-2 cursor-pointer ease-out duration-[.2s]
     hover:ring-2 hover:ring-transparent hover:bg-transparent hover:text-white hover:ring-2 hover:ring-[#3500D3]
     tablet-xl:col-span-2 tablet:col-span-1
     phone:col-span-2 phone:col-span-1
     zero:col-span-2 zero:col-span-1
    '
)->merge([
    'type' => 'submit',
]) }}>
