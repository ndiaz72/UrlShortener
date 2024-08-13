@extends('layouts.app')
@section('title', 'Url | Redirecting...')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-6 mx-auto text-center">
            <h3>Redirigiendo en <span id="countdown">5</span> .. </h3>

        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        var seconds = 4;
        var countdownElement = $('#countdown');

        var interval = setInterval(function() {
            countdownElement.text(seconds);
            seconds--;

            if (seconds <= 0) {
                window.location.href = '{{ $original }}';
            }
        }, 1000);
    });
</script>

@endsection