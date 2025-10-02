<script setup>
import { ref, watch } from "vue";
import axios from "axios";

const props = defineProps({
  postId: {
    type: Number,
    default: null,
  },
  show: {
    type: Boolean,
    default: false,
  },
});
const emit = defineEmits(["close"]);

const post = ref(null);

watch(
  () => props.postId,
  async (id) => {
    if (id) {
      const res = await axios.get(`/edit/${id}`); 
      post.value = res.data;
    }
  },
  { immediate: true }
);
</script>

<template>
  <div>
    <div v-if="post">
      <h2 class="text-xl font-bold mb-2 text-center">Bài Viết Của {{ post.user?.name }}</h2>
      <p class="mb-3">{{ post.content }}</p>
      <img v-if="post.image" :src="`/storage/${post.image}`" class="w-full rounded" />
    </div>
    <div v-else>
      <p>Đang tải...</p>
    </div>
  </div>
</template>
