<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import Layout from '@/Pages/Layout.vue'

const props = defineProps({
    news: Object,
})
const form = useForm({
    title: props.news.title,
    body: props.news.body,
})
const submit = () => {
    form.put(route('news.update', props.news.id ))
}
</script>

<template>
    <Layout :title="`${news.title} | CRUDサンプル`" nav_active="news">
        <div class="font-sans">
            <p>
                <Link :href="route('news.index')" class="text-base md:text-sm text-green-500 no-underline hover:underline">登録データ一覧</Link>
                <span class="ml-2 text-base md:text-sm text-gray-500">&gt;</span>
                <Link :href="route('news.show', news.id)" class="ml-2 text-base md:text-sm text-green-500 no-underline hover:underline">{{ news.title }}</Link>
                <span class="ml-2 text-base md:text-sm text-gray-500">&gt; 「{{ news.title }}」の編集</span>
            </p>
            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-2xl">「{{ news.title }}」の編集</h1>
        </div>
        <form @submit.prevent="submit" class="mt-10">
            <div class="relative z-0 w-full mb-5 group">
                <div class="relative z-0 w-full mb-5 group">
                    <input v-model="form.title" type="text" name="title" id="floating_title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                    <label for="floating_title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
                    <div v-if="form.errors.title" class="mt-2 text-sm text-red-600 dark:text-red-500">{{ form.errors.title }}</div>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <textarea v-model="form.body" id="floating_body" name="body" rows="4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""></textarea>
                    <label for="floating_body" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">本文</label>
                    <div v-if="form.errors.body" class="mt-2 text-sm text-red-600 dark:text-red-500">{{ form.errors.body }}</div>
                </div>
            </div>
            <button type="submit" :disabled="form.processing" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">更新する</button>
        </form>
    </Layout>
</template>