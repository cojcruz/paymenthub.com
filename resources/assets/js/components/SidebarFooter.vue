<template>
	<div class="sidebar-footer">
		<ul class="footer-nav nav mx-auto">
			<li class="nav-item" v-for="item in menuitems">
				<a :href="item.link" class="inline-block">{{ item.label }}</a>
			</li>
		</ul>
	</div>
</template>

<script>
	export default {
		
		props: ['menuitems'],
		
	}
</script>