<template>
	<footer class="h-[20vh] grid grid-rows-[1fr_20px] gap-[2px] px-[2%] py-[1%]">
		<div class="overflow-auto">
			<table class="w-full border border-solid border-[#3E5E9F] rounded-md text-xs">
				<thead>
					<tr>
						<td :class="headerClass"></td>
						<td :class="headerClass">Reuslts</td>
						<td :class="headerClass">Imagename</td>
						<td :class="headerClass">modality</td>
						<td :class="headerClass">GammaPlan Transform</td>
						<td :class="headerClass">Series</td>
						<td :class="headerClass">Series Date</td>
						<td :class="headerClass">Sequence</td>
						<td :class="headerClass">Bandwidth(Hz/pixel)</td>
						<td :class="headerClass">Encoding</td>
						<td :class="headerClass">Study</td>
						<td :class="headerClass">Annotation</td>
						<td :class="headerClass">Manufacture</td>
						<td :class="headerClass">Model</td>
						<td :class="headerClass">Engine version</td>
						<td :class="headerClass">Number of Slices</td>
						<td :class="headerClass">Series UID</td>
						<td :class="headerClass">Station Name</td>
					</tr>
				</thead>
				<tbody>
					<tr
						v-for="row in details"
						:key="row.id"
						class="border-b border-solid border-[#3E5E9F]"
					>
						<td :class="rowClass">
							<input type="checkbox" />
						</td>
						<td :class="rowClass">not Sending</td>
						<td :class="rowClass">
							{{ row.baseName.split('-').splice(0, 2).join('-') }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.Modality }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.Transform ?? '---' }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.Series }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.date }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.Sequence }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.bandwidth }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.Encoding }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.stude ?? '---' }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.annotation ?? '---' }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.Manufacture }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.Model }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.EngineVersion ?? '---' }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.slicesCount }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.UID }}
						</td>
						<td :class="rowClass">
							{{ row.dicom_info.Station }}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<span class="text-center"> 2023 </span>
	</footer>
</template>

<script>
	import Table from './Table.vue';

	export default {
		components: {
			Table,
		},
		data() {
			return {
				details: {},
				headerClass: 'text-center bg-[#3e5e9f33] whitespace-nowrap p-1 border-r border-solid border-[#3E5E9F]',
				rowClass: 'text-center p-[2px] border-l border-solid border-[#3E5E9F] bg-[#F5F5F5] whitespace-nowrap',
			};
		},
		mounted() {
			axios.get('http://localhost/dicom/public/dicom-view').then(res => {
				console.log(res.data);
				console.log(res.data.data.data);
				this.details = res.data.data.data;
			});
		},
	};
</script>

<style></style>
