<template>
	<div>
		<iframe
			id="dicomIframe"
			ref="dicomIframe"
			width="100%"
			height="100%"
			:src="src"
			frameborder="0"
		></iframe>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				src: 'http://localhost/dicom/public/dicom',
				dicomInput: undefined,
			};
		},
		mounted() {
			setTimeout(() => {
				const iframe = document.getElementById('dicomIframe');
				this.dicomInput = iframe.contentWindow.document.getElementById('filebutton');
			}, 5000);
		},
		methods: {
			addDicom() {
				this.dicomInput?.click();
			},
		},
	};
</script>

<style scoped>
	div {
		width: 100%;
		height: 100%;
	}
</style>
