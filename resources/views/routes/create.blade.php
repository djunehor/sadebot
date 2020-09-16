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
                    <form class="comments-form light" method="post" action="{{url('routes')}}">
                        @csrf
                        <div class="title-form">{{$title}}</div>
                        <label>From</label>
                        <input value="{{old('origin')}}" type="text" name="origin" class="input form-control"  placeholder="From" required>
                        <br>
                        <label>To</label>
                        <input value="{{old('destination')}}" type="text" name="destination" class="input form-control" placeholder="To" required>
                        <br>
                        <label>Price</label>
                        <input value="{{old('price')}}" type="number" name="price" class="input form-control"  placeholder="Price" required>
                        <br>
                        <label>Bus stops between both ends in order of occurence</label>
                        <textarea type="text" name="nodes" class="input form-control" placeholder="Nodes">{{old('nodes')}}</textarea>
                        <br>
                        <label>Distance</label>
                        <input value="{{old('distance', 0)}}" type="text" name="distance" class="input form-control"  placeholder="Distance">
                        <br>
                        <label>Vehicle Type</label>
                        <select name="vehicle_id" class="input form-control">
                            @foreach($vehicle_types as $vehicle)
                        <option @if(old('vehicle_id') == $vehicle->id) selected @endif value="{{$vehicle->VID}}">{{$vehicle->vname}}</option>
                                @endforeach
                        </select>
                        <br>
                        <button type="submit" class="btn btn-block btn-success" >ADD ROUTE</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
