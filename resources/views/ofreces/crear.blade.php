@extends('layouts.app')

@section('content')
    <!-- Sección principal: Agregar Actividad -->
    <section class="section">
        <!-- Encabezado de la sección -->
        <div class="section-header">
            <h3 class="page__heading" style="color: #000">Agregar Actividad</h3>
        </div>

        <!-- Cuerpo de la sección -->
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tarjeta principal -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Verificar si hay errores de validación -->
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

                            <!-- Formulario para agregar actividad -->
                            <form action="{{ route('ofreces.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- Campo para el nombre de la actividad -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre" style="display: inline-block;  color: #000; font-size: 18px;">Nombre</label>
                                            <input type="text" name="nombre" class="form-control"  oninput="validity.valid||(value='');">
                                        </div>
                                    </div>

                                    <!-- Campo para el precio de adulto -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="precio" style="display: inline-block;  color: #000; font-size: 18px;">Precio Adulto</label>
                                            <input type="text" name="precio" class="form-control"  maxlength="5" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>

                                    <!-- Campo para el precio de niño -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="precion" style="display: inline-block; color: #000; font-size: 18px;">Precio Niño</label>
                                            <input type="text" name="precion" class="form-control"   maxlength="5" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>

                                    <!-- Campo para la descripción -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="descripcion" style="height: 100px"></textarea>
                                            <label for="descripcion" style="display: inline-block;  color: #000; font-size: 18px;">Descripción</label>
                                        </div>
                                    </div>

                                    <!-- Botones para guardar y cancelar -->
                                    <div class="col-md-6 mt-12" style="margin-top: auto;">
                                        <div class="form-group" style="margin-left: auto;">
                                            <button type="submit" class="btn btn-primary:hover" style="color: #ffffff; background-color: #0DC1E9; border-color: #0DC1E9; width: 100px; font-size: 16px;">Guardar</button> 
                                            <a href="/ofreces" class="btn btn-warning:hover" style="color: #ffffff; background-color: #F3580B; border-color: #F3580B; width: 100px; font-size: 16px;">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
