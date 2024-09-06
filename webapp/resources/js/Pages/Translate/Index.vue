<script setup>
//import { useForm } from '@inertiajs/vue3'
import Layout from '@/Pages/Layout.vue'
import axios from 'axios';
import {ref} from 'vue';
const original_text = ref();
const translate_text = ref('');
const reverse_text = ref('');
const require_original_text = ref(false);

const getTranslate = async ()=>{
    translate_text.value = ''
    reverse_text.value = ''
    if (!original_text.value) {
        require_original_text.value = true
        return
    }
    require_original_text.value = false
    const post_data = { original_text: original_text.value };
    await axios.post('/translate/execute', post_data).then((res) =>{
        if (res.data.translate_text) {
            translate_text.value = res.data.translate_text
            getTranslateReverse()
        }
    })
}
const getTranslateReverse = async ()=>{
    const post_data = { translate_text: translate_text.value };
    await axios.post('/translate/reverse', post_data).then((res) =>{
        if (res.data.reverse_text) {
            reverse_text.value = res.data.reverse_text
        }
    })
}

</script>

<template>
    <Layout title="翻訳" nav_active="translate">
        <div class="font-sans">
            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">翻訳</h1>
        </div>
        <div class="relative z-0 w-full mt-10 mb-5 group">
            <div class="relative z-0 w-full mb-5 group">
                <textarea id="floating_body" v-model="original_text" rows="4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""></textarea>
                <label for="floating_body" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">入力</label>
                <span v-if="require_original_text" class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">翻訳したい文を入力してください。</span>
                <button @click="getTranslate" type="button" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">翻訳する</button>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <textarea id="floating_result" rows="4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" disabled>{{ translate_text }}</textarea>
                <label for="floating_result" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">翻訳結果</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <textarea id="floating_reverse" rows="4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" disabled>{{ reverse_text }}</textarea>
                <label for="floating_reverse" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">逆翻訳結果</label>
            </div>
        </div>
        
    </Layout>
</template>


