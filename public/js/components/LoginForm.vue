<template>
	<div class="login-form-segment w-full grid gap-[30px]">
		<div class="login-ways relative w-full flex items-center justify-center gap-[5%]">
			<button
				class="text-[#4e51fe] text-[15px] tracking-wide font-bold hover:text-blue-700 p-[10px]"
				:class="{
					'border-b-2 border-solid border-[#4e51fe]': loginWay === 'email',
				}"
				@click="activeUsername"
			>
				By Username
			</button>
			<span class="text-[#4e51fe]">or</span>
			<button
				class="text-[#4e51fe] text-[15px] tracking-wide font-bold p-[10px] opacity-60"
				:class="{
					'border-b-2 border-solid border-[#4e51fe]': loginWay === 'sms',
				}"
				@click="activeSMS"
				disabled="true"
			>
				By SMS
			</button>
		</div>
		<form
			class="formE1 min-w-[300px] w-[50%] flex flex-col gap-[50px] mx-auto"
			@submit.prevent="submit"
		>
			<div
				class="email-way grid gap-[40px] relative"
				v-show="loginWay === 'email'"
			>
				<div class="email-input-box relative">
					<input
						type="text"
						placeholder="Enter Your Username"
						v-model="email.value"
						class="w-full text-[#1e1b4b] border-b-2 border-b-[#91B3FA] placeholder-[#A18F8F] placeholder-opacity-100 bg-transparent focus:outline-none p-[5px]"
						:class="{
							'!border-b-[#E74A3B] placeholder-[#E74A3B]': email.invalid,
						}"
						@focus="email.invalid = false"
					/>
				</div>
				<div class="password-input-box">
					<input
						type="password"
						placeholder="Enter Your password"
						v-model="password.value"
						class="w-full text-[#1e1b4b] border-b-2 border-b-[#91B3FA] placeholder-[#A18F8F] placeholder-opacity-100 bg-transparent focus:outline-none p-[5px]"
						:class="{
							'!border-b-[#E74A3B] placeholder-[#E74A3B]': password.invalid,
						}"
						@focus="password.invalid = false"
					/>
				</div>
				<div class="forget-remember absolute -bottom-[30px] flex justify-between gap-[10px] w-full">
					<label
						for="remember"
						class="remember flex gap-0.5 text-[13px] text-[#7f7070] font-normal cursor-pointer"
					>
						<input
							type="checkbox"
							id="remember"
							class="remember"
							v-model="rememberMe"
						/>
						Remember me
					</label>
					<a
						href="#"
						class="forget text-[13px] text-[#4E51FE] font-medium hover:text-blue-700"
						>Forget Password?
					</a>
				</div>
			</div>

			<div
				class="sms-way grid gap-[40px]"
				v-show="loginWay === 'sms'"
			>
				<div class="sms-input-box">
					<input
						type="text"
						placeholder="Enter Your mobile"
						v-model="sms.value"
						class="w-full text-[#1e1b4b] border-b-2 border-b-[#91B3FA] placeholder-[#A18F8F] placeholder-opacity-100 bg-transparent focus:outline-none p-[5px]"
						:class="{
							'!border-b-[#E74A3B] placeholder-[#E74A3B]': sms.invalid,
						}"
						@focus="sms.invalid = false"
					/>
				</div>
				<div class="password-input-box">
					<input
						type="password"
						placeholder="Enter Your SMS Password"
						v-model="smsPass.value"
						class="w-full text-[#1e1b4b] border-b-2 border-b-[#91B3FA] placeholder-[#A18F8F] placeholder-opacity-100 bg-transparent focus:outline-none p-[5px]"
						:class="{
							'!border-b-[#E74A3B] placeholder-[#E74A3B]': smsPass.invalid,
						}"
						@focus="smsPass.invalid = false"
					/>
				</div>
			</div>

			<button
				class="login mt-[30px] bg-[#7D97F4] text-[#fff] border-2 border-solid border-[#7D97F4] rounded-md font-bold text-[15px] w-max pt-[10px] pb-[10px] pr-[30px] pl-[30px] m-auto hover:bg-blue-500 hover:border-blue-500"
			>
				LOGIN
			</button>
		</form>
	</div>
</template>

<script>
	import axios from 'axios';
	export default {
		data() {
			return {
				loginWay: 'email',
				email: {
					value: localStorage.getItem('gPhantomUsername'),
					invalid: false,
				},
				password: {
					value: '',
					invalid: false,
				},
				sms: {
					value: '',
					invalid: false,
				},
				smsPass: {
					value: '',
					invalid: false,
				},
				rememberMe: true,
				csrf: '',
			};
		},
		methods: {
			activeUsername() {
				this.loginWay = 'email';
			},
			activeSMS() {
				this.loginWay = 'sms';
			},
			submit() {
				if (this.loginWay === 'email') {
					if (this.email.value === '') this.email.invalid = true;
					if (this.password.value === '') this.password.invalid = true;
					if (this.email.value === '' || this.password.value === '') return;
				} else if (this.loginWay === 'sms') {
					if (this.sms.value === '') this.sms.invalid = true;
					if (this.smsPass.value === '') this.smsPass.invalid = true;
					if (this.sms.value === '' || this.smsPass.value === '') return;
				}

				let params = {};
				if (this.loginWay === 'email')
					params = {
						email: this.email.value,
						password: this.password.value,
					};
				else if (this.loginWay === 'sms')
					params = {
						sms: this.sms.value,
						smsPass: this.smsPass.value,
					};

				axios
					.post('http://localhost/dicom/public/login', { ...params, _token: this.csrf })
					.then(response => {
						if (response.data.error) {
							// alert('you are already logged in');
							this.$router.push('/dicom/public/image-viewer');
						}
						if (response.data.data) {
							if (this.rememberMe && this.loginWay === 'email')
								localStorage.setItem('gPhantomUsername', this.email.value);
							this.$router.push('/dicom/public/image-viewer');
						}
					})
					.catch(error => {
						alert(error.message);
					});
			},
		},
		mounted() {
			axios.get('http://localhost/dicom/public/csrf').then(res => {
				this.csrf = res.data;
			});
		},
	};
</script>
