@extends('layouts.app')

@section('content')
<div id="mainbody" class="w-full h-full mx-auto">
	<div class="container">
		<div class="row clear text-right p-0 d-block">
			
			<button class="save form" @click="saveForm">Save <i class="far fa-save"></i></button>
		
			<button class="cancel form" @click="cancelForm">Cancel <i class="fas fa-ban"></i></button>
		
		</div>
		<div class="row">
			<div class="col">
				<div class="formTitle">
					<h4  @mouseover="showEditbtn" @mouseout="showEditbtn" v-if="titleEdit == false" @click="editFormTitle" >@{{ formName }} <a v-if="showEditButton">click to edit</a></h4>				
					<div class="editFormTitle" v-if="titleEdit == true">
						<input type="text" v-model="formName" @keyup.enter="closeTitleEdit" @blur="closeTitleEdit"/>
					</div>
				</div>
				<div class="formBody d-flex">
									
					<div class="form_wrapper w-4/5">						
						<inputcomp 
							@remove-input="deletethis" 
							v-for="(item , index) in formInputs" 
							:key="index" 
							:index="index" 
							:item="item">
						</inputcomp>						
					</div>
					
					<div class="inputSelection w-1/5">
						<button 
							class="btn addInput" 
							@click="insertDOM(
								{ 
									'type'			: 'text' 
								})"  
							v-text="'Single Line Text'"></button>
							
						<button 
							class="btn addInput" 
							@click="insertDOM(
								{ 
									'type'			: 'email' 
								})"  
							v-text="'Email'"></button>
							
						<button 
							class="btn addInput" 
							@click="insertDOM(
								{ 
									'type'			: 'textarea' 
								})"  
							v-text="'Paragraph Text'"></button>
							
						<button 
							class="btn addInput" 
							@click="insertDOM(
								{ 
									'type'			: 'select', 
									'options' 	: [ 
														{ 
															'label' 		: 'Sample Label', 
															'value' 		: 'Sample Value',
															'selected' 	: false,
														} 
													  ],
								})" 
								v-text="'Drop Down'"></button>
								
							<button 
							class="btn addInput" 
							@click="insertDOM(
								{ 
									'type'			: 'multiselect', 
									'options' 	: [ 
														{ 
															'label' 		: 'Sample Label', 
															'value' 		: 'Sample Value',
															'selected' 	: false,
														} 
													  ],
								})" 
								v-text="'Multi Select'"></button>
								
						<button 
							class="btn addInput" 
							@click="insertDOM(
								{ 
									'type'			: 'radio', 
									'options' 	: [ 
														{ 
															'label' 		: 'Sample Label', 
															'value' 		: 'Sample Value',
															'selected' 	: false,
														} 
													  ],
								})" 
								v-text="'Radio Buttons'"></button>
								
						<button 
							class="btn addInput" 
							@click="insertDOM(
								{ 
									'type'			: 'checkbox', 
									'options' 	: [ 
														{ 
															'label' : 'Sample Label', 
															'value' : 'Sample Value' 
														} 
													  ],
								})" 
								v-text="'Checkboxes'"></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
