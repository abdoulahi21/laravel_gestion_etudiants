@extends('auth.navbar')
@extends('auth.boostrap')
@section('content')
<div class="container mt-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" >
    <div class="card">
        <div class="card-header bg-info" style="color: white;">Formulaire de modification Etudiants</div>
        <div class="card-body" >
            <form class="row g-3" action="{{route('auth.updateetudiant',$s)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="first_name" class="form-control" id="nom" value="{{$s->last_name}}">
                    @error("first_name")
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Prenom</label>
                    <input type="text" name="last_name" class="form-control" id="prenom" value="{{$s->first_name}}">
                    @error("last_name")
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">email</label>
                    <input type="email" name="email" class="form-control" id="" value="{{$s->email}}">
                    @error("email")
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Age</label>
                    <input type="number" name="age" class="form-control" id="age" value="{{$s->age}}">
                    @error("age")
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Adresse</label>
                    <input type="text" name="adresse" class="form-control" id="adresse" value="{{$s->adresse}}">
                    @error("adresse")
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Classe</label>
                    <select id="classe" name="classe_id" class="form-select" >
                        <option selected ></option>
                           @foreach($classe as $cl)
                            <option  value="{{$cl->id}}" >{{$cl->libelle}}</option>
                           @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Annee Academique</label>
                    <select id="" name="anneAcademique" class="form-select" >
                        <option selected ></option>
                        <option>2020-2021</option>
                        <option>2021-2022</option>
                        <option>2022-2023</option>
                        <option>2023-2024</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Photo</label>
                    <input type="file" name="name_image" class="form-control" id="photo" value="">
                    @error("name_image")
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <img src="{{ asset('storage/photos/'.$s->name_image) }}"  style="width:100px;height:100px;">
                <div class="col-12">
                    <button type="submit" onclick="return confirm(' Voulez_vous valider la mofification');return false;" class="btn btn-success">Valider</button>
                    <a href="{{route('auth.etudiant')}}" type="reset" class="btn btn-danger">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
