<template>
    <div
        class="page-link-containers row-[1/3] py-10 flex flex-col items-center gap-6 w-full h-full border-r border-r-[#4E51FE]"
    >
        <router-link
            v-for="link in sidebarLinks"
            :key="link"
            :to="link.to"
            class="group side-bar-link flex items-center justify-center relative w-[50px] h-[50px] min-w-[50px] min-h-[50px] max-w-[50px] max-h-[50px] rounded-full hover:bg-[#4E51FE26]"
        >
            <img
                :src="link.imgURL"
                :alt="link.imgURL"
                class="w-[70%] h-[70%]"
            />
            <div
                class="hidden absolute left-[65px] top-[5px] group-hover:block bg-[#c7d3ec] opacity-100 text-[#4E51FE] text-[15px] p-[5px] rounded z-[20] font-bold"
            >
                <span class="relative z-10">{{ link.text }}</span>
                <span
                    class="absolute left-[-6px] bottom-[9px] rotate-45 w-[15px] h-[15px] bg-[#c7d3ec] rounded"
                ></span>
            </div>
        </router-link>
        <div class="relative cursor-pointer">
            <button
                class="group side-bar-link flex items-center justify-center relative w-[50px] h-[50px] min-w-[50px] min-h-[50px] max-w-[50px] max-h-[50px] rounded-full hover:bg-[#4E51FE26]"
            >
                <img
                    src="../../assets/pics/addIcon.png"
                    alt="add"
                    class="w-[70%] h-[70%]"
                />
            </button>
            <!-- <input type="file" name="" id="" class="addImg absolute w-[50px] h-[50px] top-0 opacity-0 cursor-pointer" /> -->
        </div>
    </div>
</template>

<script>
import imgViewer from "../../assets/pics/imageIcon.png";
import ThreeDIcon from "../../assets/pics/3DIcon.png";
import chartIcon from "../../assets/pics/chartIcon.png";
import compareIcon from "../../assets/pics/compareIcon.png";
import reportIcon from "../../assets/pics/reportIcon.png";
import settingsIcon from "../../assets/pics/settingsIcon.png";
// import '../../js/dicomViewer.js';
export default {
    data() {
        return {
            sidebarLinks: [
                {
                    to: "/dicom/public/image-viewer",
                    text: "DicomViewer",
                    imgURL: imgViewer,
                },
                {
                    to: "/dicom/public/three-d-viewer",
                    text: "ThreeDViewer",
                    imgURL: ThreeDIcon,
                },
                {
                    to: "/dicom/public/table-graph",
                    text: "TableGraph",
                    imgURL: chartIcon,
                },
                {
                    to: "/dicom/public/compare-data",
                    text: "CompareData",
                    imgURL: compareIcon,
                },
                {
                    to: "/dicom/public/generate-report",
                    text: "GenerateReport",
                    imgURL: reportIcon,
                },
                {
                    to: "/dicom/public/settings",
                    text: "Settings",
                    imgURL: settingsIcon,
                },
                // {
                //     to: "/dicom/public/log-in",
                //     text: "Login",
                // },
            ],
        };
    },
};
</script>
