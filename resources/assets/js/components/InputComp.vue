<template>
	<div class="box input-wrapper" :id="'input_' + this.index">
			
		<div class="input-header">
			<h6 class="float-left" v-text="inputName"></h6> 
			<button class="close"><i class="fas fa-times"></i></button>
		</div>
		
		<div class="input-body d-flex">
			<div class="input-container w-1/3">
				<label class="d-block m-0">Field Label</label>
				<input 
					v-if="item.type === 'text' || item.type === 'email'" 
					:id="item.id" 
					:class="item.class"
					:type="item.type" 
					:name="item.name" 
					:placeholder="item.placeholder != null ? item.placeholder : 'Untitled'">
				</input>
				
				<textarea 
					v-if="item.type === 'textarea'" 
					:id="item.id" 
					:class="item.class"
					:type="item.type" 
					:name="item.name">{{ item.placeholder }}
				</textarea>
				
				<select 
					v-if="item.type === 'select' || item.type === 'multiselect'" 
					:id="item.id" 
					:class="item.class"
					:name="item.name" :multiple="item.type === 'multiselect' ? true : false">
					
					<option 
						v-for="option in inputOptions" 
						:value="option.value" :selected="option.selected ? true : false">{{ option.label }}</option>
						
				</select>
				
				<div class="cbrdo-wrapper" 
					v-if="item.type === 'radio' || item.type === 'checkbox'"
					v-for="(option, index) in inputOptions">
					<input :type="item.type" :value="option.value" v-model="option.selected">{{ option.label }}</input>
				</div>			
				
				<div class="option required">
					<input type="checkbox" v-model="item.required" /> <label @click="item.required = !item.required" :class="{ 'font-bold' : item.required }">Required</label> 
				</div>
			</div>
		
			<div class="input-options w-2/3">
				<div class="additional-options">
					<div class="input-options d-flex">
						<div class="option w-1/4">
							<label>ID</label> <input type="text" v-model="item.id" />
						</div>
						<div class="option w-1/4">
							<label>Class</label> <input type="text" v-model="item.class" />
						</div>
						<div class="option w-1/4" v-if="item.type == 'text' || item.type == 'email'">
							<label >Placeholder</label> <input type="text" v-model="item.placeholder" />
						</div>
					</div>
				</div>
				<div class="additional-options" v-if="item.type === 'select' || item.type === 'radio' || item.type === 'checkbox' || item.type == 'multiselect'">
					<div class="select-options d-flex" v-for="(option, index) in inputOptions">
						<div class="selected col ">
							<input :id="'input_' + this.index" :name="'input_' + this.index" type="radio" v-model="option.selected" />
						</div>
						<div class="item col">
							<div class="label-col w-1/2">
								<label>Label</label><input type="text" v-model="option.label" /> 
							</div>
							<div class="value-col w-1/2">
								<label>Value</label><input type="text" v-model="option.value" /> 
							</div>
						</div>
						<div class="action col">
							<button @click="removeOption(index)" class="btn-default btn remove">
								<i class="fas fa-minus-circle"></i> Remove 
							</button>							
						</div>
					</div>
					<div class="add-new-input d-flex">	
						<div class="label-col w-1/3">
							
							<label>Label</label><input type="text" v-model="inputLabel"/> 
							
							<div class="warn"></div>
							
						</div>
						<div class="value-col w-1/3 ">
							
							<label>Value</label><input type="text" v-model="inputVal" /> 
							
							<div class="warn"></div>
							
						</div>
						<div class="add-col w-1/3">
							
							<button 
								@click="addOption( { 'label' : inputLabel, 'value' : inputVal } )" 
								class="btn-default btn">
									<i class="fas fa-plus-circle"></i> Add 
							</button>
							
						</div>
					</div>	
				</div>	
			</div>	
		</div>
		<div class="input-footer">
			<div class="actions text-right">
				
				<button class="btn btn-default input-save">Save</button> 
				
				<button @click="removeThis" class="btn btn-default input-cancel">Cancel</button>
				
			</div>
		</div>
	</div>
</template>

<script>

export default {
	data: function() {
		return {
			
			options		: [],
			inputLabel	: null,
			inputVal		: null,
			errs			: [],
			
		}
	},
	computed: {		
		
		inputOptions() {
			this.options = this.item.options;
			
			return this.options;
		},
		
		inputName() {
			let inputName = '';
			
			switch ( this.item.type ) {
				
				case 'text':
					inputName = 'Single Line Text';
				break;
				case 'email':
					inputName = 'Email';
				break;
				case 'textarea':
					inputName = 'Paragraph Text';
				break;
				case 'select':
					inputName = 'Drop Down';
				break;
				case 'radio':
					inputName = 'Radio Buttons';
				break;
				case 'checkbox':
					inputName = 'Checkboxes';
				break;
				case 'text':
					inputName = 'Single Line Text';
				break;
				case 'multiselect':
					inputName = 'Multi Select';
				break;				
				default: 
					inputName = "Field Label";
				break;
			}
			
			return inputName;
		}
		
	},
	
	props: ['index', 'item'],
	
	methods: {
		
		removeThis() {					
			this.$emit('remove-input', this.index);
		},
		
		addOption( data ) {
			
			let label = data.label;
			let value = data.value == null ? data.label: data.value;
						
			this.item.options.push( { 'label' : data.label , 'value' : value , 'selected' : false });
			
			this.inputLabel	= null;
			this.inputVal 		= null;
			
		},
		
		removeOption( index ) {
			this.item.options.splice( index , 1 );
		}, 
	},
	
	mounted() {
		
	}
}
</script>