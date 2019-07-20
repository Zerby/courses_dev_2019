@extends('articles.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Article
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('articles.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Title</label>
                    <input type="text" class="form-control" name="title" id="title"/>
                </div>
                <div class="form-group">
                    <label for="price">Author</label>
                    <input type="text" class="form-control" name="author" id="author"/>
                </div>
                <div class="form-group">
                    <label for="name">Image</label>
                    <input type="text" class="form-control" name="image" id="image"/>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select title="type" class="form-control input-lg" name="type" id="type">
                        <option value="action">action</option>
                        <option value="adventure">adventure</option>
                        <option value="drama">drama</option>
                        <option value="comic">comic</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control input-lg">
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
