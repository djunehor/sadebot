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
                <tbody id="user_banks">

                </tbody>
                <tfoot>
                <tr>
                    <td id="total"></td>
                    <td id="per_page"></td>
                    <td id="first_page"></td>
                    <td id="next_page"></td>
                    <td id="last_page"></td>
                </tr>
                </tfoot>
            </table>
        </div>

        @section('scripts')
            <script>
                var token = readCookie('TOKEN');
                var page = getUrlParameter('page') !== 'undefined' ? getUrlParameter('page') : 1;
                var per_page = getUrlParameter('per_page') !== 'undefined' ? getUrlParameter('per_page') : 50;
                $.ajax({
                    url: BASE_API+"/api/route",
                    data: {
                        page: page,
                        per_page: per_page
                    },
                    type: "GET",
                    headers: {
                        "app-id": 'test.sadebot.com',
                        "token": token
                    },
                    success: function(data) {
                        var table = "";
                        var banks = data.data;

                        console.log(data);
                        for (i = 0; i < banks.length; i++) {

                            table +="<tr id='node"+banks[i]['RID']+"'><td>"+banks[i]['RID']+"</td>";
                            table +="<td>"+banks[i]['A']+"</td>";
                            table +="<td>"+banks[i]['B']+"</td>";
                            table +="<td>"+banks[i]['nodes']+"</td>";
                            table +="<td>"+banks[i]['type']+"</td>";
                            table +="<td>"+banks[i]['rprice']+"</td>";
                            table +="<td>"+banks[i]['rdistance']+"</td>";
                            table +='<td><button class="btn-danger" id="btn'+banks[i]['RID']+'" onclick="deleteRoute(\''+banks[i]['RID']+'\')">Delete</button> <a class="btn-info" href="{{url('transport-routes/edit')}}/'+banks[i]['RID']+'">Edit</a></td></tr>';
                        }

                        $("#user_banks").html(table);
                        $("#total").html(data.total);
                        $("#per_page").html(data.per_page);
                        $("#first_page").html('<a href="?page=1">First Page');
                        $("#next_page").html('<a href="?page='+(data.current_page !== data.last_page ? data.current_page+1 : data.current_page)+'">Next Page');
                        $("#prev_page").html('<a href="'+(data.current_page !== 1 ? data.current_page-1 : 1)+'">Prev Page');
                        $("#last_page").html('<a href="?page='+data.last_page+'">Last Page');
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });

                function deleteRoute(id) {
                    $("#loading").show();
                    $("#btn"+id).attr('disabled', 'disabled');

                    var token = readCookie(BASE_API);
                    $.ajax({
                        url: BASE_API+"/api/route/"+id,
                        type: "DELETE",
                        headers: {
                            "app-id": 'test.sadebot.com',
                            "token": token
                        },
                        success: function(data)
                        {
                            $('#loading').hide();
                            $('#node'+id).hide();
                            $('#btnSubmit').removeAttr('disabled');

                            if(!data['status']) {
                                $('#error').show();
                                $('#error').html(data);
                            }
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);

                            $('#loading').hide();

                            var response = $.parseJSON(xhr.responseText);

                            $('#error').show();
                            $('#error').html(response['error']);
                        }
                    });
                }
            </script>
@endsection
@endsection