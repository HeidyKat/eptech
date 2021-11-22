@extends('layouts.admin')
@section('title','Editar Categoría')
@section('styles')

@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        Editar Categoría
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Categoría</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Categoría</h4>
                        </div>

                        {!! Form::model($category,['route'=>['categories.update', $category],'method'=>'PUT']) !!}


                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control" placeholder="Nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class= "form-control" name="description" id="description" rows="3">{{$category->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="icon">Icono</label>
                            <select class="form-control" name="icon" id="icon">
                                <option value="1">icon1</option>
                                <option value="2">icon2</option>
                                <option value="3">icon3</option>
                                </select>

                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{URL::previous()}}" class="btn btn-light ">
                            Cancelar
                        </a>
                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js')!!}
@endsection

