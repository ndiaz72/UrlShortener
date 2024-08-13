@extends('layouts.app')
@section('title', 'Url | Home')
@include('layouts.header')

@section('content')

<div class="container mt-5">
    <!-- Table -->
    <div class="row">
        <div class="col-md-10 mx-auto">

            <table class="table table-hover cell-border hover dt-body-center stripe" id="datatable">
                <thead class="table-dark mt-">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Code</th>
                        <th scope="col">Originar Url</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($urls->isEmpty())
                    <tr>
                        <td scope="col">ID</td>
                        <td scope="col">Code</td>
                        <td scope="col">Original Url</td>
                        <td scope="col">Action</td>

                    </tr>

                    @endif

                    @foreach($urls as $url)
                    <tr>
                        <td>{{ $url->id }}</td>
                        <td>{{ $url->shortened_url }}</td>
                        <td>{{ $url->original_url }}</td>
                        <td>
                            <form action="{{ route('urls.destroy', $url->id) }}" method="POST" style="display:inline;" id="deleteUrl">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>

                            <a href="{{ url( $url->shortened_url ) }}" class="btn btn-secondary btn-sm">Go</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection