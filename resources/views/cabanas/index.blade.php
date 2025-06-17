@extends('layouts.app')

@section('content')
    <!-- Sección principal: Vista de las Cabañas -->
    <section class="section">
        <!-- Encabezado de la sección -->
        <div class="section-header">
            <h3 class="page__heading" style="color: #000;">Cabañas</h3>
        </div>

        <!-- Cuerpo de la sección -->
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tarjeta principal -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Botón para crear nueva cabaña (visible si el usuario tiene permisos) -->
                            @can('crear-cabana')
                                <a class="btn btn-warning:hover" style="color: #ffffff; font-size:18px; background-color: #5DC1B9; border-color: #5DC1B9;" href="{{ route('cabanas.create') }}">Nueva cabaña</a>
                            @endcan

                            <!-- Separación visual -->
                            <div>
                                <br>
                            </div>

                            <!-- Tabla para mostrar la lista de cabañas -->
                            <table class="table table-striped mt-2" id="miTabla3">
                                <!-- Encabezados de la tabla -->
                                <thead style="background-color:#1465bb">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff; font-size:20px;">Nombre</th>
                                    <th style="color:#fff; font-size:20px;">Capacidad</th>                                    
                                    <th style="color:#fff; font-size:20px;">Disponibilidad</th>   
                                    <th style="color:#fff; font-size:20px;">Descripción</th>                                    
                                    <th style="color:#fff; font-size:20px;"></th>  
                                </thead>
                                <tbody>
                                    <!-- Iterar sobre la lista de cabañas -->
                                    @foreach ($cabanas as $cabana)
                                        <tr>
                                            <!-- ID de la cabaña (oculto) -->
                                            <td style="display: none;">{{ $cabana->id }}</td>

                                            <!-- Nombre de la cabaña -->
                                            <td style="color: #000; width: 15%;  font-size:16px;">{{ $cabana->nombre }}</td>

                                            <!-- Capacidad de la cabaña -->
                                            <td style="color: #000; width: 12%;  font-size:16px;">{{ $cabana->capacidad }} personas</td>

                                          <!-- Disponibilidad de la cabaña -->
                                            <td style="color: #000; width: 12%;  font-size:16px;">
                                                @if($cabana->disponibilidad == 0)
                                                    Disponible
                                                @else
                                                    En mantenimiento
                                                @endif
                                            </td>
                                            <!-- Descripción de la cabaña -->
                                            <td style="color: #000; width: 35%;  font-size:16px;">{{ $cabana->descripcion }}</td>

                                            <!-- Acciones en la cabaña (Editar y Borrar) -->
                                            <td>
                                                <!-- Enlace para editar la cabaña -->
                                                @can('editar-cabana')
                                                    <a class="btn btn-info" href="{{ route('cabanas.edit',$cabana->id) }}">Editar</a>
                                                @endcan

                                                <!-- Formulario para eliminar la cabaña -->
                                                @csrf
                                                @method('DELETE')
                                                @can('borrar-cabana')
                                                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $cabana->id }})">Borrar</button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Ubicamos la paginación a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $cabanas->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <!-- Configuración de la tabla con DataTables -->
    <script>
        new DataTable('#miTabla3', {
            lengthMenu: [
                [5, 10],
                [5, 10]
            ],

            columns: [
                { Id: 'ID' },
                { Nombre: 'Nombre' },
                { Capacidad: 'Capacidad' },
                { Disponibilidad: 'Disponibilidad' },
                { Descripcion: 'Descripción' },
                { Acciones: 'Acciones' }
            ],

            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            }
        });

        // Función para confirmar el borrado de una cabaña
        function confirmDelete(cabanaId) {
            var result = confirm("¿Estás seguro de que quieres eliminar esta cabaña?");
            if (result) {
                // Crear un formulario y agregar el token CSRF
                var form = document.createElement('form');
                form.action = "{{ url('cabanas') }}/" + cabanaId;
                form.method = 'POST';
                form.style.display = 'none'; // ocultar el formulario

                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var csrfInput = document.createElement('input');
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);

                var methodInput = document.createElement('input');
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                document.body.appendChild(form);

                // Enviar el formulario
                form.submit();
            }
        }
    </script>
@endsection
