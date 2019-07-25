@extends('layout.app')
@section('content')

    <div class="register">
        <div class="alert alert-danger" id="error" style="display:none;"></div>
        <div class="alert alert-info" id="loading" style="display:none;">Loading...</div>
        <div class="alert alert-success" id="success" style="display:none;"></div>
        <div class="container no-padding-sm">
            <div class="row">
                <div class="col-md-6">
                    <form id="newRoute" class="comments-form light">
                        <div class="title-form">{{$title}}</div>
                        <label>From</label>
                        <input type="text" id="from" class="input form-control"  placeholder="From" required>
                        <br>
                        <label>To</label>
                        <input type="text" id="to" class="input form-control" placeholder="To" required>
                        <br>
                        <label>Price</label>
                        <input type="number" id="price" class="input form-control"  placeholder="Price" required>
                        <br>
                        <label>Bus stops between both ends in order of occurence</label>
                        <textarea type="text" id="nodes" class="input form-control" placeholder="Nodes"></textarea>
                        <br>
                        <label>Distance</label>
                        <input type="text" id="distance" class="input form-control" value="0" placeholder="Distance">
                        <br>
                        <label>Vehicle Type</label>
                        <select name="type" id="vehicleTypes" class="input form-control">
                        <option value="">Vehicle</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-block" id="btnLogin" onclick="newRoute()">ADD ROUTE</button>

                    </form>
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