@extends('layouts.app')

@section('content')
    <!-- Sección principal obtenemos el formato de app para el formato de la vista -->
    <section class="section">
        <!-- Encabezado de la sección -->
        <div class="section-header">
            <h3 class="page__heading" style="color:#000;">Usuarios</h3>
        </div>

        <!-- Cuerpo de la sección -->
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tarjeta principal -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Botón para crear nuevo usuario, visible si el usuario tiene permisos -->
                            @can('crear-usuario')
                                <a class="btn btn-warning:hover" style="color: #ffffff; font-size:18px; background-color: #5DC1B9; border-color: #5DC1B9;" href="{{ route('usuarios.create') }}" title="Crear nuevo usuario">Nuevo usuario</a>
                            @endcan

                            <!-- Separación visual -->
                            <div>
                                <br>
                            </div>

                            <!-- Tabla para mostrar la lista de usuarios -->
                            <table class="table table-striped mt-2 table_id" id="miTabla">
                                <!-- Encabezados de la tabla -->
                                <thead style="background-color:#1465bb">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff; font-size:20px">Nombre</th>
                                    <th style="color:#fff; font-size:20px">Correo electrónico</th>
                                    <th style="color:#fff; font-size:20px">Rol</th>
                                    <th style="color:#fff; font-size:20px">Acciones</th>
                                </thead>
                                <tbody>
                                    <!-- Iterar sobre la lista de usuarios -->
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <!-- ID del usuario (oculto) -->
                                            <td style="display: none;">{{ $usuario->id }}</td>

                                            <!-- Nombre del usuario -->
                                            <td style="color: #000; width: 25%; font-size:16px;">{{ $usuario->name }}</td>

                                            <!-- Correo electrónico del usuario -->
                                            <td style="color: #000; width: 30%; font-size:16px;">{{ $usuario->email }}</td>

                                            <!-- Roles del usuario -->
                                            <td style="color:#000;">
                                                @if(!empty($usuario->getRoleNames()))
                                                    @foreach($usuario->getRoleNames() as $rolNombre)
                                                        <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                                    @endforeach
                                                @endif
                                            </td>

                                            <!-- Acciones del usuario (Editar y Borrar) -->
                                            <td>
                                                <!-- Enlace para editar el usuario -->
                                                <a class="btn btn-info" href="{{ route('usuarios.edit',$usuario->id) }}" title="Editar usuario">Editar</a>

                                                <!-- Botón para borrar el usuario -->
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $usuario->id }})">Borrar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                [5, 10],
                [5, 10]
            ],

            columns: [
                { Id: 'Id' },
                { Nombre: 'Nombre' },
                { Email: 'Correo electrónico' },
                { Rol: 'Rol' },
                { Acciones: 'Acciones' }
            ],

            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            }
        });

        function confirmDelete(usuarioId) {
            var result = confirm("¿Estás seguro de que quieres eliminar este usuario?");
            if (result) {
                // Crear un formulario y agregar el token CSRF
                var form = document.createElement('form');
                form.action = "{{ url('usuarios') }}/" + usuarioId;
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
