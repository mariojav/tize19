@extends('layouts.app')

@section('content')
    <h3 class="page-title">Nueva asistencia</h3>

    {!! Form::open(['method' => 'POST', 'route' => ['sesiones.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        

        <div class="panel-body">


            <div class="row col-xs-12 form-group">
                <label for="">Asistencia</label> <br>
                <select name="asistencia" id="asistencia" size="1" style = "width:70px">
                    <option value="si">Asistio</option>
                    <option value="no">Falto</option>
                </select>
            </div>
            <br>


            <div class="row col-xs-12 form-group">
                <label for="">Maquina</label><br>
                <input type = "number" name="maquina" id="maquina" required placeholder="ingresa el numero de maquina">
            </div>
            <br>

            <div class="row col-xs-12 form-group">
                <label for="">Descripcion</label> <br>
            <textarea type="textarea" rows="10" cols="220" name="descripcion", id="descripcion" maxlength="200" placeholder="Aqui una descripcional opcional"></textarea>
            </div>
            <br>

             <input type="hidden" id = "user_id" name = "user_id" value=" {{ $user_id }}">
             
             <input type="hidden" id = "materia_id" name = "materia_id" value=" {{ $materia_id }}">
             

        </div>

    </div>

    

    <!-- <div class='botons-group'><center> -->
        <a href="{{ url('sesiones/'.$materia_id).'/'.$user_id}}" class = "btn btn-info"   >volver</a>
        
    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    <!-- </center></div> -->
    {!! Form::close() !!}
   
   

        
@stop

