@extends('layouts.app')

@section('content')


<div class="container" >
    <div class="row" style="border-width:5px;border-style:solid;border-color:#31b0d5; padding:5px;">
        <div class="col-md-16">
                <h3>Uredi projekt:</h3>                
                @include('common.errors')
                <form method="post" action="{{ action('ProjectController@updateproject') }}" >
                    <div class="row col-lg-12">
                        <div class="col-lg-6">
                            <label class="col-lg-3">Naziv:</label> <input type="text" name="naziv_projekta" value="{{$project->naziv_projekta}}">
                        </div>
                        <div class="col-lg-6">
                            <label class="col-lg-3">Opis:</label> <input type="text" name="opis_projekta" value="{{$project->opis_projekta}}">
                        </div>
                    </div>
                    <br>
                    <div class="row col-lg-12">
                        <div class="col-lg-6">
                            <label class="col-lg-3">Početak:</label> <input type="date" name="datum_pocetka" value="{{$project->datum_pocetka}}">
                        </div>
                                                  
                        <div class="col-lg-6">
                            <label class="col-lg-3">Kraj:</label> <input type="date" name="datum_zavrsetka" value="{{$project->datum_zavrsetka}}">
                        </div>
                    </div>
                    <br>
                    <div class="row col-lg-12">
                        <div class="col-lg-6">
                            <label class="col-lg-3">Cijena:</label> <input type="number" name="cijena_projekta" value="{{$project->cijena_projekta}}">
                        </div>                      
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-6">
                        <label class="col-lg-3">Obavljeni poslovi:</label><textarea name="obavljeni_poslovi" cols="40" rows="5" value="{{$project->obavljeni_poslovi}}"></textarea>                                                                   
                        </div>                      
                    </div>
                     <div  class="col-lg-2" style="margin-left:75%;">
                         <p>Radnici na projektu:</p>
                        @foreach($users as $user)
                           <div class="row col-lg-12">
                               <input type="checkbox" value="{{$user}}" name="ukljuceni[]"><span>       {{ $user }}</span>
                               <br>                                   
                            </div> 
                        @endforeach
                    </div>
                    <input type="hidden" name="id" value="{{$project->id}}">                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="voditelj" value="{{ Auth::user()->name }}">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-info">Uredi</button>
                    </div>
                </form>


</div>
</div>
</div>
@endsection