<template>
    <div class="admin-panel-app bg-ghostWhite min-h-screen grid grid-cols-[15%_1fr] grid-rows-[max-content_1fr]">
        <Sidebar />
        <main class="p-5">
            <router-view></router-view>
        </main>
        <Footer />
    </div>
</template>
<script>
import Sidebar from './components/Sidebar.vue';
import Footer from './components/Footer.vue';

export default {
    components: {
        Sidebar,
        Footer,
    },
};
</script>
