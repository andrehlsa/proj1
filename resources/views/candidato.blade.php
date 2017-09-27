@extends('template')
@section('content')

<h1>Lista de candidatos a presidência 2018</h1>
<font size="5cm"><a href="{{route('candidato.create')}}">Cadastrar Novo</a></font><br><br>

<table border="1">
    <tr>
        <th>id</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Numero</th>
        <th>Partido</th>
        <th>Foto</th>
        <th colspan="2">Ações</th>
    </tr>
    @foreach($candidatos as $candidato)
    <tr>
        <td>{{$candidato->id}}</td>
        <td>{{$candidato->nome }}</td>
        <td>
            <?php
            $date = new DateTime($candidato->datanasc);
            $interval = $date->diff(new DateTime(now()));
            echo $interval->format('%Y');
            ?>
        </td>
        <td>{{$candidato->numero}}</td>
        <td>{{$candidato->partido}}</td>
        <td><img src="img/{{$candidato->foto}}" class="img-thumbnail" width="100px">  <td>{{$candidato->foto}}</td>  </td>
        
        <td><a href="{{route('candidato.edit', $candidato->id)}}">Editar</a></td>
        <td><a href="{{route('candidato.show', $candidato->id)}}">Excluir</a></td>


    </tr>
    @endforeach
</table>
@endsection