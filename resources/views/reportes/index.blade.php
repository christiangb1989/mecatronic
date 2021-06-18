<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="myTable" class="display cell-border">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Grupo</th>
                            <th>Placa</th>
                            <th>Imei</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Año</th>
                            <th>Descargar PDF</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->grupo->name }}</td>
                                <td>{{ $row->placa }}</td>
                                <td>{{ $row->imei }}</td>
                                <td>{{ $row->modelo }}</td>
                                <td>{{ $row->marca }}</td>
                                <td>{{ $row->anio }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/gps/export/{{ $row->imei }}" class="btn btn-success ">
                                            <i class="fas fa-arrow-circle-down"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                }
            });
        } );
        function deleteData(name){
            if (confirm('Está seguro que desea eliminar: ' + name)){
                $('#submitForm').submit();
            }
        }
    </script>
</x-app-layout>
