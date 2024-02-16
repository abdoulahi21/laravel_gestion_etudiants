@extends('auth.boostrap')
@extends('auth.navbar')
@section('design')
<!-- Modal -->
          <div class="container mt-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
              <div class="card">
                  <div class="card-header">Formulaire d'ajout Etudiants</div>
            <div class="card-body" >
                <form class="row g-3" action="{{route('auth.createetudiant',$ets)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="last_name" class="form-control" id="nom" value="{{old('last_name')}}">
                        @error("last_name")
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Prenom</label>
                        <input type="text" name="first_name" class="form-control" id="prenom" value="{{old('first_name')}}">
                        @error("first_name")
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                        @error("email")
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Age</label>
                        <input type="number" name="age" class="form-control" id="age" value="{{old('age')}}">
                        @error("age")
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Adresse</label>
                        <input type="text" name="adresse" class="form-control" id="adresse" value="{{old('adresse')}}">
                        @error("adresse")
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Classe</label>
                        <select id="classe"  name="id_classe" class="form-select">
                            <option selected>Choose...</option>
                             @foreach($classe as $cl)
                                 <option value="{{$cl->id}}" >{{$cl->libelle}}</option>
                             @endforeach
                            @error("classe_id")
                            <span style="color: red;">{{$message}}</span>
                            @enderror
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Annee Academique</label>
                        <select id="classe" name="anneAcademique" class="form-select">
                            <option selected>Choose...</option>
                                <option>2020-2021</option>
                                <option>2021-2022</option>
                                <option>2022-2023</option>
                                <option>2023-2024</option>
                            @error("anneAcademique")
                            <span style="color: red;">{{$message}}</span>
                            @enderror
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Photo</label>
                        <input type="file" name="name_image" class="form-control" id="photo" value="{{old('name_image')}}">
                        @error("name_image")
                       <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Valider</button>
                        <a  href="{{route('auth.etudiant')}}" type="reset" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
            </div>
            </div>
          </div>
@endsection
@yield('formulaire')
