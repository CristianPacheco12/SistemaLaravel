@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading" style="color: #000">Agregar Reservacion</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="{{ route('reservaciones.store') }}" method="POST" id="reservacionForm">
                            @csrf
                            <div class="row">
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
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="telefono" style="display: inline-block;  color: #000; font-size: 15px;">Telefono</label>
                                        <input type="text" name="telefono" class="form-control" pattern="[0-9]*" oninput="validity.valid||(value='');">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fecha_entrada" style="display: inline-block; color: #000; font-size: 15px;">Fecha entrada</label>
                                        <input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control" onchange="actualizarCampoFecha()" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYear()->format('Y-m-d') }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fecha_salida" style="display: inline-block;  color: #000; font-size: 15px;">Fecha salida</label>
                                        <input type="date" name="fecha_salida" id="fecha_salida" class="form-control" onchange="actualizarCampoFecha()" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYear()->format('Y-m-d') }}">
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
                                                            <input type="checkbox" name="cabanas_seleccionadas[]" value="{{ $cabana->nombre }}">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-12" style="margin-top: auto;">
                                    <div class="form-group" style="margin-left: auto;">
                                        <button type="submit" class="btn btn-primary:hover" style="color: #ffffff; background-color: #0DC1E9; border-color: #0DC1E9; width: 100px; font-size: 16px;">Guardar</button>
                                        <a href="/reservaciones" class="btn btn-warning:hover" style="color: #ffffff; background-color: #F3580B; border-color: #F3580B; width: 100px; font-size: 16px;">Cancelar</a>
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
</div>

    <script>
        function seleccionarCabana(cabanaNombre) {
            document.getElementById('cabana_seleccionada').value = cabanaNombre;
            alert('Cabaña seleccionada: ' + cabanaNombre);
        }
     
      
    </script>


@endsection
