<template>
	<div class="payment-summary" :class="scope">
		<div class="icon inline-block" :class="scope"><i class="fas fa-money-bill-wave"></i></div>
		<div class="payment-details inline-block">
			<h5>{{ details[0].label }}</h5>
			
			<div class="amount">
				<span class="currency-sym"><sup>{{ details[0].currency }}</sup></span>{{ details[0].amount | formatNumber }}
			</div>						
		</div>
	</div>
</template>
<script>
export default {
	props : ['details','scope']
}
</script>