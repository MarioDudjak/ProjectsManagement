@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Dashboard</div>
                @if (!Auth::guest())
                <div class="panel-body">
                    You are logged in!
                </div>

                <a href="/projects/create">Dodaj projekt</a>
                <a href="/details">Pregled</a>

                
                @endif

                <br>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
