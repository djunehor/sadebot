@extends('layout.app')
@section('content')
    <div class="register">
        <div class="alert alert-danger" id="error" style="display:none;"></div>
        <div class="alert alert-info" id="loading" style="display:none;">Loading...</div>
        <div class="alert alert-success" id="success" style="display:none;"></div>
        <div class="container no-padding-sm">
            <div class="row">
                <div class="col-md-6">
                    @include('layout.response')
                    <form method="post" action="{{route('routes.update', ['id' => $route->id])}}" class="comments-form light">
                        {{method_field('PATCH')}}
                        @csrf
                        <div class="title-form">Edit {{$route->origin}} to {{$route->destination}}</div>
                        <br>
                        <label>From</label>
                        <input value="{{$route->origin ?? old('origin')}}" type="text" name="origin" class="input form-control"  placeholder="From" required>
                        <br>
                        <label>To</label>
                        <input value="{{$route->destination ?? old('destination')}}" type="text" name="destination" class="input form-control" placeholder="To" required>
                        <br>
                        <label>Price</label>
                        <input value="{{$route->price ?? old('destination')}}" type="number" name="price" class="input form-control"  placeholder="Price" required>
                        <br>
                        <label>Bus stops between</label>
                        <textarea type="text" name="nodes" class="input form-control" placeholder="Nodes">{{$route->nodes ?? old('nodes')}}</textarea>
                        <br>
                        <label>Distance</label>
                        <input value="{{$route->distance ?? old('distance')}}" type="text" name="distance" class="input form-control" placeholder="Distance">
                        <br>
                        <label>Vehicle Type</label>
                        <select name="vehicle_id" class="input form-control">
                            @foreach($vehicle_types as $vehicle)
                            <option @if($route->vehicle_id == $vehicle->id || old('vehicle_id') == $vehicle->id) selected @endif value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                                @endforeach
                        </select>
                        <br>
                        <button type="submit" class="btn btn-block btn-info" >UPDATE ROUTE</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
