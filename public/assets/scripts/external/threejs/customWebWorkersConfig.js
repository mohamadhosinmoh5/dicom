var assetsUrl = document.getElementById('assets').value;
function getBlobUrl(url) {
    const baseUrl = assetsUrl || window.webkitURL;
    const blob = new Blob([`importScripts('${url}')`], {
        type: 'application/javascript',
    });

    return baseUrl.createObjectURL(blob);
}

function UrlExists(url) {
    const http = new XMLHttpRequest();

    http.open('HEAD', url, false);
    http.send();

    return http.status !== 404;
}

let webWorkerTaskPath =
// `${window.location.protocol}//${window.location.host}/bluelight/scripts/external/threejs/convolveTask.js`;
`${assetsUrl}/scripts/external/threejs/convolveTask.js`;

if (!UrlExists(webWorkerTaskPath)) {
    webWorkerTaskPath = "https://rawgit.com/cornerstonejs/cornerstoneWADOImageLoader/master/examples/customWebWorkerTask/convolveTask.js";
}

window.customWebWorkerConfig = {
    maxWebWorkers: navigator.hardwareConcurrency || 1,
    startWebWorkersOnDemand: true,
    webWorkerTaskPaths: [webWorkerTaskPath],
    taskConfiguration: {
        decodeTask: {
            initializeCodecsOnStartup: false,
        },
    },
};