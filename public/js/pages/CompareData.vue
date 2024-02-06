<template>
	<div class="compare-data-page grid grid-rows-[max-content_1fr] gap-[10px] p-[10px] pr-[30px]">
		<div class="tables grid grid-cols-[50%_30%] gap-[5%]">
			<div class="grid gap-[2px] h-max">
				<span class="text-[12px]">Summary Statistics</span>
				<Table
					:headers="summaryStatistics.headers"
					:data="summaryStatistics.data"
				/>
			</div>
			<div class="grid gap-[2px] h-max">
				<span class="text-[12px]">Phantom Alignment</span>
				<Table
					:headers="phantomAlignment.headers"
					:data="phantomAlignment.data"
				/>
			</div>
		</div>
		<div class="charts-segment grid grid-cols-[max-content_1fr] items-center gap-[15px]">
			<div class="action-box flex flex-col items-center justify-center gap-[5px]">
				<Button
					type="icon"
					text="area_chart"
					@on-click="() => (currentChartArea = 'area_chart')"
				/>
				<Button
					type="icon"
					text="signal_cellular_alt"
					@on-click="() => (currentChartArea = 'signal_cellular_alt')"
				/>
				<Button
					type="icon"
					text="bar_chart"
					@on-click="() => (currentChartArea = 'bar_chart')"
				/>
				<Button
					type="icon"
					text="bubble_chart"
					@on-click="() => (currentChartArea = 'bubble_chart')"
				/>
			</div>
			<div class="charts-container w-full h-full">
				<div
					v-if="currentChartArea === 'area_chart'"
					class="grid grid-cols-4 items-center h-full"
				>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">XComponent</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Line
								:data="charts.line.XComponent.data"
								:options="charts.line.XComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">YComponent</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Line
								:data="charts.line.YComponent.data"
								:options="charts.line.YComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">ZComponent</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Line
								:data="charts.line.ZComponent.data"
								:options="charts.line.ZComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">AbsoluteDistortion</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Line
								:data="charts.line.AbsoluteComponent.data"
								:options="charts.line.AbsoluteComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
				</div>
				<div
					v-if="currentChartArea === 'signal_cellular_alt'"
					class="grid grid-cols-4 items-center h-full"
				>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">XComponent</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Bar
								:data="charts.pie.XComponent.data"
								:options="charts.pie.XComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">YComponent</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Bar
								:data="charts.pie.YComponent.data"
								:options="charts.pie.YComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">ZComponent</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Bar
								:data="charts.pie.ZComponent.data"
								:options="charts.pie.ZComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">Absolute Distortion</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Bar
								:data="charts.pie.AbsoluteComponent.data"
								:options="charts.pie.AbsoluteComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="col-span-4 flex items-center gap-10 mt-2">
						<span>histogram options: </span>
						<div class="flex items-center gap-[10px]">
							<span>numberof bins: </span>
							<input
								type="number"
								value="50.00"
								class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md"
							/>
						</div>
						<div class="flex items-center gap-[10px]">
							<span>Bin Size: </span>
							<input
								type="number"
								value="0.1"
								class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md"
							/>
						</div>
						<div class="flex items-center gap-2">
							<Button
								type="icon"
								text="done"
							/>
							<Button
								type="icon"
								text="undo"
							/>
							<Button
								type="icon"
								text="sync"
							/>
						</div>
					</div>
				</div>
				<div
					v-if="currentChartArea === 'bar_chart'"
					class="grid grid-cols-4 items-center h-full"
				>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">XComponent</div>
						<div class="w-[220px] h-full relative flex items-center justify-center">
							<Bar
								:data="charts.bar.XComponent.data"
								:options="charts.bar.XComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">YComponent</div>
						<div class="w-[220px] h-full relative flex items-center justify-center">
							<Bar
								:data="charts.bar.YComponent.data"
								:options="charts.bar.YComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">ZComponent</div>
						<div class="w-[220px] h-full relative flex items-center justify-center">
							<Bar
								:data="charts.bar.ZComponent.data"
								:options="charts.bar.ZComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">Absolute Distortion</div>
						<div class="w-[220px] h-full relative flex items-center justify-center">
							<Bar
								:data="charts.bar.AbsoluteComponent.data"
								:options="charts.bar.AbsoluteComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
				</div>
				<div
					v-if="currentChartArea === 'bubble_chart'"
					class="grid grid-cols-4 items-center h-full"
				>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">XComponent</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Bubble
								:data="charts.bubble.XComponent.data"
								:options="charts.bubble.XComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">YComponent</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Bubble
								:data="charts.bubble.XComponent.data"
								:options="charts.bubble.XComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">ZComponent</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Bubble
								:data="charts.bubble.XComponent.data"
								:options="charts.bubble.XComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
					<div class="grid gap-2 grid-rows-[max-content_1fr_max-content] h-full">
						<div class="text-center text-gray-500 text-sm">Absolute Distortion</div>
						<div class="w-[250px] h-full relative flex items-center justify-center">
							<Bubble
								:data="charts.bubble.XComponent.data"
								:options="charts.bubble.XComponent.options"
							/>
						</div>
						<div class="flex justify-end mr-[20%]">
							<Button
								type="icon"
								text="save"
							/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Table from '../components/Table.vue';
	import Button from '../components/Button.vue';
	import { Bar, Bubble, Line, Pie } from 'vue-chartjs';
	import {
		Chart as ChartJS,
		Title,
		Tooltip,
		Legend,
		BarElement,
		CategoryScale,
		LinearScale,
		PointElement,
		LineElement,
		ArcElement,
	} from 'chart.js';

	ChartJS.register(
		Title,
		Tooltip,
		Legend,
		BarElement,
		CategoryScale,
		LinearScale,
		PointElement,
		LineElement,
		ArcElement
	);

	export default {
		components: {
			Table,
			Button,
			Bar,
			Bubble,
			Line,
			Pie,
		},
		data() {
			return {
				currentChartArea: 'signal_cellular_alt',
				summaryStatistics: {
					headers: [
						{
							name: '',
							label: '',
						},
						{
							name: 'Mean',
							label: 'Mean(mm)',
						},
						{
							name: 'STD',
							label: 'STD(mm)',
						},
						{
							name: 'Max',
							label: 'Max(mm)',
						},
						{
							name: 'Skewness',
							label: 'Skewness',
						},
						{
							name: 'Above',
							label: '%Above 2.5mm',
						},
					],
					data: [
						[
							'Thresholds',
							(Math.random() * 100).toFixed(2),
							'---',
							(Math.random() * 100).toFixed(2),
							'---',
							(Math.random() * 100).toFixed(2),
						],
						[
							'dx',
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
						],
						[
							'dy',
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
						],
						[
							'dz',
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
						],
						[
							'dr',
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
							(Math.random() * 100).toFixed(2),
						],
					],
				},
				phantomAlignment: {
					headers: [
						{
							name: '',
							label: '',
						},
						{
							name: 'Position',
							label: 'Position(mm)',
						},
						{
							name: 'Twist',
							label: 'Twist(deg)',
						},
					],
					data: [
						['Thresholds:', (Math.random() * 100).toFixed(2), (Math.random() * 100).toFixed(2)],
						['X:', (Math.random() * 100).toFixed(2), (Math.random() * 100).toFixed(2)],
						['Y:', (Math.random() * 100).toFixed(2), (Math.random() * 100).toFixed(2)],
						['Z:', (Math.random() * 100).toFixed(2), (Math.random() * 100).toFixed(2)],
					],
				},
				charts: {
					bar: {
						XComponent: {
							data: {
								labels: [
									'-72.4',
									'-62.4',
									'-52.4',
									'-42.4',
									'-32.4',
									'-22.4',
									'-12.4',
									'-2.4',
									'-7.6',
									'-17.6',
									'-27.6',
									'-37.6',
									'-47.6',
									'-57.6',
									'-67.6',
									'-77.6',
								],
								datasets: [
									{
										label: 'XComponent',
										backgroundColor: '#4E51FE',
										borderRadius: '2',
										data: [
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
										],
									},
								],
								borderWidth: 1,
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'position along z-axis (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: 'mean distortion (mm)',
										},
									},
								},
							},
						},
						YComponent: {
							data: {
								labels: [
									'-72.4',
									'-62.4',
									'-52.4',
									'-42.4',
									'-32.4',
									'-22.4',
									'-12.4',
									'-2.4',
									'-7.6',
									'-17.6',
									'-27.6',
									'-37.6',
									'-47.6',
									'-57.6',
									'-67.6',
									'-77.6',
								],
								datasets: [
									{
										label: 'YComponent',
										backgroundColor: '#4E51FE',
										borderRadius: '2',
										data: [
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
										],
									},
								],
								borderWidth: 1,
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'position along z-axis (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: 'mean distortion (mm)',
										},
									},
								},
							},
						},
						ZComponent: {
							data: {
								labels: [
									'-72.4',
									'-62.4',
									'-52.4',
									'-42.4',
									'-32.4',
									'-22.4',
									'-12.4',
									'-2.4',
									'-7.6',
									'-17.6',
									'-27.6',
									'-37.6',
									'-47.6',
									'-57.6',
									'-67.6',
									'-77.6',
								],
								datasets: [
									{
										label: 'ZComponent',
										backgroundColor: '#4E51FE',
										borderRadius: '2',
										data: [
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
										],
									},
								],
								borderWidth: 1,
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'position along z-axis (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: 'mean distortion (mm)',
										},
									},
								},
							},
						},
						AbsoluteComponent: {
							data: {
								labels: [
									'-72.4',
									'-62.4',
									'-52.4',
									'-42.4',
									'-32.4',
									'-22.4',
									'-12.4',
									'-2.4',
									'-7.6',
									'-17.6',
									'-27.6',
									'-37.6',
									'-47.6',
									'-57.6',
									'-67.6',
									'-77.6',
								],
								datasets: [
									{
										label: 'AbsoluteComponent',
										backgroundColor: '#4E51FE',
										borderRadius: '2',
										data: [
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
										],
									},
								],
								borderWidth: 1,
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'position along z-axis (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: 'mean distortion (mm)',
										},
									},
								},
							},
						},
					},
					bubble: {
						XComponent: {
							data: {
								datasets: [
									{
										label: 'XComponent',
										backgroundColor: '#4E51FE',
										data: [
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
											{
												x: Math.round(Math.random() * 100),
												y: Math.random() * 2,
												z: 2,
											},
										],
									},
								],
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'distance from isocenter (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: 'distortion (mm)',
										},
									},
								},
							},
						},
					},
					line: {
						XComponent: {
							data: {
								labels: ['00', '01', '02', '03', '04', '05', '06'],
								datasets: [
									{
										label: 'XComponent',
										backgroundColor: '#4E51FE',
										borderColor: '#4E51FE',
										cubicInterpolationMode: 'monotone',
										tension: 0.4,
										data: [0, 95, 100, 100, 100, 100, 100],
									},
								],
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'distortion (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: '% of points within distortion',
										},
									},
								},
							},
						},
						YComponent: {
							data: {
								labels: ['00', '01', '02', '03', '04', '05', '06'],
								datasets: [
									{
										label: 'YComponent',
										backgroundColor: '#4E51FE',
										borderColor: '#4E51FE',
										cubicInterpolationMode: 'monotone',
										tension: 0.4,
										data: [0, 20, 90, 100, 100, 100, 100],
									},
								],
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'distortion (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: '% of points within distortion',
										},
									},
								},
							},
						},
						ZComponent: {
							data: {
								labels: ['00', '01', '02', '03', '04', '05', '06'],
								datasets: [
									{
										label: 'XComponent',
										backgroundColor: '#4E51FE',
										borderColor: '#4E51FE',
										cubicInterpolationMode: 'monotone',
										tension: 0.4,
										data: [0, 95, 100, 100, 100, 100, 100],
									},
								],
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'distortion (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: '% of points within distortion',
										},
									},
								},
							},
						},
						AbsoluteComponent: {
							data: {
								labels: ['00', '01', '02', '03', '04', '05', '06'],
								datasets: [
									{
										label: 'XComponent',
										backgroundColor: '#4E51FE',
										borderColor: '#4E51FE',
										cubicInterpolationMode: 'monotone',
										tension: 0.4,
										data: [0, 0, 50, 90, 100, 100, 100],
									},
								],
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'distortion (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: '% of points within distortion',
										},
									},
								},
							},
						},
					},
					pie: {
						XComponent: {
							data: {
								labels: [
									'-5.0',
									'-4.9',
									'-4.8',
									'-4.7',
									'-4.6',
									'-4.5',
									'-4.4',
									'-4.3',
									'-4.2',
									'-4.1',
									'-4.0',
									'-3.9',
									'-3.8',
									'-3.7',
									'-3.6',
									'-3.5',
									'-3.4',
									'-3.3',
									'-3.2',
									'-3.1',
									'-3.0',
									'-2.9',
									'-2.8',
									'-2.7',
									'-2.6',
									'-2.5',
									'-2.4',
									'-2.3',
									'-2.2',
									'-2.1',
									'-2.0',
									'-1.9',
									'-1.8',
									'-1.7',
									'-1.6',
									'-1.5',
									'-1.4',
									'-1.3',
									'-1.2',
									'-1.1',
									'-1.0',
									'-0.9',
									'-0.8',
									'-0.7',
									'-0.6',
									'-0.5',
									'-0.4',
									'-0.3',
									'-0.2',
									'-0.1',
									'-0.0',
									'0.1',
									'0.2',
									'0.3',
									'0.4',
									'0.5',
									'0.6',
									'0.7',
									'0.8',
									'0.9',
									'1.0',
									'1.1',
									'1.2',
									'1.3',
									'1.4',
									'1.5',
									'1.6',
									'1.7',
									'1.8',
									'1.9',
									'2.0',
									'2.1',
									'2.2',
									'2.3',
									'2.4',
									'2.5',
									'2.6',
									'2.7',
									'2.8',
									'2.9',
									'3.0',
									'3.1',
									'3.2',
									'3.3',
									'3.4',
									'3.5',
									'3.6',
									'3.7',
									'3.8',
									'3.9',
									'4.0',
									'4.1',
									'4.2',
									'4.3',
									'4.4',
									'4.5',
									'4.6',
									'4.7',
									'4.8',
									'4.9',
									'5.0',
								],
								datasets: [
									{
										label: 'X Component',
										backgroundColor: '#4E51FE',
										borderRadius: '2',
										barPercentage: 0.2,
										data: [
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
										],
									},
								],
								borderWidth: 1,
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'distortion (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: 'count',
										},
									},
								},
							},
						},
						YComponent: {
							data: {
								labels: [
									'-5.0',
									'-4.9',
									'-4.8',
									'-4.7',
									'-4.6',
									'-4.5',
									'-4.4',
									'-4.3',
									'-4.2',
									'-4.1',
									'-4.0',
									'-3.9',
									'-3.8',
									'-3.7',
									'-3.6',
									'-3.5',
									'-3.4',
									'-3.3',
									'-3.2',
									'-3.1',
									'-3.0',
									'-2.9',
									'-2.8',
									'-2.7',
									'-2.6',
									'-2.5',
									'-2.4',
									'-2.3',
									'-2.2',
									'-2.1',
									'-2.0',
									'-1.9',
									'-1.8',
									'-1.7',
									'-1.6',
									'-1.5',
									'-1.4',
									'-1.3',
									'-1.2',
									'-1.1',
									'-1.0',
									'-0.9',
									'-0.8',
									'-0.7',
									'-0.6',
									'-0.5',
									'-0.4',
									'-0.3',
									'-0.2',
									'-0.1',
									'-0.0',
									'0.1',
									'0.2',
									'0.3',
									'0.4',
									'0.5',
									'0.6',
									'0.7',
									'0.8',
									'0.9',
									'1.0',
									'1.1',
									'1.2',
									'1.3',
									'1.4',
									'1.5',
									'1.6',
									'1.7',
									'1.8',
									'1.9',
									'2.0',
									'2.1',
									'2.2',
									'2.3',
									'2.4',
									'2.5',
									'2.6',
									'2.7',
									'2.8',
									'2.9',
									'3.0',
									'3.1',
									'3.2',
									'3.3',
									'3.4',
									'3.5',
									'3.6',
									'3.7',
									'3.8',
									'3.9',
									'4.0',
									'4.1',
									'4.2',
									'4.3',
									'4.4',
									'4.5',
									'4.6',
									'4.7',
									'4.8',
									'4.9',
									'5.0',
								],
								datasets: [
									{
										label: 'Y Component',
										backgroundColor: '#4E51FE',
										borderRadius: '2',
										barPercentage: 0.2,
										data: [
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
										],
									},
								],
								borderWidth: 1,
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'distortion (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: 'count',
										},
									},
								},
							},
						},
						ZComponent: {
							data: {
								labels: [
									'-5.0',
									'-4.9',
									'-4.8',
									'-4.7',
									'-4.6',
									'-4.5',
									'-4.4',
									'-4.3',
									'-4.2',
									'-4.1',
									'-4.0',
									'-3.9',
									'-3.8',
									'-3.7',
									'-3.6',
									'-3.5',
									'-3.4',
									'-3.3',
									'-3.2',
									'-3.1',
									'-3.0',
									'-2.9',
									'-2.8',
									'-2.7',
									'-2.6',
									'-2.5',
									'-2.4',
									'-2.3',
									'-2.2',
									'-2.1',
									'-2.0',
									'-1.9',
									'-1.8',
									'-1.7',
									'-1.6',
									'-1.5',
									'-1.4',
									'-1.3',
									'-1.2',
									'-1.1',
									'-1.0',
									'-0.9',
									'-0.8',
									'-0.7',
									'-0.6',
									'-0.5',
									'-0.4',
									'-0.3',
									'-0.2',
									'-0.1',
									'-0.0',
									'0.1',
									'0.2',
									'0.3',
									'0.4',
									'0.5',
									'0.6',
									'0.7',
									'0.8',
									'0.9',
									'1.0',
									'1.1',
									'1.2',
									'1.3',
									'1.4',
									'1.5',
									'1.6',
									'1.7',
									'1.8',
									'1.9',
									'2.0',
									'2.1',
									'2.2',
									'2.3',
									'2.4',
									'2.5',
									'2.6',
									'2.7',
									'2.8',
									'2.9',
									'3.0',
									'3.1',
									'3.2',
									'3.3',
									'3.4',
									'3.5',
									'3.6',
									'3.7',
									'3.8',
									'3.9',
									'4.0',
									'4.1',
									'4.2',
									'4.3',
									'4.4',
									'4.5',
									'4.6',
									'4.7',
									'4.8',
									'4.9',
									'5.0',
								],
								datasets: [
									{
										label: 'ZComponent',
										backgroundColor: '#4E51FE',
										borderRadius: '2',
										barPercentage: 0.2,
										data: [
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
										],
									},
								],
								borderWidth: 1,
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'distortion (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: 'count',
										},
									},
								},
							},
						},
						AbsoluteComponent: {
							data: {
								labels: [
									'-5.0',
									'-4.9',
									'-4.8',
									'-4.7',
									'-4.6',
									'-4.5',
									'-4.4',
									'-4.3',
									'-4.2',
									'-4.1',
									'-4.0',
									'-3.9',
									'-3.8',
									'-3.7',
									'-3.6',
									'-3.5',
									'-3.4',
									'-3.3',
									'-3.2',
									'-3.1',
									'-3.0',
									'-2.9',
									'-2.8',
									'-2.7',
									'-2.6',
									'-2.5',
									'-2.4',
									'-2.3',
									'-2.2',
									'-2.1',
									'-2.0',
									'-1.9',
									'-1.8',
									'-1.7',
									'-1.6',
									'-1.5',
									'-1.4',
									'-1.3',
									'-1.2',
									'-1.1',
									'-1.0',
									'-0.9',
									'-0.8',
									'-0.7',
									'-0.6',
									'-0.5',
									'-0.4',
									'-0.3',
									'-0.2',
									'-0.1',
									'-0.0',
									'0.1',
									'0.2',
									'0.3',
									'0.4',
									'0.5',
									'0.6',
									'0.7',
									'0.8',
									'0.9',
									'1.0',
									'1.1',
									'1.2',
									'1.3',
									'1.4',
									'1.5',
									'1.6',
									'1.7',
									'1.8',
									'1.9',
									'2.0',
									'2.1',
									'2.2',
									'2.3',
									'2.4',
									'2.5',
									'2.6',
									'2.7',
									'2.8',
									'2.9',
									'3.0',
									'3.1',
									'3.2',
									'3.3',
									'3.4',
									'3.5',
									'3.6',
									'3.7',
									'3.8',
									'3.9',
									'4.0',
									'4.1',
									'4.2',
									'4.3',
									'4.4',
									'4.5',
									'4.6',
									'4.7',
									'4.8',
									'4.9',
									'5.0',
								],
								datasets: [
									{
										label: 'Absolute Component',
										backgroundColor: '#4E51FE',
										borderRadius: '2',
										barPercentage: 0.2,
										data: [
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
											(Math.random() * 10).toFixed(2),
										],
									},
								],
								borderWidth: 1,
							},
							options: {
								responsive: true,
								maintainAspectRatio: false,
								plugins: {
									legend: {
										display: false,
									},
								},
								scales: {
									x: {
										display: true,
										title: {
											display: true,
											text: 'distortion (mm)',
										},
									},
									y: {
										display: true,
										title: {
											display: true,
											text: 'count',
										},
									},
								},
							},
						},
					},
				},
			};
		},
	};
</script>
