@extends('movies.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Movie
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
            <form method="post" action="{{ route('movies.update', $movie->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" value="{{ $movie->title }}" class="form-control" name="title" id="title"/>
                </div>
                <div class="form-group">
                    <label for="price">Director</label>
                    <input type="text" value="{{ $movie->director }}" class="form-control" name="director" id="director"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Producer</label>
                    <input type="text" value="{{ $movie->producer }}" class="form-control" name="producer" id="producer"/>
                </div>
                <div class="form-group">
                    <input type="date" name="release_date" value="{{ $movie->release_date }}" id="release_date" class="form-control">
                </div>
                <div class="form-group">
                    <select title="Genre" class="form-control input-lg" name="genre" id="genre">
                        <option {{ $movie->genre === 'action' ? 'selected' : 'selected' }} value="action">action</option>
                        <option {{ $movie->genre === 'adventure' ? 'selected' : 'selected' }} value="adventure">adventure</option>
                        <option {{ $movie->genre === 'drama' ? 'selected' : 'selected' }} value="drama">drama</option>
                        <option {{ $movie->genre === 'comic' ? 'selected' : 'selected' }} value="comic">comic</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="synopsis" id="synopsis" cols="30" rows="10" class="form-control input-lg" placeholder="Synopsis">{{ $movie->synopsis }}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
