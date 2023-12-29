<template>
	<footer class="h-[20vh] grid grid-rows-[1fr_20px] gap-[2px] px-[2%] py-[1%]">
		<div class="overflow-auto">
			<table class="w-full border border-solid border-[#3E5E9F] rounded-md text-xs">
				<thead>
					<tr>
						<td :class="headerClass"></td>
						<td :class="headerClass">Reuslts</td>
						<td :class="headerClass">Image Name</td>
						<td :class="headerClass">Modality</td>
						<td :class="headerClass">Series</td>
						<td :class="headerClass">Series Date</td>
						<td :class="headerClass">Sequence</td>
						<td :class="headerClass">Bandwidth(Hz/pixel)</td>
						<td :class="headerClass">Field Strength</td>
						<td :class="headerClass">Encoding</td>
						<td :class="headerClass">Study</td>
						<td :class="headerClass">Manufacture</td>
						<td :class="headerClass">Model</td>
						<td :class="headerClass">Number of Slices</td>
						<td :class="headerClass">Series UID</td>
						<td :class="headerClass">Station Name</td>
					</tr>
				</thead>
				<tbody>
					<tr
						v-for="row in query.data"
						:key="row.id"
						class="border-b border-solid border-[#3E5E9F]"
					>
						<td :class="rowClass">
							<button @click="$emit('on-analyse', `http://localhost/dicom/public/dicom?id=${row.id}`)">
								مشاهده
							</button>
							<!-- <a :href="'http://localhost/dicom/public/dicom?id=' + row.id">مشاهده</a> -->
						</td>
						<td :class="rowClass">not Sending</td>
						<td :class="rowClass">
							{{ row.baseName.split('-').splice(0, 2).join('-') }}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.Modality || row?.dicom_info?.Modality === 'undefined'
									? '---'
									: row?.dicom_info?.Modality
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.Series || row?.dicom_info?.Series === 'undefined'
									? '---'
									: row?.dicom_info?.Series
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.date || row?.dicom_info?.date === 'undefined'
									? '---'
									: row?.dicom_info?.date
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.Sequence || row?.dicom_info?.Sequence === 'undefined'
									? '---'
									: row?.dicom_info?.Sequence
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.bandwidth || row?.dicom_info?.bandwidth === 'undefined'
									? '---'
									: row?.dicom_info?.bandwidth
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.Strength || row?.dicom_info?.Strength === 'undefined'
									? '---'
									: row?.dicom_info?.Strength
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.Encoding || row?.dicom_info?.Encoding === 'undefined'
									? '---'
									: row?.dicom_info?.Encoding
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.study || row?.dicom_info?.study === 'undefined'
									? '---'
									: row?.dicom_info?.study
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.Manufacture || row?.dicom_info?.Manufacture === 'undefined'
									? '---'
									: row?.dicom_info?.Manufacture
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.Model || row?.dicom_info?.Model === 'undefined'
									? '---'
									: row?.dicom_info?.Model
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.slicesCount || row?.dicom_info?.slicesCount === 'undefined'
									? '---'
									: row?.dicom_info?.slicesCount
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.UID || row?.dicom_info?.UID === 'undefined'
									? '---'
									: row?.dicom_info?.UID
							}}
						</td>
						<td :class="rowClass">
							{{
								!row?.dicom_info?.Station || row?.dicom_info?.Station === 'undefined'
									? '---'
									: row?.dicom_info?.Station
							}}
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
	import { useQuery } from '@tanstack/vue-query';
	import axios from 'axios';

	export default {
		components: {
			Table,
		},
		data() {
			return {
				query: {},
				headerClass: 'text-center bg-[#3e5e9f33] whitespace-nowrap p-1 border-r border-solid border-[#3E5E9F]',
				rowClass: 'text-center p-[2px] border-l border-solid border-[#3E5E9F] bg-[#F5F5F5] whitespace-nowrap',
			};
		},
		emits: ['on-analyse'],
		mounted() {
			this.query = useQuery({
				queryKey: ['footer'],
				queryFn: () =>
					axios
						.get('http://localhost/dicom/public/dicom-view')
						.then(res => res.data.data.data)
						.catch(error => {
							this.$router.push('/dicom/public/log-in');
						}),
			});
		},
	};
</script>

<style></style>
