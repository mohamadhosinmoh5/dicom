<template>
	<div
		class="admin-panel-app bg-ghostWhite min-h-screen max-h-screen h-screen grid grid-cols-[6%_1fr] grid-rows-[80vh_20vh] overflow-hidden bg-[#E9F0FF] border-t border-t-[#4E51FE] border-b border-b-[#4E51FE]"
	>
		<Sidebar
			@add-dicom="() => addDicom()"
			v-if="$route.path !== '/dicom/public/log-in'"
		/>
		<!-- <DicomViewer
			ref="dicom"
			:src="dicomSrc"
			v-show="$route.path === '/dicom/public/image-viewer'"
		/> -->
		<div
			ref="dicomContainer"
			v-show="$route.path === '/dicom/public/image-viewer'"
		>
			<iframe
				id="dicomIframe"
				ref="dicomIframe"
				width="100%"
				height="100%"
				:src="dicomSrc"
				frameborder="0"
			></iframe>
		</div>
		<router-view></router-view>
		<Footer
			v-if="$route.path !== '/dicom/public/log-in'"
			@on-analyse="link => (dicomSrc = link)"
		/>
	</div>
</template>
<script>
	import Sidebar from './components/Sidebar.vue';
	import Footer from './components/Footer.vue';
	import DicomViewer from './pages/DicomViewer.vue';

	export default {
		components: {
			Sidebar,
			DicomViewer,
			Footer,
		},
		data() {
			return {
				dicomSrc: 'http://localhost/dicom/public/dicom',
				iframe: undefined,
				dicomInput: undefined,
				loadCount: 0,
			};
		},
		async mounted() {
			await this.loadIframe();
		},
		methods: {
			async asyncTimeout(){
				return new Promise((resolve) => {
					setTimeout(()=> {
						let iframeDoc = this.iframe.contentWindow.document;
						this.dicomInput = iframeDoc.getElementById('shetopski');
						resolve(this.dicomInput)
					}, 3000);
				});
			},
			async addDicom() {
				this.loadIframe().then(value => {
					if (this.loadCount > 0) {
						console.log(value);
						console.log(2);
						value.click();
					} else {
						console.log(value);
						value.click();
						this.loadCount++;
					}
				});
			},
			async loadIframe() {
				if (this.iframe && this.loadCount > 0) {
					this.$refs.dicomContainer.innerHTML = null;
					this.$refs.dicomContainer.innerHTML = `<iframe
							id="dicomIframe"
							ref="dicomIframe"
							width="100%"
							height="100%"
							src="${this.dicomSrc}"
							frameborder="0"
						></iframe>`;
				}

				this.iframe = document.getElementById('dicomIframe');
				let iframeDoc = this.iframe.contentWindow.document;
				this.dicomInput = null;
				if (iframeDoc.readyState == 'complete') {
					if (this.loadCount === 0) {
						this.dicomInput = iframeDoc.getElementById('shetopski');
						return this.dicomInput;
					} else
					{
						console.log(0);
						let a =  await this.asyncTimeout();
						console.log(a);
						console.log(1);
						return a;
					}
				}
			},
		},
	};
</script>
