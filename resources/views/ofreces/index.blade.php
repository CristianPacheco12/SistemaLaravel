@extends('layouts.app')

@section('content')
    <!-- Sección principal: Vista de Actividades -->
    <section class="section">
        <!-- Encabezado de la sección -->
        <div class="section-header">
            <h3 class="page__heading" style="color:#000; font-size:30px;">Actividades</h3>
        </div>

        <!-- Cuerpo de la sección -->
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tarjeta principal -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Botón para crear nueva actividad (visible si el usuario tiene permisos) -->
                            @can('crear-ofrece')
                                <a class="btn btn-warning:hover" style="color: #ffffff; font-size:18px; background-color: #5DC1B9; border-color: #5DC1B9;" href="{{ route('ofreces.create') }}">Nuevo</a>
                            @endcan
                          
                            <!-- Tabla para mostrar la lista de actividades -->
                            <table class="table table-striped mt-2" id="miTabla">
                                <!-- Encabezados de la tabla -->
                                <thead style="background-color:#1465bb">
                                    <th style="color:#fff; font-size:20px;">Nombre</th>
                                    <th style="color:#fff; font-size:20px;">Precio adulto</th>
                                    <th style="color:#fff; font-size:20px;">Precio niño</th>
                                    <th style="color:#fff; font-size:20px;">Descripción</th>
                                    <th style="color:#fff; font-size:20px;"></th>
                                </thead>
                                <tbody>
                                    <!-- Iterar sobre la lista de actividades -->
                                    @foreach ($ofreces as $ofrece)
                                        <tr>
                                            <!-- Nombre de la actividad -->
                                            <td style="color: #000; width: 15%;  font-size:16px;">{{ $ofrece->nombre }}</td>

                                            <!-- Precio para adultos -->
                                            <td style="color: #000; width: 15%;  font-size:16px;">$ {{ $ofrece->precio }}.00</td>

                                            <!-- Precio para niños -->
                                            <td style="color: #000; width: 15%;  font-size:16px;">$ {{ $ofrece->precion }}.00</td>

                                            <!-- Descripción de la actividad -->
                                            <td style="color: #000; width: 35%;  font-size:16px;">{{ $ofrece->descripcion }}</td>

                                            <!-- Acciones en la actividad (Editar y Borrar) -->
                                            <td>
                                                <!-- Enlace para editar la actividad -->
                                                @can('editar-ofrece')
                                                    <a class="btn btn-info" href="{{ route('ofreces.edit', $ofrece->id) }}">Editar</a>
                                                @endcan

                                                <!-- Botón para borrar la actividad -->
                                                @can('borrar-ofrece')
                                                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $ofrece->id }})">Borrar</button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Ubicamos la paginación a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $ofreces->links() !!}
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
        new DataTable('#miTabla', {
            lengthMenu: [
                [5, 10, 15],
                [5, 10, 15]
            ],

            columns: [
                { Nombre: 'Nombre' },
                { PrecioAdulto: 'Precio adulto' },
                { PrecioNino: 'Precio niño' },
                { Descripcion: 'Descripcion' },
                { Acciones: 'Acciones' }
            ],

            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            }
        });

        // Función para confirmar el borrado de una actividad
        function confirmDelete(ofreceId) {
            var result = confirm("¿Estás seguro de que quieres eliminar esta actividad?");
            if (result) {
                // Crear un formulario y agregar el token CSRF
                var form = document.createElement('form');
                form.action = "{{ url('ofreces') }}/" + ofreceId;
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
