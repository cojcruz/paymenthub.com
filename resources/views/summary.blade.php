@extends('layouts.app')

@section('content')
<div id="mainbody" class="w-full h-full mx-auto">
	<div class="container">
		<div class="row report-summaries">
			<report-summary :details="summaryToday" :scope="'today'"></report-summary>
			<report-summary :details="summaryMonth"  :scope="'month'"></report-summary>
			<report-summary :details="summaryYear" :scope="'year'"></report-summary>
		</div>
		<div class="row recent-activity">
			<div class="sub-header d-flex">
				<h4 class="inline-block">Recent Activity</h4>
				
				<div class="data-search inline-block">
					<input type="text" placeholder="Search"> <i class="fas fa-sync-alt"></i>
				</div>
			</div>
			
			<recent-payments :items="recentPayments"></recent-payments>
		</div>
	</div>
</div>
@endsection
