<!-- upload multiple input -->
<div @include('crud::inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
    @include('crud::inc.field_translatable_icon')

	{{-- Show the file name and a "Clear" button on EDIT form. --}}
	@if (isset($field['value']) && count($field['value']))
	<div class="row" id="image_preview">
		<div class="well well-sm file-preview-container">
		@foreach($field['value'] as $key => $file_path)
			<div class='border col-md-2 img-block'>
				<a target="_blank" href="{{ asset('uploads/'.$file_path) }}">
					<img class='img-responsive' src = "{{ asset('uploads/'.$file_path) }}" />
				</a>
				<small>Prioridad</small>
				<input class="prioridad" type="number" value="{{ $key }}"/>
				<a id="{{ $field['name'] }}_{{ $key }}_clear_button" href="#" class="btn btn-default btn-sm pull-right file-clear-button a-clear" title="Clear file" data-filename="{{ $file_path }}"><i class="fa fa-remove"></i></a>
				<div class="clearfix"></div>
			</div>
		@endforeach
		</div>
	</div>	
    @endif
	{{-- Show the file picker on CREATE form. --}}
	<div>
		<input name="{{ $field['name'] }}[]" type="hidden" value="">
		<input
			type="file"
			class="form-control"
			id="{{ $field['name'] }}_file_input"
			name="{{ $field['name'] }}[]"
			onchange="preview_images();"
			value="@if (old(square_brackets_to_dots($field['name']))) old(square_brackets_to_dots($field['name'])) @elseif (isset($field['default'])) $field['default'] @endif"
			@include('crud::inc.field_attributes')
			multiple/>
	</div>
    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif

	<div class="row" id="image_preview"></div>	

</div>

{{-- FIELD EXTRA CSS --}}
<style>
img {
	padding: 4px;
	max-width:150px;"
}
.a-clear {
	float: right;
}
.img-block {
	width: 300px;
	border: 2px solid #999;
	margin: 5px 5px;
	display:inline-block;	
}
.prioridad {
	width:40px;
	text-align: center;
}
</style>

{{-- FIELD EXTRA JS --}}
{{-- push things in the after_scripts section --}}

    @push('crud_fields_scripts')
        <!-- no scripts -->
        <script>
	        $(".file-clear-button").click(function(e) {
	        	e.preventDefault();
	        	var container = $(this).parent().parent();
	        	var parent = $(this).parent();
	        	// remove the filename and button
	        	parent.remove();
	        	// if the file container is empty, remove it
	        	if ($.trim(container.html())=='') {
	        		container.remove();
	        	}
	        	$("<input type='hidden' name='clear_{{ $field['name'] }}[]' value='"+$(this).data('filename')+"'>").insertAfter("#{{ $field['name'] }}_file_input");
	        });

	        $("#{{ $field['name'] }}_file_input").change(function() {
	        	console.log($(this).val());
	        	// remove the hidden input, so that the setXAttribute method is no longer triggered
	        	$(this).next("input[type=hidden]").remove();
	        });

			function preview_images() 
			{
				var total_file = document.getElementById("{{ $field['name'] }}_file_input").files.length;
				var x = document.getElementById("{{ $field['name'] }}_file_input");
				var files = x.files; //contains all files selected

				for(var i=0;i<total_file;i++)
				{
					$('#image_preview').append("<div class='border col-md-2' style='border: 2px solid #999; margin: 2px 2px; font-size:12px;'>"+files[i].name+ //Nombre de la foto
					"<img class='img-responsive' style='padding: 4px;' src='"+URL.createObjectURL(event.target.files[i])+"'></div>"); //Imagen de la foto
				}
			}

        </script>
    @endpush
