@extends('layouts.guest')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            @if(Auth::check())
                <div class="alert alert-success">
                    Benvenuto, {{ Auth::user()->name }}!
                </div>
            @else
                <div class="alert alert-info">
                    Effettua l'accesso oppure registrati al nostro sito, per poter lavorare su di esso!!
                </div>
            @endif
        </div>
    </div>
</div>

 @endsection
