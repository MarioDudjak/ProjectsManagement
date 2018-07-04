@extends('layouts.app')

@section('content')

<div class="container">
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
     @endif
        <a class="btn btn-info" style="margin-bottom:25px;" href="{{ url('/projects/create') }}" >Dodaj projekt</a>        
    <div class="row" style="border-width:5px;border-style:solid;border-color:#31b0d5; padding:5px;">
        <div class="col-md-12">

                <div>
                <h3 style="text-align: center;">Moji projekti:</h3>
                @foreach($voditeljski_projekti as $project)
                        <table class="table" style="width:100%">
                            <tr>
                                <th>Naziv</th>
                                <th>Opis</th>
                                <th>Pocetak</th>
                                <th>Kraj</th>
                                <th>Cijena</th>
                                <th>Voditelj</th>
                                <th>Ostali</th>
                                <th>Obavljeno</th>
                            </tr>
                            <tr>
                                <td width="12%">{{$project->naziv_projekta}}</td>
                                <td width="12%">{{$project->opis_projekta}}</td>
                                <td width="12%">{{$project->datum_pocetka}}</td>
                                <td width="12%">{{$project->datum_zavrsetka}}</td>
                                <td width="12%">{{$project->cijena_projekta}}</td>
                                <td width="12%">{{$project->voditelj}}</td>
                                <td width="12%">{{$project->ukljuceni}}</td>
                                <td width="12%">{{$project->obavljeni_poslovi}}</td>
                                <a class="btn btn-small btn-info" href="{{ URL::to('project/' . $project->id . '/edit') }}">Uredi</a>                                
                            </tr>
                        </table>

                @endforeach
                <br>
                <br>
                <h3 style="text-align: center;">Ukljuceni projekti:</h3>
                @foreach($ukljuceni_projekti as $project)
                        <table class="table" style="width:100%">
                            <tr>
                                <th>Naziv</th>
                                <th>Opis</th>
                                <th>Pocetak</th>
                                <th>Kraj</th>
                                <th>Cijena</th>
                                <th>Voditelj</th>
                                <th>Ostali</th>
                                <th>Obavljeno</th>
                            </tr>
                            <tr>
                                <td width="12%">{{$project->naziv_projekta}}</td>
                                <td width="12%">{{$project->opis_projekta}}</td>
                                <td width="12%">{{$project->datum_pocetka}}</td>
                                <td width="12%">{{$project->datum_zavrsetka}}</td>
                                <td width="12%">{{$project->cijena_projekta}}</td>
                                <td width="12%">{{$project->voditelj}}</td>
                                <td width="12%">{{$project->ukljuceni}}</td>
                                <td width="12%">{{$project->obavljeni_poslovi}}</td>
                                <a class="btn btn-small btn-info" href="{{ URL::to('project/foreign/' . $project->id . '/edit') }}">Uredi</a>                                                                
                            </tr>
                        </table>

                @endforeach
            </div>
    </div>
</div>
@endsection
