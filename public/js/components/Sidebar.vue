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
    import imgViewer from '../../assets/pics/imageIcon.png';
    import ThreeDIcon from '../../assets/pics/3DIcon.png';
    import chartIcon from '../../assets/pics/chartIcon.png';
    import compareIcon from '../../assets/pics/compareIcon.png';
    import reportIcon from '../../assets/pics/reportIcon.png';
    import settingsIcon from '../../assets/pics/settingsIcon.png';
    import addIcon from '../../assets/pics/addIcon.png';
    import analysisIcon from '../../assets/pics/analysisIconn.png';
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
                    to: "/dicom/public/add",
                    text: "Add",
                    imgURL : addIcon
                },
                {
                    to: "/dicom/public/analysis",
                    text: "Analysis",
                    imgURL : analysisIcon,
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
