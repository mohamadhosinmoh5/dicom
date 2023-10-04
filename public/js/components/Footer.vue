<template>
    <footer
        class="h-[30vh] grid grid-rows-[1fr_20px] gap-[2px] px-[3%] py-[1%]"
    >
        <div class="overflow-auto">
            <Table :headerList="table.headerList" :data="table.data" />
        </div>
        <span class="text-center"> 2023 </span>
    </footer>
</template>

<script>
import Table from "./Table.vue";

export default {
    components: {
        Table,
    },
    data() {
        return {
            table: {
                headerList: [
                    {
                        name: "results",
                        label: "results",
                    },
                    {
                        name: "imageName",
                        label: "image name",
                    },
                    {
                        name: "series",
                        label: "series",
                    },
                    {
                        name: "date",
                        label: "date",
                    },
                    {
                        name: "sequence",
                        label: "sequence",
                    },
                    {
                        name: "encoding",
                        label: "encoding",
                    },
                ],
                data: [
                    [
                        "results1",
                        "image name1",
                        "series1",
                        "date1",
                        "sequence1",
                        "encoding1",
                    ],
                    [
                        "results2",
                        "image name2",
                        "series2",
                        "date2",
                        "sequence2",
                        "encoding2",
                    ],
                ],
            },
        };
    },
    methods: {
        results() {
            alert("wow");
        },
    },
};
</script>

<style></style>
