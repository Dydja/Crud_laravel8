@extends("layouts.master")

@section("contenu")

<div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">

    <div class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1">Students</h1>
      <small>Since 2011-2020</small>
    </div>
  </div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Students List Inscrit</h6>
      <div class="d-flex justify-content-end mb-2">
          <a href="{{ route('etudiant.create') }}" class="btn btn-primary">Ajouter un nouveau Etudiant</a>
      </div>
        <!--Message d'alerte de succes-->
        @if(session()->has("successDelete"))
            <div class="alert alert-danger">
            <h3>  {{ session()->get('successDelete') }}</h3>
            </div>
       @endif
    <!--EndMessage -->
    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Lastname</th>
            <th scope="col">Class</th>
            <th scope="col" colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $etudiant )
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th> <!--afin que cela commence par 1 -->
                <td>{{$etudiant->nom}}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->myclasse->libelle }}</td>
                <td>
                    <a href="{{ route('etudiant.edit',['etudiant'=>$etudiant->id]) }}" class="btn btn-warning">Editer</a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet étudiant ?'))
                    {document.getElementById('form-{{ $etudiant->id }}').submit() }">
                        Delete</a>
                    <form id="form-{{ $etudiant->id }}" action="{{ route("etudiant.supprimer",['etudiant'=>$etudiant->id])}}" method="POST">
                       @csrf
                         <input type="hidden" name="_method" value="delete">
                    </form>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
      {{ $etudiants->links()}}
  </div>

  @endsection
