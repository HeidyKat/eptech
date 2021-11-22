@extends('layouts.admin')
@section('title','Editar Producto')
@section('styles')
  <!-- plugin css for this page -->
  {!! Html::style('melody/vendors/lightgallery/css/lightgallery.css')!!}
  <!--  plugin css for this page -->
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        Edición de Productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edición de Productos </li>
            </ol>
        </nav>
    </div>
    {!! Form::model($product,['route'=>['products.update', $product],'method'=>'PUT', 'files' => true]) !!}
    <div class="row">

                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">


                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre"
                            value="{{old('nombre',$product->nombre)}}"
                            id="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            aria-describedby="helpId"
                            >

                            @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="codigo">Código</label>
                                    <input type="text" name="codigo"
                                    value="{{old('codigo',$product->codigo)}}"
                                    id="codigo"
                                    class="form-control @error('codigo') is-invalid @enderror"> <small id="helpId" class = "text-muted"> Campo opcional</small>

                                    @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio"> Precio </label>
                                    <input type="number" name="precio"
                                    value="{{old('precio',$product->precio)}}"
                                    id="precio"
                                    class="form-control @error('precio') is-invalid @enderror" aria-describedby="helpId" required>

                                    @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="short_description">Extracto</label>
                            <textarea
                            class="form-control @error('short_description') is-invalid @enderror"
                            name="short_description"
                            id="short_description" rows="3">
                            {{old('short_description',$product->short_description)}}
                            </textarea>

                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="long_description">Descripción</label>
                            <textarea
                            class="form-control @error('long_description') is-invalid @enderror"
                            name="long_description"
                            id="long_description" rows="10">
                            {{old('long_description',$product->long_description)}}
                            </textarea>
                            @error('long_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category">Categoría</label>
                                <select class="select2 @error('category') is-invalid @enderror"
                                id="category" name="category"
                                style="width: 100%">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{old('category')}}

                                    >{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                            </div>

                            <div class="form-group">
                                <label for="subcategory_id">Subcategoría</label>
                                <select class="select2 @error('subcategory_id') is-invalid @enderror"
                                 name="subcategory_id"
                                 id="subcategory_id" style="width: 100%">
                                    <option value="" disabled selected>--Seleccione una categoría--</option>
                                </select>
                                @error('subcategory_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                            </div>

                            <div class="form-group">
                                <label for="tags">Etiquetas</label>
                                <select class="select2" name="tags[]" id="tags" style="width: 100%" multiple>
                                @foreach ($tags as $tag)
                                <option value = "{{$tag->id}}"

                                {{collect(old('tags',$product->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}}

                                >{{$tag->name}}</option>
                                @endforeach

                                </select>
                            </div>
                            <div>
                                <div class="form-group">
                                <h4 class="card-title">Subir Imágenes</h4>
                                <div class="file-upload-wrapper">
                                    <div id="fileuploader">Subir</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Imágenes del producto</h4>
                    <input type="file" name="images[]" class="dropify" multiple/>
                    </div>
                    </div>
                </div>
            </div> -->

            <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Galería de Imágenes</h4>
                  <div id="lightgallery" class="row lightGallery">
                      @foreach($product->images as $image)
                      <a href="{{$image->url}}" class="image-tile"><img src="{{$image->url}}" alt="image small"></a>
                      @endforeach


                  </div>
                </div>
              </div>
            </div>
          </div>
            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{route('products.index')}}" class="btn btn-light ">
                            Cancelar
                        </a>
            {!! Form::close() !!}

</div>

@endsection
@section('scripts')
<!-- {!! Html::script('melody/js/jquery-file-upload.js')!!} -->
    <!-- plugin js for this page -->
    {!! Html::script('melody/vendors/lightgallery/js/lightgallery-all.min.js')!!}
    <!-- end plugin js for this page -->

    <!-- Custom js for this page-->
    {!! Html::script('melody/js/light-gallery.js')!!}
    <!-- End custom js for this page-->

{!! Html::script('melody/js/dropify.js')!!}
{!! Html::script('melody/js/data-table.js')!!}
{!! Html::script('ckeditor/ckeditor.js')!!}
<script>
    CKEDITOR.replace('long_description');

</script>
<script>
  $(document).ready(function() {
    $('#category').select2();
    $('#subcategory_id').select2();
    $('#tags').select2();
});
</script>

<script>
    (function($) {
  'use strict';
  if ($("#fileuploader").length) {
    $("#fileuploader").uploadFile({
      url: "/upload/product/{{$product->id}}/image",
      fileName: "image",

    });
  }
})(jQuery);

</script>

<script>
    var category= $('#category');
    var subcategory_id= $('#subcategory_id');
    category.change(function(){
        $.ajax({
            url:"{{route('get_subcategories')}}",
            method:'GET',
            data:{
                category: category.val(),
            },
            success: function(data){
                subcategory_id.empty();
                subcategory_id.append('<option disabled selected>-- Seleccione una subcategoría --</option>');
                $.each(data, function(index, element){
                    subcategory_id.append('<option value="'+ element.id +'">'+ element.name +'</option>' )
                });
            }
        });
    });
</script>
@endsection

