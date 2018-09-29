<template>
	<div class="data-table">
		<div class="data-row header d-flex">
			<div class="data-col">Date<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
			<div class="data-col">Client Name<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
			<div class="data-col">Transaction #<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
			<div class="data-col">Source<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
			<div class="data-col">Amount<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
			<div class="data-col">Status<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
			<div class="data-col">Action<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
		</div>
		<div class="data-row d-flex test" v-for="item in items" :class="'payment_' + item.id">
			<div class="data-col">{{ item.date }}</div>
			<div class="data-col">{{ item.client }}</div>
			<div class="data-col">{{ item.tid }}</div>
			<div class="data-col"><i class="fab" :class="'fa-cc-' + item.cardtype"></i>{{ item.cardnum }} {{ item.cardexp }}</div>
			<div class="data-col">{{ item.currency }}{{ Number(item.amount).toFixed(2) }}</div>
			<div class="data-col"><span class="status-box" :class="item.status">{{ item.status }}</span></div>
			<div class="data-col">
				<data-action :itemid="item.id" :actions="[ 'Edit Payment','Charge Card','Refund Payment','Email Payment','Delete Payment' ]" :toggleMenu="false" ><template slot="label">Action</template></data-action>
			</div>
		</div>
	</div>
</template>

<script> 
export default {
	props: ['items'],	
}
</script>