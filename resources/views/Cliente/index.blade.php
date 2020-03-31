@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Usuarios - Registrados en la Plataforma</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('Cliente.create') }}" class="btn btn-info" >Añadir Registros</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
              <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Rol</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </thead>
              <tbody>
                @if($registros->count())  
                @foreach($registros as $registrar)  
                <tr>
                  <td>{{$registrar->id}}</td>
                  <td>{{$registrar->nombre}}</td>
                  <td>{{$registrar->documento}}</td>
                  <td>{{$registrar->correo}}</td>
                  <td>{{$registrar->direccion}}</td>
                  <td>{{$registrar->rol}}</td>
                  <td><a class="btn btn-primary btn-xs" href="{{action('ClienteController@edit', $registrar->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td>
                      <form action="{{action('ClienteController@destroy', $registrar->id)}}" method="post">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </td> 
                </tr>
                @endforeach 
                @else
                <tr>
                  <td colspan="8">No hay registro !!</td>
                </tr>
                @endif
              </tbody>
            </table>  
          </div>  
        </div>
      {{ $registros->links() }}
    </div>
  </section>
</div>
<div class="row">
<section class="content">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="pull-left"><h3>Lista de Clientes - Registrados en la Plataforma</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('Cliente.create') }}" class="btn btn-info" >Añadir Registros</a>
            </div>
          </div>
          <div class="table-container">
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>Id</th>
              <th>Nombre</th>
              <th>Documento</th>
              <th>Correo</th>
              <th>Direccion</th>
              <th>Rol</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </thead>
            <tbody>          
              @if($registros->count())             
              @foreach($registros as $registrar)  
              @if($registrar->rol == "Cliente")
              <tr>   
                <td>{{$registrar->id}}</td>
                <td>{{$registrar->nombre}}</td>
                <td>{{$registrar->documento}}</td>
                <td>{{$registrar->correo}}</td>
                <td>{{$registrar->direccion}}</td>  
                <td>{{$registrar->rol}}</td>                     
                <td><a class="btn btn-primary btn-xs" href="{{action(ClienteController@edit', $registrar->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                  <td>
                    <form action="{{action('ClienteController@destroy', $registrar->id)}}" method="post">
                    {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  </td> 
                </tr>
              @endif
              @endforeach 
              @else
              <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
          </table>  
        </div>
      </div>
      {{ $registros->links() }}
    </div>
  </section>
</div>