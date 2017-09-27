@extends('template')
@section('content')
    
    <h1>{{$title}}</h1>

    @if (isset($errors) && count($errors) > 0)
    <div><font color="red">
            @foreach($errors->all() as $error)
            <p>
                    {{$error}}
            </p>
            @endforeach
            </font></div>
    @endif
    
    @if (isset($cand))
        <form method="post" action="{{route('candidato.update', $cand->id)}}">
            {!! method_field('PUT') !!}
    @else
        <form method="post" action="{{route('candidato.store')}}">
    @endif
        {!! csrf_field() !!}
        <table>
            <tr><td>
                <input type="text" name="nome" placeholder="Nome: " value="{{$cand->nome or old('nome')}}">
            </td></tr>
            <tr><td>
                Foto: <input vaue="{{$cand->foto or old('foto')}}" type="file" name="foto" class="btn" accept="image/png, image/jpeg" />
            </td></tr>
            <tr><td>
                <input type="date" name="datanasc" value="{{$cand->datanasc or old('datanasc')}}">
            </td></tr>
            <tr><td>
                <input type="text" name="numero" placeholder="Numero: " value="{{$cand->numero or old('numero')}}">
            </td></tr>
            <tr><td>
                <input type="text" name="partido" placeholder="Partido: " value="{{$cand->partido or old('partido')}}">
            </td></tr>
            <tr><td>
                <button>Enviar</button>
            </tr></td>
            <tr><td>
                    <a href="{{route('candidato.index')}}">Voltar <<</a>
            </tr></td>        
        </table>
    </form>

@endsection