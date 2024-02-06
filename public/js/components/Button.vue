<template>
	<button
		class="flex items-center justify-center p-[5px] bg-[#4E51FE] text-white rounded-sm opacity-90 hover:opacity-100 w-max"
		@click="$emit('on-click')"
	>
		<i
			v-if="type === 'icon'"
			class="material-icons material-icons-round"
			>{{ text }}</i
		>
		<span v-else>{{ text }}</span>
	</button>
</template>

<script>
	export default {
		props: {
			type: {
				type: String, // text, icon,
				default: '',
			},
			text: String,
			className: String,
		},
		emits: ['on-click'],
	};
</script>

<style></style>
