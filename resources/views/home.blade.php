@extends('layouts.app')

@section('content')





<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{Auth::user()->name}}
                    is a cool guy.


                    <form method="POST" action="/home">
                        {{ csrf_field() }}
                        
                        <div>
                            <input type="text" name="name" placeholder="Add a System">

                            <input type="text" name="XCoordinate" placeholder="How far away?">

                            <input type="text" name="YCoordinate" placeholder="Where in is it in it's orbit?">

                            <ul>

                            <input type="radio" name="Satelites" value='[{"name" : "PlanetA", "amp":50, "degree":180, "trackX":0, "trackY":0, "moons": 
                                [
                                    {"name": "moonA", "amp":50, "degree":180, "trackX": 0 , "trackY": 0 }
                                ] 
                                }]'>Planets<br>
                            <input type="radio" name="Satelites" value='[]'>No Planets<br>

                            </ul>
                        </div>

                        <div>
                            <button type="submit">+</button>
                        </div>

                        <div class="notification is-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </form>



                        <h2>Systems</h2>
                        @foreach ($systems as $System) <a type="button" href="editObj/{{ $System->id }}" class="btn btn-success">Edit</a>

                        <li> Name: {{$System->name}} X:{{$System->XCoordinate}} Y:{{$System->YCoordinate}}  </li>
        
                        @endforeach
                </div>
            </div>

            <a href="/Milk">Go to Galaxy</a>
        </div>
    </div>
</div>
@endsection
