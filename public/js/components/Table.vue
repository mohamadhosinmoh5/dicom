<template>
    <table class="w-full border border-solid border-[#3E5E9F] rounded-md text-xs">
        <thead>
            <tr>
                <td
                    v-for="header in headers"
                    :key="header.name"
                    class="text-center bg-[#3E5E9F33]"
                    :style="{ textWrap: 'nowrap'}"
                >
                    {{ header.label }}
                </td>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="row in data"
                :key="row"
                class="border-b border-solid border-[#3E5E9F]"
            >
                <td
                    v-for="td in row"
                    :key="td"
                    class="text-center p-[2px] border-l border-solid border-[#3E5E9F] bg-[#F5F5F5]"
                    :style="{ textWrap: 'nowrap'}"
                >
                    {{ td }}
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: ['headers', 'data'],
    // mounted(){
    //     console.log(this.$refs);
    // }
}
</script>

<style>

</style>