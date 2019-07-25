@extends('layout.app')
@section('content')

    <div class="register">
        <div class="alert alert-danger" id="error" style="display:none;"></div>
        <div class="alert alert-info" id="loading" style="display:none;">Loading...</div>
        <div class="alert alert-success" id="success" style="display:none;"></div>
        <div class="container no-padding-sm">
            <div class="row">
                <div class="col-md-6">
                    <div id="loginForm" class="comments-form light">
                        <div class="title-form">Edit {{$route['A']}} to {{$route['B']}}</div>
                        <br>
                        <label>From</label>
                        <input value="{{$route['A']}}" type="text" id="from" class="input form-control"  placeholder="From" required>
                        <br>
                        <label>To</label>
                        <input value="{{$route['B']}}" type="text" id="to" class="input form-control" placeholder="To" required>
                        <br>
                        <label>Price</label>
                        <input value="{{$route['rprice']}}" type="number" id="price" class="input form-control"  placeholder="Price" required>
                        <br>
                        <label>Bus stops between</label>
                        <textarea type="text" id="nodes" class="input form-control" placeholder="Nodes">{{$route['nodes']}}</textarea>
                        <br>
                        <label>Price</label>
                        <input value="{{$route['rdistance']}}" type="text" id="distance" class="input form-control" placeholder="Distance">
                        <br>
                        <label>Vehicle Type</label>
                        <select name="type" id="vehicleTypes" class="input form-control" value="{{$route['type']}}">
                            <option value="">Vehicle</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-block" id="btnLogin" onclick="editRoute({{$route['RID']}})">UPDATE ROUTE</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script>
        getVehicleTypes('vehicleTypes')
    </script>
@endsection
@endsection