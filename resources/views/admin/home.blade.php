@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div id="welcomeMessage" class="col-md-6 offset-md-3">
            @if(Auth::check())
                <div class="alert alert-success">
                    Benvenuto, {{ Auth::user()->name }}!
                </div>
            @else
                <div class="alert alert-info">
                    Effettua l'accesso per vedere il saluto.
                </div>
            @endif
        </div>
    </div>
</div>


<script>
    // Nascondo il messaggio di benvenuto dopo 5 secondi

    setTimeout(() => {
        document.getElementById('welcomeMessage').classList.add('d-none');
    }, 5000);
</script>

 @endsection
