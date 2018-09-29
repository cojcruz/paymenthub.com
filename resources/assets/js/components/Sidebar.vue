<template>
	<div id="sidebar" class="flex-initial collapse" :class="{ 'show' : show }">
		<slot></slot>
	</div>
</template>

<script>
	export default {
		props: ['show']
		
	}
</script>