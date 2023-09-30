<template>
    <div class="loginPage h-screen grid grid-cols-[50%_50%] row-[1/3] col-[1/3]" >
        <div class="logo h-screen bg-gradient-to-r from-[#1C39BB] to-[#7D97F4] relative flex justify-center items-center">
            <img
                src="../../assets/pics/Logo.png"
                alt=""
                class="logoPic w-[100%] h-[100%] object-contain"
            />
        </div>
        <div class="loginForm bg-[#e9f0ff] flex items-center flex-col justify-center relative">
            <svg
                class="absolute top-0 right-[94%] h-full scale-110"
                width="100"
                height="989"
                viewBox="0 0 128 989"
                fill="none"
            >
                <path
                    d="M101.977 -23.8626L127.642 69.9998L127.642 178.02L127.677 397.663L112.193 821.787L102.163 989.079C-10.8339 923.691 16.8271 713.874 54.5702 566.915C82.7509 409.957 -4.69562 232.39 0.96452 150.18C1.39372 44.2662 74.0739 12.5942 103.041 -6.41835L101.977 -23.8626Z"
                    fill="#E9F0FF"
                />
            </svg>
            <LoginForm />
        </div>
    </div>
</template>

<script>
import LoginForm from "../components/LoginForm.vue";
export default {
    components: {
        LoginForm,
    },
    data() {
        return {};
    },
    methods: {},
};
</script>
