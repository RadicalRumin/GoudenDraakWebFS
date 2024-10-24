<script setup>

defineProps({
    dragonImage: Object,
})
</script>

<template>
    <div>
        <div class="flex justify-between">
            <img
                class=""
                :src="dragonImage"
                alt="Golden Dragon"
            />
            <div class="flex justify-center flex-col">
                <span
                    class="text-center sm:text-xl md:text-4xl font-bold text-[#ffff00]"
                    >Chinees Indische Specialiteiten</span
                ><br />
                <span
                    class="text-center sm:text-xl md:text-4xl font-bold text-[#ffff00]"
                    >De Gouden Draak</span
                ><br />
            </div>
            <img
                class="transform scaleX(-1)"
                :src="dragonImage"
                alt="Golden Dragon"
            />
        </div>

        <nav class="flex justify-center">
            <ul class="flex m-auto font-medium text-white">
                <li>
                    <a href="paginas/MENUKAART.html">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menukaart&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>
                </li>

                <li>
                    <a href="paginas/news.html">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nieuws&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>
                </li>

                <li>
                    <a href="paginas/contact.html">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>
