<script setup>

defineProps({
    dragonImage: Object,
})
</script>

<template>
    <div>
        <div class="flex justify-around">
            <img class="size-24 transform" :src="dragonImage" alt="Golden Dragon" />
            <div class="flex justify-center flex-col">
                <span class="text-center sm:text-sm md:text-4xl font-bold text-[#ffff00]">Chinees Indische
                    Specialiteiten
                </span>
                <span class="text-center sm:text-sm md:text-4xl font-bold text-[#ffff00]">
                    De Gouden Draak
                </span>
            </div>
            <img class="size-24 scale-x-[-1]" :src="dragonImage" alt="Golden Dragon" />
        </div>

        <nav>
            <ul class="flex flex-col md:flex-row justify-center m-auto max-w-[50vw] font-medium text-white">
                <li class="text-center bg-gradient-to-b from-cyan-300 to-blue-700">
                    <a href="paginas/MENUKAART.html">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menukaart&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>
                </li>

                <li class="text-center bg-gradient-to-b from-cyan-300 to-blue-700">
                    <a href="paginas/news.html">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nieuws&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>
                </li>

                <li class="text-center bg-gradient-to-b from-cyan-300 to-blue-700">
                    <a href="paginas/contact.html">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>
