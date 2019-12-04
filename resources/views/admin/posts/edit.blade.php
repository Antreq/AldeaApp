@extends('admin.layout')

@section('header')
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editor</h1> Crear nueva publicación
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Inicio</a></li>
              <li class="breadcrumb-item"><a href="">Posts</a></li>
              <li class="breadcrumb-item active">Crear</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

@stop

@section('content')

@if ($post->photos->count() >=1)
<div class="col-md-12">
	<div>
		<div class="card-primary">
			<div class="card-body">
				<div class="row">
	            	@foreach($post->photos as $photo)
		            	<form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
			            	{{ csrf_field() }} {{ method_field('DELETE') }} 
			            	<div class="col-md-3">
			            		<button class="btn btn-danger btn-xs" style="position: absolute">
			            			<i class="fa fa-times"></i>
			            		</button>
			            		<img class="img-responsive" src="/storage/{{$photo->url }}" width="150px" height="75px">
			            	</div>
		            	</form>
	            	@endforeach
	            </div>
			</div>
		</div>
	</div>	
</div>
@endif

<form method="POST" action=" {{route('admin.posts.update', $post)}} ">
	{{csrf_field() }} {{method_field('PUT')}}

<div class="row">

	<div class="col-md-8">

		<div class="card card-primary">
	            <div class="card-body">

	            	<div class="form-group" >
	            		<label {{ $errors->has('title') ? 'class=text-danger' : ''}} >Título de la publicación</label>
	            		<input name="title" placeholder="Ingresa aquí el título de tu publicación" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" value="{{ old('title', $post->title )}}" >
	            		{!!$errors -> first('title', '<span class="text-danger"> :message </span>')!!}
	            	</div>

	            	<div class="card-tools">
	                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	                  <i class="fas fa-minus"></i></button>
	                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
	                        title="Remove">
	                  <i class="fas fa-times"></i></button>
	              	</div>

	            	<div class="form-group">
	            		<label {{ $errors->has('body') ? 'class=text-danger' : ''}}>Contenido de la publicación</label>
	            		<textarea class="textarea" placeholder="Ingresa el contenido de tu publicación" name="body" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('body', $post->body)}}</textarea>
	            		{!!$errors -> first('body', '<span class="text-danger"> :message </span>')!!}
	            	</div>

	            </div>
	            	    </div>

    </div>

    <div class="col-md-4">
    	<div class="card card-primary">
			<div class="card-body">
				<div class="form-group">
                  <label {{ $errors->has('published_at') ? 'class=text-danger' : ''}}>Fecha de publicación:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input name="published_at" type="text" class="form-control {{ $errors->has('published_at') ? 'is-invalid' : ''}}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value={{old('published_at', $post->published_at  ? $post->published_at->format('d/m/Y'): '')}}>
                  </div>
                  {!!$errors -> first('published_at', '<span class="text-danger"> :message </span>')!!}
                  <!-- /.input group -->
                </div>
                <div class="form-group">
	            	<label {{ $errors->has('category') ? 'class=text-danger' : ''}}>Categorías</label>
	            	<select class="form-control {{ $errors->has('category') ? 'is-invalid' : ''}}" name="category">
	            		<option value="">Selecciona una categoría</option>
	            		@foreach($categories as $category)
	            			<option {{old('category', $post->category ? $post->category->id : '') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
	            		@endforeach
	            	</select>
	            	{!!$errors -> first('category', '<span class="text-danger"> :message </span>')!!}
	        	</div>

	        	<div calss="form-group"> 
	        		<label {{ $errors->has('tags') ? 'class=text-danger' : ''}}>Seleccióna un tag</label>
	        		<select name="tags[]" class="select2 {{ $errors->has('tags') ? 'is-invalid' : ''}}" multiple="multiple" data-placeholder="Selecciona un tag" style="width: 100%;">
                    @foreach($tags as $tag)
                    	<option {{collect( old( 'tags', $post->tags->pluck('id') ) )->contains($tag->id)?'selected':''}} value="{{$tag->id}}">
                    		{{$tag->name}}
                    	</option>
                    @endforeach
                  </select>
                  {!!$errors -> first('tags', '<span class="text-danger"> :message </span><br>')!!}
                  <br>
	        	</div>

				<div class="form-group">
	            	<label {{ $errors->has('excerpt') ? 'class=text-danger' : ''}}>Extracto</label>
	            	<textarea name="excerpt" placeholder="Ingresa un abstracto de tu publicación" class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : ''}}">{{old('excerpt', $post->excerpt)}}</textarea>
	            	{!!$errors -> first('excerpt', '<span class="text-danger"> :message </span>')!!}
	        	</div>
	        	<div class="form-group">
	        		<div class="dropzone"></div>
	        	</div>
	        	<div class="form-group">
	            	<button class="btn btn-primary btn-block" type="submit">Guardar publicación</button>
	        	</div>
		    </div>

		</div>
    </div>
    
</div>
</form>



@stop

@push('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
	<link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
	
@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script>
	var myDropzone = new Dropzone('.dropzone', {
		url: '/admin/posts/{{$post->url}}/photos',
		paramName: 'photo',
		acceptedFiles: 'image/*',
		maxFilesize: 2,
		maxFiles: 1,
		addRemoveLinks: true,
		headers: {
			'X-CSRF-TOKEN': '{{csrf_token()}}'
		},
		dictDefaultMessage: 'Arrastra una imagen aquí'
	});

	myDropzone.on('error', function(file,res){
		var msg = res.photo[0];
		$('.dz-error-message:last > span').text(msg);
	});

	Dropzone.autoDiscover=false;

</script>

<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script>
	$(function () {
		$('.select2').select2()
	})
</script>


<!-- Summernote -->
<script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script src="/adminlte/plugins/moment/moment.min.js"></script>
<script src="/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script>
	$(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
    	tags: true
    })
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    
  })
</script>

@endpush