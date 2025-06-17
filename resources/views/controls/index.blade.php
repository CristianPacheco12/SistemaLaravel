@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading" style="color:#000; font-size:30px;">Tus reservaciones</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        @can('crear-reservacion')
                        <a class="btn btn-warning:hover"  style="color: #ffffff; font-size:18px; background-color: #5DC1B9; border-color: #5DC1B9;" href="{{ route('controls.create') }}">Crear reservación</a>
                        @endcan


                        <table class="table table-striped mt-2"  id="miTabla">
                                <thead style="background-color:#1465bb">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;  font-size:16px">Personas</th>    
                                    <th style="color:#fff;  font-size:16px">Fecha entrada</th>  
                                    <th style="color:#fff;  font-size:16px">Fecha salida</th>  
                                    <th style="color:#fff;  font-size:16px">Costo</th>                                  
                                    <th style="color:#fff;  font-size:16px">Teléfono</th>  
                                    <th style="color:#fff;  font-size:16px">Cabaña</th>  
                                    <th style="color:#fff;  font-size:16px"></th>                                                                        
                              </thead>
                              <tbody>
                              @foreach ($controls as $control)
                                    <tr>
                                        <td style="display: none;">{{ $control->id }}</td>                                
                                        <td style="color: #000; width: 10%;  font-size:16px;">{{ $control->numero_personas }}</td>
                                        <td style="color: #000; width: 15%;  font-size:16px;">{{ $control->fecha_entrada }}</td>
                                        <td style="color: #000; width: 15%;  font-size:16px;">{{ $control->fecha_salida }}</td>
                                        <td style="color: #000; width: 15%;  font-size:16px;">${{ $control->costo }}</td>
                                        <td style="color: #000; width: 15%;  font-size:16px;">{{ $control->telefono }}</td>
                                        <td style="color: #000; width: 15%; font-size:16px;">
                                            @foreach ($control->cabanas as $cabana)
                                                {{ $cabana->nombre }}<br>
                                            @endforeach
                                        </td>
                                        <td style="color: #000; width: 30%; font-size:16px;">
                                        @can('editar-reservacion')
                <a class="btn btn-info" href="{{ route('controls.edit', $control->id) }}">Editar</a>
            @endcan

<!-- Botón para borrar el usuario -->
<button type="button" class="btn btn-danger" onclick="confirmDelete({{ $control->id }})">Borrar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                             </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $controls->links() !!}
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
   
 function confirmDelete(id) {
            if (confirm("¿Estás seguro de que deseas eliminar esta reservación?")) {
                // Enviar una solicitud AJAX para eliminar el registro
                fetch(`/controls/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Manejar la respuesta del servidor, puedes redirigir o realizar otras acciones según tu necesidad
                        console.log(data);
                        // Recargar la página después de eliminar
                        location.reload();
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            }
        }
    </script>

@endsection
