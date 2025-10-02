<script setup>
import { ref,onMounted } from 'vue';
import IndexPost from './Post/index.vue';
import { usePage } from '@inertiajs/vue3';
import axios from 'axios';

const page = usePage();
const list = ref([]);

onMounted(async() => {
    const res = await axios.get('/posts');
    list.value = res.data;
    console.log(res.data);
});
</script>
<template>
    <div class=" flex  gap-4 max-w-6xl mx-auto">
         <div class=" w-1/4 left_side"></div>
         <div class=" w-2/4">
            <IndexPost :list="list"/>
         </div>
         <div class=" w-1/4 right_side"></div>
    </div>
</template>
<style scoped>
.left_side{
    background-color: aqua;
    height: 500px;
}
.right_side{
    background-color: aqua;
    height: 500px;
}
</style>