<template>
    <div class="page-link-containers row-[1/3] py-10 flex flex-col gap-5 w-full h-full">
        <router-link
            v-for="link in sidebarLinks"
            :key="link"
            :to="link.to"
            class="side-bar-link relative flex items-center gap-4 w-full h-9 text-base font-bold text-powderBlue pr-[12%] hover:text-[#6E80B7]"
        >
            {{ link.text }}
        </router-link>
    </div>
</template>

<script>
export default {
    data() {
        return {
            sidebarLinks: [
                {
                    to: "/dicom/public/dicom-viewer",
                    text: "DicomViewer",
                },
                {
                    to: "/dicom/public/three-d-viewer",
                    icon: "shopping_cart",
                    text: "ThreeDViewer",
                },
                {
                    to: "/dicom/public/compare-data",
                    text: "CompareData",
                },
                {
                    to: "/dicom/public/generate-report",
                    text: "GenerateReport",
                },
                {
                    to: "/dicom/public/table-graph",
                    text: "TableGraph",
                },
                {
                    to: "/dicom/public/settings",
                    text: "Settings",
                },
                {
                    to: "/dicom/public/log-in",
                    text: "Login",
                },
            ],
        };
    },
};
</script>
