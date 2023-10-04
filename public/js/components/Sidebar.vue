<template>
    <div class="page-link-containers row-[1/3] py-10 flex flex-col gap-5 w-full h-full gap-[25px]">
        <router-link
            v-for="link in sidebarLinks"
            :key="link"
            :to="link.to"
            class="side-bar-link relative flex items-center gap-4 w-full h-9 text-base font-bold text-powderBlue pr-[12%] hover:text-[#6E80B7] ml-[20px] "
        >
            <img
                :src = "link.imgURL" alt=""
                class=" w-[50px] h-[50px]"
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
                    to     : "/dicom/public/image-viewer",
                    text   : "DicomViewer",
                    imgURL : "../../assets/pics/imageIcon.png"
                },
                {
                    to     : "/dicom/public/three-d-viewer",
                    text   : "ThreeDViewer",
                    imgURL : "../../assets/pics/3DIcon.png"
                },
                {
                    to: "/dicom/public/table-graph",
                    text: "TableGraph",
                    imgURL : "../../assets/pics/chartIcon.png"
                },
                {
                    to: "/dicom/public/compare-data",
                    text: "CompareData",
                    imgURL : "../../assets/pics/compareIcon.png"
                },
                {
                    to: "/dicom/public/generate-report",
                    text: "GenerateReport",
                    imgURL : "../../assets/pics/reportIcon.png"
                },
                {
                    to: "/dicom/public/settings",
                    text: "Settings",
                    imgURL : "../../assets/pics/settingsIcon.png"
                },
                {
                    to: "/dicom/public/add",
                    text: "Add",
                    imgURL : "../../assets/pics/addIcon.png"
                },
                {
                    to: "/dicom/public/analysis",
                    text: "Analysis",
                    imgURL : "../../assets/pics/analysisIconn.png"
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
