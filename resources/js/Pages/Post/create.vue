  <script setup>
  import { useForm } from '@inertiajs/vue3';
  import { ref } from 'vue';

  const emit = defineEmits(['success'])

  const form = useForm({
      content:'',
      image: null 
  })
  const errorMessages = ref('')

  const submit = () => { 
    
    if(!form.content.trim()){
      alert("Nội dung không được để trống");
      return;
    }
    errorMessages.value = "";
      form.post(route('posts.store'),{
        onSuccess: ()=>{
          emit('success')
          form.reset()
        }
      }
    )
  }

  </script>
  <template>
    <div class="p-6 max-w-xl mx-auto">

      <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-4">
        <div>
          <textarea
            v-model="form.content"
            class="border rounded w-full p-2"
            rows="4"
            placeholder="Viết gì đó..."
          ></textarea>
          <div v-if="errorMessages" class="text-red">{{ errorMessages }}</div>
          <div v-if="form.errors.content" class="text-red-500 text-sm">{{ form.errors.content }}</div>
        </div>

        <div>
          <label class="btn btn-primary" for="file-input"><i class="far fa-image"></i> Chọn ảnh
        </label>  
          <input id="file-input" class="d-none" type="file" @change="form.image = $event.target.files[0]" />
          <div v-if="form.errors.image" class="text-red-500 text-sm">{{ form.errors.image }}</div>
          <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 m-2"
          :disabled="form.processing">
          Đăng bài
          </button>
        </div>

      
      </form>
    </div>
  </template>