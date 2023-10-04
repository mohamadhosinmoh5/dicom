<template>
    <div class="page-link-containers row-[1/3] py-10 flex flex-col gap-5 w-full h-full gap-[30px]">
        <router-link
            v-for="link in sidebarLinks"
            :key="link"
            :to="link.to"
            class="group side-bar-link relative flex items-center gap-4 w-full h-9 text-base font-bold text-powderBlue pr-[12%] hover:text-[#6E80B7] ml-[20px] "
        >
            <img
                id="img"
                :src = "link.imgURL" alt=""
                class=" w-[40px] h-[40px] "
            >
            <div class="hidden absolute left-[59px] top-[-3px] group-hover:block bg-[#c7d3ec] opacity-100 text-[#4E51FE] text-[15px] p-[5px] rounded ">
                <span class=" relative z-10">{{ link.text }}</span>
                <span class="absolute left-[-6px] bottom-[9px] rotate-45 w-[15px] h-[15px] bg-[#c7d3ec] rounded "></span>
            </div>
        </router-link>
    </div>
</template>

<script>
    import imgViewer from '../../assets/pics/imageIcon.png';
    import ThreeDIcon from '../../assets/pics/3DIcon.png';
    import chartIcon from '../../assets/pics/chartIcon.png';
    import compareIcon from '../../assets/pics/compareIcon.png';
    import reportIcon from '../../assets/pics/reportIcon.png';
    import settingsIcon from '../../assets/pics/settingsIcon.png';
export default {
    data() {
        return {
            sidebarLinks: [
                {
                    to     : "/dicom/public/image-viewer",
                    text   : "DicomViewer",
                    imgURL : imgViewer,
                },
                {
                    to     : "/dicom/public/three-d-viewer",
                    text   : "ThreeDViewer",
                    imgURL : ThreeDIcon
                },
                {
                    to: "/dicom/public/table-graph",
                    text: "TableGraph",
                    imgURL : chartIcon
                },
                {
                    to: "/dicom/public/compare-data",
                    text: "CompareData",
                    imgURL : compareIcon,
                },
                {
                    to: "/dicom/public/generate-report",
                    text: "GenerateReport",
                    imgURL : reportIcon,
                },
                {
                    to: "/dicom/public/settings",
                    text: "Settings",
                    imgURL : settingsIcon
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
