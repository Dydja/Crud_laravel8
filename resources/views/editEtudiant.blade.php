@extends("layouts.master")

@section("contenu")

<div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">

    <div class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1">Students</h1>
      <small>Since 2011-2020</small>
    </div>
  </div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Editer un Etudiant</h6>
        <div class="mt-4">

            <!--Message d'alerte de succes-->
            @if(session()->has("success"))
                <div class="alert alert-success">
                  <h3>  {{ session()->get('success') }}</h3>
                </div>
            @endif
            <!--EndMessage -->

            <!--Message derreur -->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message )
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!--EndMessage-->

            <form method="POST" action="{{  route('etudiant.update',['etudiant'=>$etudiant->id]) }}">
                <input type="hidden" name="_method" value="put">
                 @csrf
                <div class="form-group">
                  <label for="exampleNmae">FirstName of student</label>
                  <input type="text" class="form-control" placeholder="Entrer votre nom" name="nom" value="{{ $etudiant->nom }}">

                </div>
                <div class="form-group">
                  <label for="exampleLastname">LastName </label>
                  <input type="text" class="form-control"  placeholder="Entrer votre prénom" name="prenom" value="{{ $etudiant->prenom }}">
                </div>
                <div class="form-group">
                    <label for="exampleClasse"> Classe </label>
                    <select class="form-control" name="classroom_id" value="{{$etudiant->classroom_id}}">
                        <option value="choose">Choisir la classe</option>
                        @foreach ($classe as $classroom )
                         @if($classroom->id == $etudiant->classroom_id)
                           <option value="{{ $classroom->id }}" selected>{{ $classroom->libelle }}</option>
                           @else
                           <option value="{{ $classroom->id }}">{{ $classroom->libelle }}</option>
                           @endif
                        @endforeach
                    </select>
                  </div>

                <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
                <a href="{{ route('etudiant') }}"  class="btn btn-danger mt-2">Annuler</a>
            </form>

        </div>
  </div>

  @endsection
