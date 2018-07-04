@extends('layouts.app')

@section('content')


<div class="container" >
    <div class="row" style="border-width:5px;border-style:solid;border-color:#31b0d5; padding:5px;">
        <div class="col-md-16">
                <h3>Uredi projekt:</h3>                
                @include('common.errors')
                <form method="post" action="{{ action('ProjectController@updateforeignproject') }}" >        
                    <div class="row col-lg-12">
                        <div class="col-lg-6">
                        <label class="col-lg-3">Obavljeni poslovi:</label><textarea name="obavljeni_poslovi" cols="40" rows="5" value="{{$project->obavljeni_poslovi}}"></textarea>                                                                   
                        </div>                      
                    </div>
                    <input type="hidden" name="id" value="{{$project->id}}">                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-info">Uredi</button>
                    </div>
                </form>


</div>
</div>
</div>
@endsection