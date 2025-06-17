@extends('layouts.app')

@section('content')
    <!-- Sección principal para agregar cabaña -->
    <section class="section">
        <!-- Encabezado de la sección -->
        <div class="section-header">
            <h3 class="page__heading" style="color: #000">Agregar Cabaña</h3>
        </div>
        <!-- Cuerpo de la sección -->
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tarjeta principal -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Comprobación de errores de validación -->
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

                            <!-- Formulario para agregar una nueva cabaña -->
                            <form action="{{ route('cabanas.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- Campo de nombre de la cabaña -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre" style="display: inline-block; color: #000; font-size: 18px;">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" pattern="[A-Za-zñÑ0-9\s]*" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                    <!-- Campo de capacidad de personas -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="capacidad" style="display: inline-block; color: #000; font-size: 18px;">Capacidad</label>
                                            <select name="capacidad" class="form-control" style="width: 200px">
                                                @for ($i = 2; $i <= 8; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Campo de disponibilidad -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="disponibilidad" style="display: inline-block; color: #000; font-size: 18px;">Disponibilidad</label>
                                            <select name="disponibilidad" class="form-control" style="width: 200px">
                                                <option value="0">Disponible</option>
                                                <option value="1">En mantenimiento</option>
                                            </select>
                                        
                                        </div>
                                    </div>
                                    <!-- Campo de descripción -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="descripcion" style="height: 150px"></textarea>
                                            <label for="descripcion" style="display: inline-block; color: #000; font-size: 18px;">Descripcion</label>
                                        </div>
                                    </div>
                                    <!-- Botones de Guardar y Cancelar -->
                                    <div class="col-md-6 mt-12" style="margin-top: auto;">
                                        <div class="form-group" style="margin-left: auto;">
                                            <button type="submit" class="btn btn-primary:hover" style="color: #ffffff; background-color: #0DC1E9; border-color: #0DC1E9; font-size:20px;">Guardar</button>
                                            <a href="/cabanas" class="btn btn-warning:hover" style="color: #ffffff; background-color: #F3580B; border-color: #F3580B; font-size:20px;">Cancelar</a>
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
