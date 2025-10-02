<script setup>
    import { usePage } from '@inertiajs/vue3';
    import Create from './create.vue';
    import { ref } from 'vue';
    import PostModal from './Detail.vue';

    defineProps({
        list: {
            type : Array,
            refquired: true
        }
    })

    const handleSuccess = () => {
        show.value = false;
        window.location.reload();
    }

    const page = usePage();
    const show = ref(false);

    const appUrl = page.props.base_url || '';
    
    // Detail
    const showModal = ref(false);
    const select = ref(null);
    const openModal = (item) => {
        select.value = item.id;
        showModal.value = true;
    }
  
    </script>

    <template>
        <div>

            <div class="d-flex justify-content-center">
                <input @click="show=true" type="text" class="form-control mx-2 form_title m-4" placeholder="Bạn đang nghĩ gì">

                <b-modal v-model="show" hide-footer title="Bạn đang nghĩ gì?">
                    <Create @success="handleSuccess" />
                </b-modal>
            </div>

            <div v-if="page.props?.flash?.success" class="alert alert-success text-center mt-3" role="alert">
                {{ page.props.flash.success }}
            </div>

            <!-- Danh sách bài viết  -->
            <div>
                <h2 class=" text-center m-2">Danh sách bài viết</h2>
                <section>
                    <b-card
                    v-for="item in list"
                    :key="item.id"
                    class="mb-3"
                    @click="openModal(item)"
                    style="cursor: pointer;"
                    >
                    <p class="card-text">{{ item.content }}</p>
                    <img v-if="item.image" :src="appUrl + `/storage/${item.image}`" class="card-img-top mt-2" />
                    </b-card>
                </section>
            </div>

            <!-- <PostModal :post-id="select" :show="showModal" @close="showModal = false"/> -->
            <b-modal 
            v-model="showModal" 
            hide-footer 
            :no-close-on-backdrop="false" 
            :no-close-on-esc="false"
            >
           <PostModal :post-id="select" />
            </b-modal>

        </div>
    </template>

    <style scoped>
    .form_title {
        width: 60%;
        cursor: pointer;
    }
    </style>
    <style scoped>
    .form_title {
        width: 60%;
        cursor: pointer;
    }
    </style>
