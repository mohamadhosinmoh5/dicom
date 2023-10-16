<template>
    <div>
        <iframe
            id="dicomIframe"
            ref="dicomIframe"
            width="100%"
            height="100%"
            src="http://localhost/dicom/public/di"
            frameborder="0"
        ></iframe>
    </div>
</template>

<script>
import '../../assets/scripts/html.js';
export default {
    props: {
        images: {
            type: Array,
            default: [],
        },
        
    },
    mounted(){
        let dicomIframe = this.$refs.dicomIframe
        // const dicomIframe = 
        setTimeout(() => {
            console.log(dicomIframe.contentWindow.document.getElementById('myfile'));
            // importImages(this.images);
        }, 10000);
        // console.log(getByid("markAlphaText"))
    }
};
</script>

<style scoped>
div {
    width: 100%;
    height: 100%;
}
</style>
