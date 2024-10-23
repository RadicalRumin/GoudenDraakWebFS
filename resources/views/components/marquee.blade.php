<section class="marquee-container">
   <p class="marquee-text">{{ $slot }}</p>
</section>


<style>
    .marquee-container {
        display: flex;
        white-space: nowrap;
        width: 100%;
        height: clamp(2em, 2vw, 6em);
        overflow: hidden;
        font-family: sans-serif;
     }


   .marquee-text {
        padding: 0 0.25em;
        animation: marquee 15s infinite linear;
     }

     @keyframes marquee {

       from {
           transform: translateX(60%);
        }

       to {
           transform: translateX(-60%);
        }

    }

</style>
