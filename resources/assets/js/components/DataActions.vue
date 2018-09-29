<template>
	<div class="data-action">
		<button class="data-label" @click="toggleActionMenu"><slot name="label">Action</slot> <i class="fas fa-caret-down"></i></button>
		<div class="dropdown" :class="{ 'show' : menu, 'hidden' : !menu }">
			<a :href="'#?id=' + itemid" v-for="action in actions" @click="toggleActionMenu">{{ action }}</a>
		</div>
	</div>
</template>

<script>
export default { 
	data: function() {
		
		return {
			menu : false
		}
		
	},
	
	props: ['itemid','actions','toggleMenu'],
	
	methods: {
		toggleActionMenu() {
			if ( this.menu) {
				this.menu = false;
			} else {
				this.menu = true;
			}
		}
	},
	
	mounted() {
		
	}
}
</script>