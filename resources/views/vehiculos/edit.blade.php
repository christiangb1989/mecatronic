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
                                <h3 class="h3 mb-4">Registro de vehiculo</h3>
                                <form action="{{ route('vehiculo.update', $data->id) }}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="PUT">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Grupo</label>
                                                <select name="grupo_id" required id="" class="form-control">
                                                    <option value="">Seleccionar Grupo</option>
                                                    @foreach($grupo as $row)
                                                        <option value="{{$row->id}}" {{ $data->grupo_id == $row->id?'selected':'' }}>{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Imei</label>
                                                <input type="text" name="imei" value="{{ $data->imei }}" required  class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Placa</label>
                                                <input type="text" name="placa" value="{{ $data->placa }}" required class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Numero de chip</label>
                                                <input type="text" name="num_chip" value="{{ $data->num_chip }}" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Operador</label>
                                                <select name="operador" class="form-control">
                                                    <option value="">Seleccionar operador</option>
                                                    <option value="Movistar" {{ $data->operador == 'Movistar'?'selected':'' }}>Movistar</option>
                                                    <option value="Claro" {{ $data->operador == 'Claro'?'selected':'' }}>Claro</option>
                                                    <option value="Entel" {{ $data->operador == 'Entel'?'selected':'' }}>Entel</option>
                                                    <option value="Bitel" {{ $data->operador == 'Bitel'?'selected':'' }}>Bitel</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tipo de Vehículo</label>
                                                <select name="tipo" required class="form-control">
                                                    <option value="">Seleccionar operador</option>
                                                    <option value="Automóvil" {{ $data->tipo == 'Automóvil'?'selected':'' }}>Automóvil</option>
                                                    <option value="Microbus" {{ $data->tipo == 'Microbus'?'selected':'' }}>Microbus</option>
                                                    <option value="Bus" {{ $data->tipo == 'Bus'?'selected':'' }}>Bus</option>
                                                    <option value="Camion" {{ $data->tipo == 'Camion'?'selected':'' }}>Camion</option>
                                                    <option value="Trailer" {{ $data->tipo == 'Trailer'?'selected':'' }}>Trailer</option>
                                                    <option value="Tractor" {{ $data->tipo == 'Tractor'?'selected':'' }}>Tractor</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Dispositivos</label>
                                                <select name="dispositivo_id" required class="form-control">
                                                    <option value="">Seleccionar Dispositivo</option>
                                                    @foreach($dispositivo as $row)
                                                        <option value="{{$row->id}}" {{ $data->dispositivo_id == $row->id?'selected':'' }}>{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Marca</label>
                                                <input type="text" name="marca" value="{{ $data->marca }}" required class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Modelo</label>
                                                <input type="text" name="modelo" value="{{ $data->modelo }}" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Color</label>
                                                <input type="color" name="color" value="{{ $data->color }}" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Año</label>
                                                <input type="number" name="anio" value="{{ $data->anio }}" placeholder="2000" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Odometro</label>
                                                <input type="text" name="odometro" value="{{ $data->odometro }}" required class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Código SMS</label>
                                                <input type="text" name="sms" value="{{ $data->sms }}" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Estado</label>
                                                <select name="estado" class="form-control">
                                                    <option value="1" {{ $data->estado == '1'?'selected':'' }}>Activado</option>
                                                    <option value="0" {{ $data->estado == '0'?'selected':'' }}>Desactivado</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-dark "> Guardar <i class="fas fa-save"></i></button>
                                            <a href="{{ route('vehiculo.index') }}" class="btn btn-danger ml-2"> Cancelar <i class="fas fa-window-close"></i></a>
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
