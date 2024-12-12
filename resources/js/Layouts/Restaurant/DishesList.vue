<!-- <script setup>
</script>

<template>
    <div>
        <div>
            <img :src="item.image" :alt="item.text" />
            <p>{{ item.text }}</p>
        </div>
    </div>
</template> -->

<template>
    <div>
        <font-awesome-icon :icon="['fas', 'coffee']" />
        <font-awesome-icon :icon="['fas', 'user']" />
        <font-awesome-icon :icon="['fab', 'github']" />
    </div>
</template>

<script>
export default {
    name: 'ExampleComponent',
};
</script>