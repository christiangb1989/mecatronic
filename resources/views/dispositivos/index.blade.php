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
                    <a href="{{ route('dispositivo.create') }}" class="btn btn-dark mb-2">Nuevo <i class="fas fa-plus-circle"></i></a>
                    <table id="myTable" class="display cell-border">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Año</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->anio }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('dispositivo.edit', $row->id) }}" class="btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form class="ml-2" id="submitForm" action="{{ route('dispositivo.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button onclick="deleteData('{{$row->name}}')" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
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
            if (confirm('Está seguro que desea eliminar el dispositivo : ' + name)){
                $('#submitForm').submit();
            }
        }
    </script>
</x-app-layout>
