@extends('auth.boostrap')
@extends('auth.navbar')
@section('content')
<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('auth.etudiant')}}">Home</a></li>

            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if($student->name_image)
                                <img src="/storage/photos/{{$student->name_image}}"  style="width:180px;">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->first_name}}  {{$student->last_name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Age</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                 {{$student->age}} ans
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Adresse</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{$student->adresse}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Classe</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->classe->libelle}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
