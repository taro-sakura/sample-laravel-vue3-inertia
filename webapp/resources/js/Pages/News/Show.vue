<script setup>
import { Link } from '@inertiajs/vue3';
import Layout from '@/Pages/Layout.vue'

defineProps({
    news: Object,
})
</script>

<template>
    <Layout :title="`${news.title} | CRUDサンプル`" nav_active="news">
        <div class="font-sans">
            <p>
                <Link :href="route('news.index')" class="text-base md:text-sm text-green-500 no-underline hover:underline">登録データ一覧</Link>
                <span class="ml-2 text-base md:text-sm text-gray-500">&gt; {{ news.title }}</span>
            </p>
            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">CRUDサンプル</h1>
        </div>
        <h2 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ news.title }}</h2>
        <div class="py-6 whitespace-pre-wrap">{{ news.body }}</div>
    </Layout>
</template>
