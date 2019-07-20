@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1>Ajouter un emprunt</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('emprunts.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="abonnes">Abonnés</label>
                        <select name="abonnes_id">
                            @foreach($abonnes as $abonne)
                                <option value="{{ $abonne->id }}">{{ $abonne->prenom }}</option>
                            @endforeach
                        </select><br>
                        <label for="livres">Livre</label>
                        <select name="livres_id">
                            @foreach($livres as $livre)
                                <option value="{{ $livre->id }}">{{ $livre->id }} - {{ $livre->auteur }} | {{ $livre->titre }}</option>
                            @endforeach
                        </select><br>

                        <label for="date_sortie">Date de sortie</label>
                        <input type="date" name="date_sortie" ><br>

                        <label>Date de rendu</label>
                        <input type="date" name="date_rendu"><br>

                    </div>


                    <button type="submit" class="btn btn-primary">Ajouter Emprunt</button>
                </form>
            </div>
        </div>
    </div>
@endsection
