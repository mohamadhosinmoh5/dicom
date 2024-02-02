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
			await this.loadIframe();
		},
		watch: {},
		methods: {
			async addDicom() {
				await this.loadIframe();
				if (this.loadCount > 0) {
					this.iframe.contentWindow.location.reload();
					await this.loadIframe();
					setTimeout(() => {
						this.dicomInput.click();
					}, 1000);
				} else {
					this.dicomInput?.click();
					this.loadCount++;
				}
			},
			async loadIframe() {
				this.iframe = document.getElementById('dicomIframe');
				let iframeDoc = this.iframe.contentDocument || this.iframe.contentWindow.document;
				this.dicomInput = null;

				if (iframeDoc.readyState == 'complete') {
					this.dicomInput = this.iframe.contentWindow.document.getElementById('shetopski');
					console.log(this.dicomInput)
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
