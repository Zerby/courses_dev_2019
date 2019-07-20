@extends('movies.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <a href="{{ route('movies.create')}}" class="btn btn-primary" style="margin-bottom: 25px">create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Title</td>
                <td>Director</td>
                <td>Producer</td>
                <td>Release Date</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{$movie->title}}</td>
                    <td>{{$movie->director}}</td>
                    <td>{{$movie->producer}}</td>
                    <td>{{$movie->release_date}}</td>
                    <td><a href="{{ route('movies.edit',$movie->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('movies.destroy', $movie->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
