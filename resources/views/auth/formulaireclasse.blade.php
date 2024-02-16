@extends('auth.boostrap')
@extends('auth.navbar')
@section('design')
    <!-- Modal -->
    <div class="container mt-5 col-md-4">
        <div class="card">
            <div class="card-header">Formulaire d'ajout classe</div>
            <div class="card-body" >
                <form class="row g-3" action="{{route('auth.createclasse',$classes)}}" method="post" >
                    @csrf
                    @method('post')
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Libelle</label>
                        <input type="text" name="libelle" class="form-control " id="nom">
                        @error("libelle")
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Valider</button>
                        <button type="reset" class="btn btn-default">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@yield('formulaire')
