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
                                <h3 class="h3 mb-4">Registro de usuario</h3>
                                <form action="{{ route('usuario.update', $data->id) }}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="PUT">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nombres</label>
                                                <input type="text" name="nombres" value="{{ $data->nombres }}" class="form-control" >
                                            </div>

                                            <div class="form-group">
                                                <label for="">Correo</label>
                                                <input type="email" name="correo" value="{{ $data->correo }}" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Acceso</label>
                                                <input type="text" name="acceso" value="{{ $data->acceso }}" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Contraseña</label>
                                                <input type="password" name="clave" value="{{ $data->clave }}" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Dirección</label>
                                                <input type="text" name="direccion" value="{{ $data->direccion }}" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Teléfono 1</label>
                                                <input type="tel" name="telefono1" value="{{ $data->telefono1 }}" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Teléfono 2</label>
                                                <input type="tel" name="telefono2" value="{{ $data->telefono2 }}" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tipo de persona</label>
                                                <select name="tipo_persona" class="form-control">
                                                    <option value="Natural" {{ $data->tipo_persona=='Natural'?'selected':'' }}>Natural</option>
                                                    <option value="Juridica" {{ $data->tipo_persona=='Juridica'?'selected':'' }}>Juridica</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Estado</label>
                                                <select name="estado" class="form-control">
                                                    <option value="1" {{ $data->estado=='1'?'selected':'' }}>Activado</option>
                                                    <option value="0" {{ $data->estado=='0'?'selected':'' }}>Desactivado</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-dark "> Guardar <i class="fas fa-save"></i></button>
                                            <a href="{{ route('usuario.index') }}" class="btn btn-danger ml-2"> Cancelar <i class="fas fa-window-close"></i></a>
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
