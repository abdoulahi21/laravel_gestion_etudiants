@extends('auth.navbar')
@extends('auth.boostrap')
@section('content')






<div class="container col-md-4 ofset-2 shadow-lg p-3 mb-5 bg-body-tertiary rounded mt-5">
    <a class="btn btn-info mt-5 " style="color: white;" href="{{route('auth.formulaireclasse')}}">Ajouter</a>
    <br>
    <br>
    <div class="container">
    <div class="card ">
        <div class="card-header bg-info">
            <span style="color:white;"> Listes des Classes</span>
        </div>
            @if(session('success'))
                <alert class="alert alert-success">{{session('success')}}</alert>
            @endif
            <div class="card-body">

                <table id="datatablesSimple" class="table table-striped ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($classe as $cl)
                        <tr>
                            <th scope="row">{{$cl->id}}</th>
                            <td>{{$cl->libelle}}</td>
                            <td>

                                <form action="{{route('auth.deleteclasse',$cl)}}" method="post" >
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"  type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
