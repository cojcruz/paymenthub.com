<template>
	<div class="sidebar-nav">		
		<ul class="nav">			
			<li class="nav-item" v-for="item in items" :class="{ 'is-active' : active === item.link }">
				<a :href="item.link" class="block"><i class="fas" :class="item.icon"></i> {{ item.label }} <span class="unread notification" v-if="item.label === 'Messages'">{{ unread }}</span></a>
			</li>			
		</ul>
	</div>
</template>

<script>
    export default {
		props: ['items','active','unread'] 
    }
</script> 