@extends('layouts.app')

@section('content')
<div id="mainbody" class="w-full h-full mx-auto">
	<div class="container">
		<div class="row clear text-right p-0">
			<button class="create form" @click="createForm">Create New <i class="fas fa-plus"></i></button>
		</div>
		<div class="row form-list">

			<div class="sub-header d-flex">
				<h4 class="inline-block">Payment Forms</h4>
				
				<div class="data-search inline-block">
					<input type="text" placeholder="Search"> <i class="fas fa-sync-alt"></i>
				</div>
			</div>
			
			<form-list></form-list>
		</div>
	</div>
	</div>
</div>
@endsection
