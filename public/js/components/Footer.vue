<template>
    <footer
        class="h-[20vh] grid grid-rows-[1fr_20px] gap-[2px] px-[3%] py-[1%]"
    >
        <div class="overflow-auto">
            <Table :headers="table.headers" :data="table.data" />
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
                headers: [
                    {
                        name : 'checkbox',
                        label : ''
                    },
                    {
                        name: 'Reuslts',
                        label : 'Reuslts',
                    },
                    {
                        name: 'Imagename',
                        label : 'Imagename',
                    },
                    {
                        name: 'modality',
                        label : 'modality',
                    },
                    {
                        name: 'GammaPlanTransform',
                        label : 'GammaPlan Transform',
                    },
                    {
                        name: 'Series',
                        label : 'Series',
                    },
                    {
                        name: 'SeriesDate',
                        label : 'Series Date',
                    },
                    {
                        name: 'Sequence',
                        label : 'Sequence',
                    },
                    {
                        name: 'Bandwidth',
                        label : 'Bandwidth(Hz/pixel)',
                    },
                    {
                        name: 'Encoding',
                        label : 'Encoding',
                    },
                    {
                        name: 'Study',
                        label : 'Study',
                    },
                    {
                        name: 'Annotation',
                        label : 'Annotation',
                    },
                    {
                        name: 'Manufacture',
                        label : 'Manufacture',
                    },
                    {
                        name: 'Model',
                        label : 'Model',
                    },
                    {
                        name: 'Engineversion',
                        label : 'Engine version',
                    },
                    {
                        name: 'NumberofSlices',
                        label : 'Number of Slices',
                    },
                    {
                        name: 'SeriesUID',
                        label : 'Series UID',
                    },
                    {
                        name: 'StationName',
                        label : 'Station Name',
                    },
                ],
                data: [
                    [
                        'checkbox',
                        'Reuslts',
                        'Imagename',
                        'modality',
                        'GammaPlan Transform',
                        'Series',
                        'Series Date',
                        'Sequence',
                        'Bandwidth(Hz/pixel)',
                        'Encoding',
                        'Study',
                        'Annotation',
                        'Manufacture',
                        'Model',
                        'Engine version',
                        'Number of Slices',
                        'Series UID',
                        'Station Name',
                    ],
                    [
                        'checkbox',
                        'Reuslts',
                        'Imagename',
                        'modality',
                        'GammaPlan Transform',
                        'Series',
                        'Series Date',
                        'Sequence',
                        'Bandwidth(Hz/pixel)',
                        'Encoding',
                        'Study',
                        'Annotation',
                        'Manufacture',
                        'Model',
                        'Engine version',
                        'Number of Slices',
                        'Series UID',
                        'Station Name',
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
