<template>
    <div class="admin-panel-app bg-ghostWhite min-h-screen max-h-screen h-screen grid grid-cols-[10%_1fr] grid-rows-[70vh_30vh] overflow-hidden bg-[#E9F0FF]">
        <Sidebar v-if="$route.path !== '/dicom/public/log-in'" />
        <router-view></router-view>
        <Footer v-if="$route.path !== '/dicom/public/log-in'"/>
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
    mounted()
    {
        console.log(this.$route);
    }
};
</script>
