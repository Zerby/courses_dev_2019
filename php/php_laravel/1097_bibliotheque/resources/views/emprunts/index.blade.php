@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1>Emprunts</h1>

            <div>
                <a style="margin-bottom: 20px;" href="{{ route('emprunts.create')}}" class="btn btn-primary">Ajouter un emprunt</a>
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
                    <td>Abonné id</td>
                    <td>livre id</td>
                    <td>Date de sortie</td>
                    <td>Date de rendu</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($emprunts as $emprunt)
                    <tr>
                        <td>{{$emprunt->abonnes_id}}</td>
                        <td>{{$emprunt->livres_id}}</td>
                        <td>{{ date('d-m-Y', strtotime($emprunt->date_sortie)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($emprunt->date_rendu)) }}</td>
                        <td>
                            <a href="{{ route('emprunts.edit',$emprunt->id)}}" class="btn btn-primary">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('emprunts.destroy',$emprunt->id) }}" method="post">
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
