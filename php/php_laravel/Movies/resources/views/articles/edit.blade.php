@extends('articles.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Article
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
            <form method="post" action="{{ route('articles.update', $article->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" value="{{ $article->title }}" class="form-control" name="title" id="title"/>
                </div>
                <div class="form-group">
                    <label for="price">Author</label>
                    <input type="text" value="{{ $article->author }}" class="form-control" name="author" id="author"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Image</label>
                    <input type="text" class="form-control" name="image" id="image" value="{{ $article->image }}"/>
                </div>
                <div class="form-group">
                    <select title="type" class="form-control input-lg" name="type" id="type">
                        <option {{ $article->type === 'action' ? 'selected' : 'selected' }} value="action">action</option>
                        <option {{ $article->type === 'adventure' ? 'selected' : 'selected' }} value="adventure">adventure</option>
                        <option {{ $article->type === 'drama' ? 'selected' : 'selected' }} value="drama">drama</option>
                        <option {{ $article->type === 'comic' ? 'selected' : 'selected' }} value="comic">comic</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control input-lg">{{ $article->content }}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
