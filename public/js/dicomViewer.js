let input = document.querySelector('#wowwow');

function hello(files)
{
    if (openMPR2)
        exitGet3Axis('');
    return importImages(files);
}

input.addEventListener('change', function ()
{
    // if(openMPR2)
    //     exitGet3Axis('');
    hello(this.files);
});