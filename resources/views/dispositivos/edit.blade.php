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

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="h3 mb-4">Registro de Grupo</h3>
                                <form action="{{ route('grupo.update', $data->id ) }}" method="POST">
                                    @csrf
                                    <input name="_method" type="hidden" value="PUT">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nombres</label>
                                                <input type="text" name="nombre" value="{{ $data->name }}" class="form-control" >
                                            </div>

                                            <div class="form-group">
                                                <label for="">Usuario</label>
                                                <select name="usuario_id" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    @foreach($user as $row)
                                                        <option value="{{ $row->id }}" {{ $data->usuario_id == $row->id?'selected':'' }}>{{ $row->nombres }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-dark "> Guardar <i class="fas fa-save"></i></button>
                                            <a href="{{ route('grupo.index') }}" class="btn btn-danger ml-2"> Cancelar <i class="fas fa-window-close"></i></a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script>

    </script>
</x-app-layout>