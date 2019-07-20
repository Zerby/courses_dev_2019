@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1>Mise à jour du contact</h1>

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
            <form method="post" action="{{ route('abonnes.update', $abonne->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" value="{{ $abonne->prenom }}" />
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection
