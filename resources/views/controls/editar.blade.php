@extends('layouts.app')

@section('content')
    <!-- Sección principal: Edición de Actividad -->
    <section class="section">
        <!-- Encabezado de la sección -->
        <div class="section-header">
            <h3 class="page__heading" style="color: #000;">Editar reservación</h3>
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

                            <!-- Formulario de edición de actividad -->
                            <form action="{{ route('controls.update', $control->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!-- Campo para el nombre de la actividad -->
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombre_reservador" style="display: inline-block;  color: #000; font-size: 15px;">Nombre Reservador</label>
                                        <input type="text" name="nombre_reservador" class="form-control" value="{{ $nombreUsuario }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_personas" style="display: inline-block; color: #000; font-size: 15px;">Numero de personas</label>
                                        <select name="numero_personas" class="form-control">
                                            @for ($i = 1; $i <= 60; $i++)
                                                <option value="{{ $i }}" {{ $i == $control->numero_personas ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <!-- Otros campos del formulario -->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="telefono" style="display: inline-block;  color: #000; font-size: 15px;">Telefono</label>
                                        <input type="text" name="telefono" class="form-control" pattern="[0-9]*" oninput="validity.valid||(value='');" value="{{ old('telefono', $control->telefono) }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fecha_entrada" style="display: inline-block; color: #000; font-size: 15px;">Fecha entrada</label>
                                        <input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control" onchange="actualizarCampoFecha()" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYear()->format('Y-m-d') }}" value="{{ old('fecha_entrada', optional($control->fecha_entrada)->format('Y-m-d')) }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fecha_salida" style="display: inline-block;  color: #000; font-size: 15px;">Fecha salida</label>
                                        <input type="date" name="fecha_salida" id="fecha_salida" class="form-control" onchange="actualizarCampoFecha()" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYear()->format('Y-m-d') }}" value="{{ old('fecha_salida', optional($control->fecha_salida)->format('Y-m-d')) }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cabanas_seleccionadas" style="display: inline-block; color: #000; font-size: 15px;">Cabañas Disponibles</label>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Capacidad</th>
                                                    <th>Descripción</th>
                                                    <th>Seleccionar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cabanasDisponibles as $cabana)
                                                <tr>
                                                    <td>{{ $cabana->nombre }}</td>
                                                    <td>{{ $cabana->capacidad }} personas</td>
                                                    <td>{{ $cabana->descripcion }}</td>
                                                    <td>
                                                        <input type="checkbox" name="cabanas_seleccionadas[]" value="{{ $cabana->nombre }}" {{ $control->cabanas->contains('nombre', $cabana->nombre) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                    <!-- Botones para guardar y cancelar -->
                                    <div class="col-md-6 mt-12" style="margin-top: auto;">
                                        <div class="form-group" style="margin-left: auto;">
                                            <button type="submit" class="btn btn-primary:hover" style="color: #ffffff; background-color: #0DC1E9; border-color: #0DC1E9; width: 100px; font-size: 16px;">Guardar</button>
                                            <a href="/controls" class="btn btn-warning:hover" style="color: #ffffff; background-color: #F3580B; border-color: #F3580B; width: 100px; font-size: 16px;">Cancelar</a>
                                        </div>
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
    <script>
        function seleccionarCabana(cabanaNombre) {
            document.getElementById('cabana_seleccionada').value = cabanaNombre;
            alert('Cabaña seleccionada: ' + cabanaNombre);
        }
     
      
    </script>

@endsection