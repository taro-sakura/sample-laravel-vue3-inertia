<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import Layout from '@/Pages/Layout.vue'

defineProps({
    news: Object,
})
const form = useForm({});
const deleteNews = (news) => {
    form.delete(route('news.destroy', news), {
        preserveScroll: true,
    })
}
</script>

<template>
    <Layout title="CRUDサンプル" nav_active="news">
        <div class="font-sans">
            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">CRUDサンプル</h1>
        </div>
        <div v-if="news">
            <Link :href="route('news.create')"  class="flex-1 mt-4 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-2 px-4 rounded shadow hover:bg-green-400">新規作成</Link>
            <div v-for="n in news" class="mt-10">
                <div class="flex w-full items-center font-sans px-4 py-5">
                    <div class="flex-1 px-2">
                        <p class="text-base font-bold text-base md:text-xl leading-none mb-2">{{ n.title }}</p>
                        <div class="text-gray-600 text-xs md:text-base">
                            <Link :href="route('news.edit', n)" class="text-blue-500 no-underline hover:underline mr-5">編集</Link>
                            <Link href="#" @click="deleteNews(n)" class="text-red-500 no-underline hover:underline">削除</Link>
                        </div>
                    </div>
                    <div class="justify-end">
                        <Link :href="route('news.show', n)" class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">Read More</Link>
                    </div>
                </div>
                <hr class="border-b-2 border-gray-400 mx-4">
            </div>
        </div>
    </Layout>
</template>


