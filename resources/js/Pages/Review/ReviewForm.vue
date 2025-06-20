<script setup>
import { ref, computed } from "vue";
import { Form } from "@primevue/forms";
import InputText from "primevue/inputtext";
import ColorPicker from "primevue/colorpicker";
import Checkbox from "primevue/checkbox";
import Message from "primevue/message";
import Button from "primevue/button";

const colorValue = ref("#000000"); // Initialize with a default hex value

const decimalValue = computed(() => {
    return parseInt(colorValue.value.replace("#", ""), 16);
});
const email = ref("");
const wouldReturn = ref(false);
const wouldRecommend = ref(false);

const onFormSubmit = () => {
    // Handle form submission
};
</script>

<template>
    <div class="flex items-center justify-center h-screen">
        <Form
            v-slot="$form"
            :initialValues
            :resolver
            @submit="onFormSubmit"
            class="flex flex-col gap-4 w-full sm:w-1/2"
        >
            <div class="flex flex-col items-center gap-4 w-full">
                <InputText
                    id="email"
                    class="w-1/2 text-center"
                    placeholder="E-mail"
                    v-model="email"
                    type="email"
                />

                <div class="flex gap-4">
                    <label for="wouldReturn"> Zou u terugkomen? </label>
                    <Checkbox v-model="wouldReturn" binary />
                </div>

                <div class="flex gap-4">
                    <label for="recommend">
                        Zou u ons aanbevelen bij vrienden?
                    </label>
                    <Checkbox v-model="wouldRecommend" binary />
                </div>

                <label for="colorDecimal">
                    Beoordeel uw ervaring tussen 0 en 16777215
                </label>
                <InputText
                    id="colorDecimal"
                    class="w-1/2 text-center"
                    :value="decimalValue"
                    disabled
                    type="text"
                />
                <ColorPicker
                    format="hex"
                    v-model="colorValue"
                    name="rating"
                    inline
                />

                <Message
                    v-if="$form.color?.invalid"
                    severity="error"
                    size="small"
                    variant="simple"
                    >{{ $form.color.error?.message }}</Message
                >
                <Button type="submit" class="w-1/2 text-center" severity="secondary" label="Submit" />
            </div>
        </Form>
    </div>
</template>
