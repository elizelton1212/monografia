
@extends('adminlte::page')


@section('content')
<h4>{{$pa->nome}}</h4>
<ul>
<li>

	
{{$pa->responsavel}}
</li>

<li>
	{{$pa->email}}

</li>


<li>
	{{$pa->telefone}}

</li>


<li>
	{{$pa->facebook}}

</li>


<li>
	{{$pa->responsavel}}

</li>

<label>Provinca</label>
<li>
	{{$provincias->nome}}

</li>
<label>Munucipio</label>
<li>{{$municipios->nome}}</li>

<label>Districto</label>
@if($districtos)
<li>{{$districtos}}</li>
@else
Nao tem districto
@endif
<br>
<label>Comuna</label>
@if($comunas)
<li>{{$comunas}}</li>

Nao tem comuna
@endif
<br>

<label>Bairro</label>
<li>{{$loca->bairro}}</li>

<label>Rua</label>
<li>{{$loca->rua}}</li>



<label>Numero da Casa</label>
<li>{{$loca->ncasa}}</li>
</ul>


@stop