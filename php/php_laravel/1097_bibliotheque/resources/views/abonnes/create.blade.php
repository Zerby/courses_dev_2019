@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1>Ajouter un abonné</h1>
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
                <form method="post" action="{{ route('abonnes.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter abonné</button>
                </form>
            </div>
        </div>
    </div>
@endsection
