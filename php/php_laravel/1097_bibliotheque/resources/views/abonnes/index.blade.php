@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1>Abonnés</h1>

            <div>
                <a style="margin-bottom: 20px;" href="{{ route('abonnes.create')}}" class="btn btn-primary">Ajouter un abonné</a>
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
                    <td>Prénom</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($abonnes as $abonne)
                    <tr>
                        <td>{{$abonne->id}}</td>
                        <td>{{$abonne->prenom}}</td>
                        <td>
                            <a href="{{ route('abonnes.edit',$abonne->id)}}" class="btn btn-primary">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('abonnes.destroy', $abonne->id)}}" method="post">
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
