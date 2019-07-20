@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1>Livres</h1>

            <div>
                <a style="margin-bottom: 20px;" href="{{ route('livres.create')}}" class="btn btn-primary">Ajouter un livre</a>
            </div>

            <div class="col-sm-12">

                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Auteur</td>
                    <td>Titre</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($livres as $livre)
                    <tr>
                        <td>{{$livre->id}}</td>
                        <td>{{$livre->auteur}}</td>
                        <td>{{$livre->titre}}</td>
                        <td>
                            <a href="{{ route('livres.edit',$livre->id)}}" class="btn btn-primary">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('livres.destroy', $livre->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="alert('Etes-vous sur de vouloir supprimer ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
