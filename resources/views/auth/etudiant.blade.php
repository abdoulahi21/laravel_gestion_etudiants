@extends('auth.navbar')
@extends('auth.boostrap')
@section('content')
<h2>
    <b style="padding-left:20px;">
        @auth
            Hello!  {{\Illuminate\Support\Facades\Auth::user()->name}}
        @endauth
    </b>
</h2>
<form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file">Choose Excel File</label>
        <input type="file" name="file" id="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Import</button>
</form>
<a class="btn btn-warning float-end" href="{{ route('export.excel') }}">Export User Data</a>
<a class="btn btn-success mt-5 m-lg-2" style="color: white;" href="{{route('auth.formulaireetudiant')}}">Ajouter</a>
<form action="{{ route('search') }}" method="GET">
    <input type="text" name="search" placeholder="Search Products">
    <button type="submit">Search</button>
</form>
        <div class="container row ">
            <br>
            <br>
            @if(session('success'))
                <alert class="alert alert-success">{{session('success')}}</alert>
            @endif
             @foreach($et as $e)
                <div class="card mt-4 m-lg-3" style=" width: 20rem;">
                    <div class="card-header">
                     <center><img src="/storage/photos/{{$e->name_image}}" class="card-img-top" style="height: 200px"></center>
                        </div>
                        <div class="card-body" >
                            <div>
                              <b>Nom et Prenom:</b> {{$e->first_name}} {{$e->last_name}}
                            </div>
                            <div>
                                <b>Email</b>: {{$e->email}}
                            </div>
                            <div>
                                <b>Age:</b> {{$e->age}}
                            </div>
                            <div>
                                <b>Adresse</b>:{{$e->adresse}}
                            </div>
                            <div>
                                @foreach($e->classes as $classe)
                                    <b>Classe:</b> {{$classe->libelle}}
                                @endforeach
                            </div>
                            <div class="d-flex gap-2 w-100 ">
                                <form method="post" action="{{route('auth.deleteetudiant',$e->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                                <a class="btn btn-warning" href="{{route('auth.modifetudiant',$e->id)}}">Update</a>
                            </div>

                    </div>
                </div>
            @endforeach
            </div>

@endsection

