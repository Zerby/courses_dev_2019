@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1>MaJ de l'emprunt</h1>

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
            <form method="post" action="{{ route('emprunts.update', $emprunt->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="abonnes">Abonnés</label>
                    <select name="abonnes_id">
                        @foreach($abonnes as $abonne)
                            <option value="{{ $abonne->id }}" selected="selected">{{ $abonne->prenom }}</option>
                        @endforeach
                    </select><br>

                    <label for="livre">livre</label>
                    <select name="livres_id">
                        @foreach($livres as $livre)
                            <option value="{{ $livre->id }}" selected="selected">{{ $livre->id }} - {{ $livre->auteur }} | {{ $livre->titre }}</option>
                        @endforeach
                    </select><br>

                    <label>Date de sortie</label>
                    <input type="date" name="date_sortie" value="{{ $emprunt->date_sortie }}"><br>

                    <label>Date de rendu</label>
                    <input type="date" name="date_rendu" value="{{ $emprunt->date_rendu }}"><br>

                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection
