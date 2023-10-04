<template>
    <div
        class="compare-data-page grid grid-rows-[max-content_1fr] gap-[10px] p-[10px] pr-[30px]"
    >
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
        <div
            class="charts-segment grid grid-cols-[max-content_1fr] items-center gap-[15px]"
        >
            <div
                class="action-box flex flex-col items-center justify-center gap-[5px]"
            >
                <Button
                    type="icon"
                    text="area_chart"
                    @on-click="() => (currentChartArea = 'area_chart')"
                />
                <Button
                    type="icon"
                    text="bar_chart"
                    @on-click="() => (currentChartArea = 'bar_chart')"
                />
                <Button
                    type="icon"
                    text="pie_chart"
                    @on-click="() => (currentChartArea = 'pie_chart')"
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
                    class="grid grid-cols-[1fr_1fr_1fr_1fr] items-center h-full"
                >
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Line :data="charts.line.XComponent.data" :options="charts.line.XComponent.options" />
                    </div>
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Line :data="charts.line.YComponent.data" :options="charts.line.YComponent.options" />
                    </div>
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Line :data="charts.line.ZComponent.data" :options="charts.line.ZComponent.options" />
                    </div>
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Line :data="charts.line.AbsoluteComponent.data" :options="charts.line.AbsoluteComponent.options" />
                    </div>
                </div>
                <div
                    v-if="currentChartArea === 'bar_chart'"
                    class="flex items-center justify-between h-full"
                >
                    <div
                        class="w-[220px] h-full relative flex items-center justify-center"
                    >
                        <Bar
                            :data="charts.bar.XComponent.data"
                            :options="charts.bar.XComponent.options"
                        />
                    </div>
                    <div
                        class="w-[220px] h-full relative flex items-center justify-center"
                    >
                        <Bar
                            :data="charts.bar.YComponent.data"
                            :options="charts.bar.YComponent.options"
                        />
                    </div>
                    <div
                        class="w-[220px] h-full relative flex items-center justify-center"
                    >
                        <Bar
                            :data="charts.bar.ZComponent.data"
                            :options="charts.bar.ZComponent.options"
                        />
                    </div>
                    <div
                        class="w-[220px] h-full relative flex items-center justify-center"
                    >
                        <Bar
                            :data="charts.bar.AbsoluteComponent.data"
                            :options="charts.bar.AbsoluteComponent.options"
                        />
                    </div>
                </div>
                <div
                    v-if="currentChartArea === 'pie_chart'"
                    class="grid grid-cols-[1fr_1fr_1fr_1fr] items-center"
                >
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Pie :data="charts.pie.XComponent.data" :options="charts.pie.XComponent.options" />
                    </div>
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Pie :data="charts.pie.YComponent.data" :options="charts.pie.YComponent.options" />
                    </div>
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Pie :data="charts.pie.ZComponent.data" :options="charts.pie.ZComponent.options" />
                    </div>
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Pie :data="charts.pie.AbsoluteComponent.data" :options="charts.pie.AbsoluteComponent.options" />
                    </div>
                </div>
                <div
                    v-if="currentChartArea === 'bubble_chart'"
                    class="grid grid-cols-[1fr_1fr_1fr_1fr] items-center h-full"
                >
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Bubble
                            :data="charts.bubble.XComponent.data"
                            :options="charts.bubble.XComponent.options"
                        />
                    </div>
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Bubble
                            :data="charts.bubble.XComponent.data"
                            :options="charts.bubble.XComponent.options"
                        />
                    </div>
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Bubble
                            :data="charts.bubble.XComponent.data"
                            :options="charts.bubble.XComponent.options"
                        />
                    </div>
                    <div class="w-[250px] h-full relative flex items-center justify-center">
                        <Bubble
                            :data="charts.bubble.XComponent.data"
                            :options="charts.bubble.XComponent.options"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Table from "../components/Table.vue";
    import Button from "../components/Button.vue";
    import { Bar, Bubble, Line, Pie } from "vue-chartjs";
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
        ArcElement
    } from "chart.js";

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
            Pie
        },
        data() {
            return {
                currentChartArea: "pie_chart",
                summaryStatistics: {
                    headers: [
                        {
                            name: "",
                            label: "",
                        },
                        {
                            name: "Man",
                            label: "Man(mm)",
                        },
                        {
                            name: "STD",
                            label: "STD(mm)",
                        },
                        {
                            name: "Max",
                            label: "Max(mm)",
                        },
                        {
                            name: "Skewness",
                            label: "Skewness",
                        },
                        {
                            name: "Above",
                            label: "%Above 2.5mm",
                        },
                    ],
                    data: [
                        [
                            "dx",
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                        ],
                        [
                            "dy",
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                        ],
                        [
                            "dz",
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                        ],
                        [
                            "dr",
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
                            name: "",
                            label: "",
                        },
                        {
                            name: "Position",
                            label: "Position(mm)",
                        },
                        {
                            name: "Twist",
                            label: "Twist(deg)",
                        },
                    ],
                    data: [
                        [
                            "X:",
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                        ],
                        [
                            "Y:",
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                        ],
                        [
                            "Z:",
                            (Math.random() * 100).toFixed(2),
                            (Math.random() * 100).toFixed(2),
                        ],
                    ],
                },
                charts: {
                    bar: {
                        XComponent: {
                            data: {
                                labels: [
                                    "-72.4",
                                    "-62.4",
                                    "-52.4",
                                    "-42.4",
                                    "-32.4",
                                    "-22.4",
                                    "-12.4",
                                    "-2.4",
                                    "-7.6",
                                    "-17.6",
                                    "-27.6",
                                    "-37.6",
                                    "-47.6",
                                    "-57.6",
                                    "-67.6",
                                    "-77.6",
                                ],
                                datasets: [
                                    {
                                        label: "XComponent",
                                        backgroundColor: "#4E51FE",
                                        borderRadius: "2",
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
                            },
                        },
                        YComponent: {
                            data: {
                                labels: [
                                    "-72.4",
                                    "-62.4",
                                    "-52.4",
                                    "-42.4",
                                    "-32.4",
                                    "-22.4",
                                    "-12.4",
                                    "-2.4",
                                    "-7.6",
                                    "-17.6",
                                    "-27.6",
                                    "-37.6",
                                    "-47.6",
                                    "-57.6",
                                    "-67.6",
                                    "-77.6",
                                ],
                                datasets: [
                                    {
                                        label: "YComponent",
                                        backgroundColor: "#4E51FE",
                                        borderRadius: "2",
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
                            },
                        },
                        ZComponent: {
                            data: {
                                labels: [
                                    "-72.4",
                                    "-62.4",
                                    "-52.4",
                                    "-42.4",
                                    "-32.4",
                                    "-22.4",
                                    "-12.4",
                                    "-2.4",
                                    "-7.6",
                                    "-17.6",
                                    "-27.6",
                                    "-37.6",
                                    "-47.6",
                                    "-57.6",
                                    "-67.6",
                                    "-77.6",
                                ],
                                datasets: [
                                    {
                                        label: "ZComponent",
                                        backgroundColor: "#4E51FE",
                                        borderRadius: "2",
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
                            },
                        },
                        AbsoluteComponent: {
                            data: {
                                labels: [
                                    "-72.4",
                                    "-62.4",
                                    "-52.4",
                                    "-42.4",
                                    "-32.4",
                                    "-22.4",
                                    "-12.4",
                                    "-2.4",
                                    "-7.6",
                                    "-17.6",
                                    "-27.6",
                                    "-37.6",
                                    "-47.6",
                                    "-57.6",
                                    "-67.6",
                                    "-77.6",
                                ],
                                datasets: [
                                    {
                                        label: "AbsoluteComponent",
                                        backgroundColor: "#4E51FE",
                                        borderRadius: "2",
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
                            },
                        },
                    },
                    bubble : {
                        XComponent: {
                            data: {
                                datasets: [
                                    {
                                        label: 'XComponent',
                                        backgroundColor: '#4E51FE',
                                        data: [
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                            {x: Math.round(Math.random() * 100), y: Math.round(Math.random() * 100), z: 2},
                                        ]
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                        }
                    },
                    line: {
                        XComponent: {
                            data: {
                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                                datasets: [
                                    {
                                        label: 'XComponent',
                                        backgroundColor: '#4E51FE',
                                        borderColor: '#4E51FE',
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        data: [
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                        ]
                                    },
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                        },
                        YComponent: {
                            data: {
                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                                datasets: [
                                    {
                                        label: 'YComponent',
                                        backgroundColor: '#4E51FE',
                                        borderColor: '#4E51FE',
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        data: [
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                        ]
                                    },
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                        },
                        ZComponent: {
                            data: {
                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                                datasets: [
                                    {
                                        label: 'ZComponent',
                                        backgroundColor: '#4E51FE',
                                        borderColor: '#4E51FE',
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        data: [
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                        ]
                                    },
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                        },
                        AbsoluteComponent: {
                            data: {
                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                                datasets: [
                                    {
                                        label: 'AbsoluteComponent',
                                        backgroundColor: '#4E51FE',
                                        borderColor: '#4E51FE',
                                        cubicInterpolationMode: 'monotone',
                                        tension: 0.4,
                                        data: [
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                            Math.round(Math.random() * 100),
                                        ]
                                    },
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                        }
                    },
                    pie: {
                        XComponent: {
                            data: {
                                labels: ['XComponent'],
                                datasets: [
                                    {
                                        backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16', '#658975'],
                                        data: [
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                        ]
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                        },
                        YComponent: {
                            data: {
                                labels: ['YComponent'],
                                datasets: [
                                    {
                                        backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16', '#658975'],
                                        data: [
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                        ]
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                        },
                        ZComponent: {
                            data: {
                                labels: ['ZComponent'],
                                datasets: [
                                    {
                                        backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16', '#658975'],
                                        data: [
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                        ]
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                        },
                        AbsoluteComponent: {
                            data: {
                                labels: ['AbsoluteComponent'],
                                datasets: [
                                    {
                                        backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16', '#658975'],
                                        data: [
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                            Math.round(Math.random() * 10),
                                        ]
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                        },
                    }
                },
            };
        },
    };
</script>

<style></style>
