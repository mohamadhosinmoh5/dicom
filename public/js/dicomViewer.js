let input = document.querySelector('#wowwow');

input.addEventListener('change', function ()
{
    if (openMPR2)
        exitGet3Axis('');
    importImages(this.files);
});