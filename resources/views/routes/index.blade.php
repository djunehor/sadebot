@extends('layout.app')
@section('content')

    <div class="register">
        <div class="alert alert-danger" id="error" style="display:none;"></div>
        <div class="alert alert-info" id="loading" style="display:none;">Loading...</div>
        <div class="alert alert-success" id="success" style="display:none;"></div>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Nodes</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Distance</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody >
                @foreach($routes as $route)
                <tr id="route-{{$route->id}}">
                <td>{{$route->id}}</td>
                <td>{{$route->origin}}</td>
                <td>{{$route->destination}}</td>
                <td>{{$route->nodes}}</td>
                <td>{{$route->vehicle->name ?? 'N/A'}}</td>
                <td>{{$route->price}}</td>
                <td>{{$route->distance}}</td>
               <td>
                   <button class="btn btn-danger" id="btn-{{$route->id}}" onclick="deleteRoute({{$route->id}})">Delete</button>
                   <a class="btn btn-info" href="{{route('routes.edit',['id' => $route->id])}}">Edit</a>
               </td>
                </tr>
                    @endforeach
                </tbody>

            </table>
            <ul class="pagination" role="pagination">
                {!! $routes->links() !!}
            </ul>

        </div>

        @section('scripts')
            <script>

                function deleteRoute(id) {
                    let r = confirm(`Are you sure to delete route #${id}`);
                    if(!r) return;
                    $("#loading").show();
                    $(`#btn-${id}`).attr('disabled', 'disabled');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: BASE_API+"/routes/"+id,
                        type: "DELETE",
                        success: function(data)
                        {
                            $('#loading').hide();
                            $(`#route-${id}`).hide();
                        },
                        error: function (xhr) {

                            $('#loading').hide();
                            var response = $.parseJSON(xhr.responseText);
                        }
                    });
                }
            </script>
@endsection
@endsection
