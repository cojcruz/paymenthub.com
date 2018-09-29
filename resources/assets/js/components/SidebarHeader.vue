<template>
	<div class="sidebar-header flex clearfix">
		<slot name="avatar"></slot>
		<div class="details inline-block">
			<slot name="user"></slot>
			<slot name="company"></slot>
		</div>
	</div>
</template> 
<script>
    export default {
        mounted() {
            
        }
    }
</script>