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
                    <a href="{{ route('usuario.create') }}" class="btn btn-dark mb-2">Nuevo <i class="fas fa-plus-circle"></i></a>
                    <table id="myTable" class="display cell-border">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Estado</th>
                            <th>Nombres</th>
                            <th>Tipo de persona</th>
                            <th>Correo</th>
                            <th>Acceso</th>
                            <th>Teléfono 1</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>
                                @if($row->estado == '1' )
                                <i class="fas fa-check-circle text-success"></i>
                                @else
                                <i class="fas fa-ban text-danger"></i>
                                @endif
                            </td>
                            <td>{{ $row->nombres }}</td>
                            <td>{{ $row->tipo_persona }}</td>
                            <td>{{ $row->correo }}</td>
                            <td>{{ $row->acceso }}</td>
                            <td>{{ $row->telefono1 }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('usuario.edit', $row->id) }}" class="btn btn-info">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form class="ml-2" id="submitForm" action="{{ route('usuario.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button onclick="deleteData('{{$row->nombres}}')" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
            if (confirm('Está seguro que desea eliminar: ' + name)){
                $('#submitForm').submit();
            }
        }
    </script>
</x-app-layout>
