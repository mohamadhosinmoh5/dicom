<template>
    <div>
        <iframe
            id="dicomIframe"
            ref="dicomIframe"
            width="100%"
            height="100%"
            src="http://localhost/dicom/public/dicom"
            frameborder="0"
        ></iframe>
    </div>
</template>

<script>
export default {
    props: {

    },
};
</script>

<style scoped>
div {
    width: 100%;
    height: 100%;
}
</style>
