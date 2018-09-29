<template>
	<div class="searchform collapse inline-block" :class="{ 'show' : show }">
		<input name="search" type="text">
	</div>
</template>

<script>
	export default {
		props: ['show']
	}
</script>