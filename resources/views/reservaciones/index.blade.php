@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading" style="color:#000; font-size:30px;">Lista de reservaciones próximas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped mt-2" id="miTabla">
                                <thead style="background-color:#1465bb">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;  font-size:16px">Nombre</th>
                                    <th style="color:#fff;  font-size:16px">Personas</th>
                                    <th style="color:#fff;  font-size:16px">Fecha entrada</th>
                                    <th style="color:#fff;  font-size:16px">Fecha salida</th>
                                    <th style="color:#fff;  font-size:16px">Costo</th>
                                    <th style="color:#fff;  font-size:16px">Teléfono</th>
                                    <th style="color:#fff;  font-size:16px">Cabaña</th>
                                </thead>
                                <tbody>
                                    @foreach ($reservaciones as $reservacion)
                                        <tr>
                                            <td style="display: none;">{{ $reservacion->id }}</td>
                                            <td style="color: #000; width: 10%;  font-size:16px;">{{ $reservacion->nombre_reservador }}</td>
                                            <td style="color: #000; width: 12%;  font-size:16px;">{{ $reservacion->numero_personas }}</td>
                                            <td style="color: #000; width: 15%;  font-size:16px;">{{ $reservacion->fecha_entrada }}</td>
                                            <td style="color: #000; width: 15%;  font-size:16px;">{{ $reservacion->fecha_salida }}</td>
                                            <td style="color: #000; width: 15%;  font-size:16px;">${{ $reservacion->costo }}</td>
                                            <td style="color: #000; width: 15%;  font-size:16px;">{{ $reservacion->telefono }}</td>
                                            <td style="color: #000; width: 30%; font-size:16px;">
                                                @foreach ($reservacion->cabanas as $cabana)
                                                    {{ $cabana->nombre }}<br>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Ubicamos la paginación a la derecha -->
                            <div class="pagination justify-content-end" style="margin-top: 10px;">
                                {!! $reservaciones->links() !!}
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
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            }
        });

        // Función para confirmar el borrado de una reservación
        function confirmDelete(reservacionId) {
            var result = confirm("¿Estás seguro de que quieres eliminar esta reservación?");
            if (result) {
                // Crear un formulario y agregar el token CSRF
                var form = document.createElement('form');
                form.action = "{{ url('reservaciones') }}/" + reservacionId;
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
