<header class="flex flex-col lg:flex-row justify-center items-center bg-[#ff0000] font-chineseTakeaway text-2xl">
    <!-- First section (always visible, stacking on small screens) -->
    <div class="text-[#ffff00] p-2 w-full lg:w-1/3 flex justify-center items-center">
        <img class="h-14 align-middle" src="{{url('/images/dragon-small.png')}}" alt="Golden Dragon">
        <span class="mx-2">De Gouden Draak</span>
        <img class="h-14 align-middle" src="{{url('/images/dragon-small-flipped.png')}}" alt="Golden Dragon">
    </div>

    <!-- Second section (always visible, stacks under first on small screens) -->
    <div class="text-[#ffff00] p-8 w-full lg:w-1/3 flex justify-center items-center overflow-hidden">
        <a href="paginas/aanbiedingen.html" class="font-sans font-bold no-underline">
            <x-marquee>
                Welkom bij De Gouden Draak. Klik op deze tekst om de aanbiedingen van deze week te zien!
            </x-marquee>
        </a>
    </div>

    <!-- Optional third section (only visible on large screens, aligns side by side) -->
    <div class="text-[#ffff00] p-10 w-full lg:w-1/3 lg:flex hidden lg:justify-center lg:items-center">
        <img class="h-14 align-middle" src="{{url('/images/dragon-small.png')}}" alt="Golden Dragon">
        <span class="mx-2">De Gouden Draak</span>
        <img class="h-14 align-middle" src="{{url('/images/dragon-small-flipped.png')}}" alt="Golden Dragon">
    </div>
</header>