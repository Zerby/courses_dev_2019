@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1>Mise à jour du livre</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('livres.update', $livre->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="auteur">Auteur</label>
                    <input type="text" class="form-control" name="auteur" value="{{ $livre->auteur }}"/>
                </div>

                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" name="titre" value="{{ $livre->titre }}"/>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection
