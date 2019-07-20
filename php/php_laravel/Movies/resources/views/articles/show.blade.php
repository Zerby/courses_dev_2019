@extends('articles.layout')

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
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Title</td>
                <td>Content</td>
                <td>Author</td>
                <td>Type</td>
                <td>Image</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->content}}</td>
                    <td>{{$article->author}}</td>
                    <td>{{$article->type}}</td>
                    <td><img src="{{$article->image}}" style="width: 100px;"></td>
                    <td><a href="{{ route('articles.edit',$article->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('articles.destroy', $article->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>
        <div>
@endsection
