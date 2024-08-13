<!-- Alert for success or error messages -->
<div id="message" style=" position: fixed;bottom: 0;left: 0;width: 100%;" class="animate__delay-2s animate__animated animate__fadeOutDown	">
    @if(session('success'))
    <div class="alert alert-success rounded-0">
        {{ session('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger pb-0 rounded-0">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>


<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>