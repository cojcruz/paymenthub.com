<template>
	<div class="data-table">
		<div class="data-row header d-flex">
			<div class="data-col">ID<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
			<div class="data-col">Form Name<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
			<div class="data-col">Date Created<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
			<div class="data-col">Responses<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
			<div class="data-col">Entries<i class="fas fa-sort-amount-down"></i><i class="fas fa-sort-amount-up hidden"></i></div>
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
				
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ['items'],	
}
</script>