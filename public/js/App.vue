<template>
	<div
		class="admin-panel-app bg-ghostWhite min-h-screen max-h-screen h-screen grid grid-cols-[6%_1fr] grid-rows-[80vh_20vh] overflow-hidden bg-[#E9F0FF] border-t border-t-[#4E51FE] border-b border-b-[#4E51FE]"
	>
		<Sidebar
			@add-dicom="() => $refs.dicom.addDicom()"
			v-if="$route.path !== '/dicom/public/log-in'"
		/>
		<DicomViewer
			ref="dicom"
			v-show="$route.path === '/dicom/public/image-viewer'"
		/>
		<router-view></router-view>
		<Footer v-if="$route.path !== '/dicom/public/log-in'" />
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
		methods: {
			addDicom() {
				this.$refs.dicom.addDicom();
			},
		},
	};
</script>
