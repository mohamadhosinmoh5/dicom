<template>
    <div>
        <iframe
            id="dicom-iframe"
            ref="dicomIframe"
            width="100%"
            height="100%"
            src="http://localhost/dicom/public/di"
            frameborder="0"
        ></iframe>
    </div>
</template>

<script>
export default {
    props: {

    },
    mounted() {
        setTimeout(()=> {
            let dicomIframe = document.getElementById('dicom-iframe')
            console.log(dicomIframe.contentWindow.document);
        },5000)
    }
};
</script>

<style scoped>
div {
    width: 100%;
    height: 100%;
}
</style>
