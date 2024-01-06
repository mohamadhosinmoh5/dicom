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
		props: ['src'],
		data() {
			return {
				iframe: undefined,
				dicomInput: undefined,
				loadCount: 0,
			};
		},
		async mounted() {
			// show loader
			await this.loadIframe();
			// hide loader
		},
		watch: {},
		methods: {
			async addDicom() {
				await this.loadIframe();
				if (this.loadCount > 0) {
					this.iframe.contentWindow.location.reload();
					setTimeout(() => {
						this.dicomInput?.click();
					}, 100);
				} else {
					// console.log(this.dicomInput);
					this.dicomInput?.click();
					this.loadCount++;
				}
			},
			async loadIframe() {
				this.iframe = document.getElementById('dicomIframe');
				let iframeDoc = this.iframe.contentDocument || this.iframe.contentWindow.document;

				// Check if loading is complete
				if (iframeDoc.readyState == 'complete') {
					//iframe.contentWindow.alert("Hello");
					this.iframe.contentWindow.onload = async ()=>  {
						this.dicomInput = this.iframe.contentWindow.document.getElementById('filebutton');
					};
				}
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
