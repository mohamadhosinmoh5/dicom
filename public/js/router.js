import {createRouter, createWebHistory} from "vue-router";

import DicomViewer from './pages/DicomViewer.vue';
import ThreeDViewer from './pages/ThreeDViewer.vue';
import CompareData from './pages/CompareData.vue';
import GenerateReport from './pages/GenerateReport.vue';
import TableGraph from './pages/TableGraph.vue';
import Settings from './pages/Settings.vue';
import Login from './pages/Login.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path: '/dicom/public', redirect: '/dicom/public/dicom-viewer'},
        {path: '/dicom/public/dicom-viewer', component: DicomViewer},
        {path: '/dicom/public/three-d-viewer', component: ThreeDViewer},
        {path: '/dicom/public/compare-data', component: CompareData},
        {path: '/dicom/public/generate-report', component: GenerateReport},
        {path: '/dicom/public/table-graph', component: TableGraph},
        {path: '/dicom/public/settings', component: Settings},
        {path: '/dicom/public/log-in', component: Login},
    ],
});

export default router;