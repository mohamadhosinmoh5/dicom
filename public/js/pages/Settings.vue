<template>
    <div class="settings-page grid grid-cols-[45%_50%] gap-[5%] p-[10px]">
        <div class="grid gap-[20px] h-max">
            <div>
                <div class="title flex items-center gap-[10px]">
                    <span class="min-w-max text-[14px]">Histogram Default</span>
                    <hr class="bg-[#4E51FE] border-none h-[1px] w-full">
                </div>
                <div class="container flex items-center gap-[50px] px-[20px] py-[5px] text-[14px]">
                    <div class="flex items-center gap-[10px]">
                        <span>numberof bins: </span>
                        <input type="number" value="50.00" class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md">
                        
                    </div>
                    <div class="flex items-center gap-[10px]">
                        <span>numberof bins: </span>
                        <input type="number" value="50.00" class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md">
                        <span>mm</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="title flex items-center gap-[10px]">
                    <span class="min-w-max text-[14px]">License</span>
                    <hr class="bg-[#4E51FE] border-none h-[1px] w-full">
                </div>
                <div class="container flex flex-col gap-[10px] px-[20px] py-[5px] text-[14px]">
                    <span>Licence: 65f46ds5f6sd51f651ds65f</span>
                    <span>version: 4.2.5.6</span>
                </div>
            </div>
            <div>
                <div class="title flex items-center gap-[10px]">
                    <span class="min-w-max text-[14px]">Update Settings</span>
                    <hr class="bg-[#4E51FE] border-none h-[1px] w-full">
                </div>
                <div class="container flex flex-col gap-[10px] px-[20px] py-[5px] text-[14px]">
                    <div class="flex items-center gap-[10px]">
                        <input type="checkbox" checked="true">
                        <span>Enable Check Update </span>
                    </div>
                    <div class="flex items-center gap-[10px]">
                        <span>check every: </span>
                        <input type="number" value="10" class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md">
                        <span>days</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="title flex items-center gap-[10px]">
                    <span class="min-w-max text-[14px]">EngineConfigaration</span>
                    <hr class="bg-[#4E51FE] border-none h-[1px] w-full">
                </div>
                <div class="container flex justify-between gap-[10px] px-[20px] py-[5px] text-[14px]">
                    <div class="flex items-center gap-[10px]">
                        <span>Detection refirement</span>
                        <div class="flex items-center gap-[2px]">
                            <input type="checkbox" checked="true">
                            <span>MR </span>
                        </div>
                        <div class="flex items-center gap-[2px]">
                            <input type="checkbox" checked="true">
                            <span>CT </span>
                        </div>
                        <div class="flex items-center gap-[2px]">
                            <input type="checkbox" checked="true">
                            <span>Fiducial </span>
                        </div>
                        <div class="flex items-center gap-[2px]">
                            <input type="checkbox" checked="true">
                            <span>Platform </span>
                        </div>
                    </div>
                        <div class="flex items-center gap-[2px]">
                            <span>Geometic </span>
                            <input type="checkbox" checked="false">
                        </div>
                </div>
            </div>
        </div>
        <div class="grid gap-[20px] h-max">
            <div>
                <div class="title flex items-center gap-[10px]">
                    <span class="min-w-max text-[14px]">Treshhold</span>
                    <hr class="bg-[#4E51FE] border-none h-[1px] w-full">
                </div>
                <div class="container flex flex-col gap-[10px] px-[20px] py-[5px] text-[14px]">
                    <div class="flex items-center gap-[10px]">
                        <span>fall if more than distortion above: </span>
                        <input type="number" value="2.25" class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md">
                        <span>mm.</span>
                    </div>
                    <div class="flex items-center gap-[10px]">
                        <span>fall if mean is distortion above: </span>
                        <input type="number" value="2.25" class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md">
                        <span>mm.</span>
                    </div>
                    <div class="flex items-center gap-[10px]">
                        <span>fall if mean is distortion below: </span>
                        <input type="number" value="2.25" class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md">
                        <span>mm.</span>
                    </div>
                    <div class="flex items-center gap-[10px]">
                        <span>fall if phantom distortion is above: </span>
                        <input type="number" value="2.25" class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md">
                        <span>mm.</span>
                    </div>
                    <div class="flex items-center gap-[10px]">
                        <span>flag results with platform above: </span>
                        <input type="number" value="2.25" class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md">
                        <span>mm.</span>
                    </div>
                    <div class="flex items-center gap-[10px]">
                        <span>flag results with platform below: </span>
                        <input type="number" value="2.25" class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md">
                        <span>mm.</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="title flex items-center gap-[10px]">
                    <span class="min-w-max text-[14px]">Heat Map</span>
                    <hr class="bg-[#4E51FE] border-none h-[1px] w-full">
                </div>
                <div class="container flex flex-col gap-[10px] px-[20px] py-[5px] text-[14px]">

                    <div class="flex items-center gap-[10px]">
                        <span>scalar bar lower limit: </span>
                        <input type="number" value="2.25" class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md">
                        <span>mm.</span>
                    </div>
                    <div class="flex items-center gap-[10px]">
                        <span>scalar bar upper limit: </span>
                        <input type="number" value="2.25" class="w-[70px] border border-solid border-[#4E51FE] pl-2 rounded-md">
                        <span>mm.</span>
                    </div>
                </div>
            </div>
            <div class="actions-btns flex items-center justify-center gap-[5px] mt-[20px]">
                <Button text="Save" />
                <Button text="Cancel" />
            </div>
        </div>
    </div>
</template>

<script>
    import Button from '../components/Button.vue';
    export default {
        components: {
            Button,
        }
    }
</script>

<style>

</style>