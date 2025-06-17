@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white" style="color:#000;">
                        <h3 class="mb-0">Crear Rol</h3>
                    </div>

                    <div class="card-body">
                        <label class="text-danger">Los campos con * son obligatorios</label>
                        
                        @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                        
                        <div class="form-group">
                            <label for="name">Nombre del Rol: <span class="required text-danger">*</span></label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="permission">Permisos para este Rol: <span class="required text-danger">*</span></label>
                            <div class="row">
                                @foreach($permission as $value)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                            <label class="form-check-label">{{ $value->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" style="background-color: #0DC1E9; border-color: #0DC1E9;">Guardar</button>
                            <a href="/roles" class="btn btn-warning" style="background-color: #F3580B; border-color: #F3580B;">Cancelar</a>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
