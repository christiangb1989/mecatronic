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
                                <form action="{{ route('usuario.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nombres</label>
                                                <input type="text" name="nombres" class="form-control" >
                                            </div>

                                            <div class="form-group">
                                                <label for="">Correo</label>
                                                <input type="email" name="correo" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Acceso</label>
                                                <input type="text" name="acceso" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Contraseña</label>
                                                <input type="password" name="clave" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Dirección</label>
                                                <input type="text" name="direccion" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Teléfono 1</label>
                                                <input type="tel" name="telefono1" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Teléfono 2</label>
                                                <input type="tel" name="telefono2" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tipo de persona</label>
                                                <select name="tipo_persona" class="form-control">
                                                    <option value="Natural">Natural</option>
                                                    <option value="Juridica">Juridica</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Estado</label>
                                                <select name="estado" class="form-control">
                                                    <option value="1">Activado</option>
                                                    <option value="0">Desactivado</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-dark "> Guardar <i class="fas fa-save"></i></button>
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
