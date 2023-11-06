<template>
    <div class="wow">
        <div id="appreport" ref="document">
            <div id="element-to-convert">
                <center>
                    <p>dicom viewer</p>
                    <p></p>
                </center>
            </div>
        </div>
        <Button text="Export to PDF" @on-click="exportToPDF" />
    </div>
</template>

<script>
import html2pdf from "html2pdf.js"; 
import Button from "../components/Button.vue";
export default {
    components: {
        Button,
    },
    methods: {
        exportToPDF() {
            html2pdf(document.getElementById("element-to-convert"));
        },
    },
};
</script>

<style scoped>
#appreport {
    margin-top: 60px;
}

.wow {
    height: 70vh;
    overflow: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    margin-top: 50px;
}
</style>
