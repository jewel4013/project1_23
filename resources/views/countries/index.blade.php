@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <p>{{ __('Catagories List') }}</p>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add New Country
                    </button>

                </div>
                <div class="card-body">
                    @include('partials.message')
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Country Name</th>
                                <th>Capital Name</th>
                                <th>Population</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="country_t">
                            @foreach ($countries as $country)    
                            <tr>
                                <td>{{$country->id}}</td>
                                <td>{{$country->country_name}}</td>
                                <td>{{$country->capital_name}}</td>
                                <td>{{$country->population}}</td>
                                <td>
                                    <button class="btn btn-sm btn-info edit-country" data-bs-toggle="modal" data-bs-target="#editExampleModal" data-country="{{$country}}">Edit</button> |
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create A New Country</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="" id="country_form">                
                <div class="modal-body">
                    <div class="alert d-none" role="alert" id="alert_msg"></div>

                    <div class="form-group">
                        <label for="country_name">Country Name</label>
                        <input type="text" class="form-control" name="country_name" id="country_name">
                    </div>
                    <div class="form-group">
                        <label for="capital_name">Capital</label>
                        <input type="text" class="form-control" name="capital_name" id="capital_name">
                    </div>
                    <div class="form-group">
                        <label for="population">Population</label>
                        <input type="text" class="form-control" name="population" id="population">
                    </div>
                </div>
                
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Country</button>
                </div>

            </form>


        </div>
    </div>
</div>













<!-- Edit Modal -->
<div class="modal fade" id="editExampleModal" tabindex="-1" aria-labelledby="editExampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="modal-header">
                <h5 class="modal-title" id="editExampleModalLabel">Edit your country</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="" id="country_edit_form">                
                <div class="modal-body">
                    
                    <div class="alert d-none" role="alert" id="alert_msg"></div>

                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="country_name">Country Name</label>
                        <input type="text" class="form-control" name="country_name" id="country_name">
                    </div>
                    <div class="form-group">
                        <label for="capital_name">Capital</label>
                        <input type="text" class="form-control" name="capital_name" id="capital_name">
                    </div>
                    <div class="form-group">
                        <label for="population">Population</label>
                        <input type="text" class="form-control" name="population" id="population">
                    </div>
                </div>
                
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Country</button>
                </div>

            </form>


        </div>
    </div>
</div>

@endsection



































@section('script')

    <script>
        $(function(){


            // ============= New Country insert ===================
            $('#country_form').submit(function(e){
                e.preventDefault();

                // var country_name = $('input[name="country_name"]').val();
                // var capital_name = $('input[name="capital_name"]').val();
                // var population = $('input[name="population"]').val();

                // console.log(country_name, capital_name, population);

                var form_data =  $('#country_form').serialize();

                $.ajax({
                    url: '/countries',
                    method: 'POST',
                    data: form_data,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(res){
                        if(!res.status){
                            $('#alert_msg').removeClass('d-none').removeClass('alert-success').addClass('alert-danger').html(res.message);
                        }else{
                            // $('#alert_msg').removeClass('d-none').removeClass('alert-danger').addClass('alert-success').html(res.message);

                            var res_data = JSON.stringify(res.data);
                            var t_data = `
                                <tr>
                                    <td>${res.data.id}</td>
                                    <td>${res.data.country_name}</td>
                                    <td>${res.data.capital_name}</td>
                                    <td>${res.data.population}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info edit-country" data-bs-toggle="modal" data-bs-target="#editExampleModal" data-country='${res_data}''>Edit</button> |
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            `;
                            $('#country_t').append(t_data);
                            $('#country_form')[0].reset();
                            $('#exampleModal').modal('hide');
                        }

                        alert_dismis();
                    },
                    error: function(res){
                        console.log(res);
                    }
                });
                
            });



             // ============= Edit Country ===================
             $('body').on('click', '.edit-country', function(e){
                e.preventDefault();

                var country = $(this).data('country');
                $('#editExampleModal form input[name="id"]').val(country.id);
                $('#editExampleModal form input[name="country_name"]').val(country.country_name);
                $('#editExampleModal form input[name="capital_name"]').val(country.capital_name);
                $('#editExampleModal form input[name="population"]').val(country.population);

                console.log($(this).data('country'));
                
            });



            // ============= Update Country ===================
            $('#country_edit_form').submit(function(e){
                e.preventDefault();

                var form_data =  $('#country_edit_form').serialize();
                var form_data_id = $('#country_edit_form input[name="id"]').val();
                console.log(form_data);

                $.ajax({
                    url: '/countries/'+form_data_id,
                    method: 'PATCH',
                    data: form_data,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(res){
                        if(!res.status){
                            $('.alert').removeClass('d-none').removeClass('alert-success').addClass('alert-danger').html(res.message);
                        }else{
                            // $('#alert_msg').removeClass('d-none').removeClass('alert-danger').addClass('alert-success').html(res.message);

                            // var res_data = JSON.stringify(res.data);
                            // var t_data = `
                            //     <tr>
                            //         <td>${res.data.id}</td>
                            //         <td>${res.data.country_name}</td>
                            //         <td>${res.data.capital_name}</td>
                            //         <td>${res.data.population}</td>
                            //         <td>
                            //             <button class="btn btn-sm btn-info edit-country" data-bs-toggle="modal" data-bs-target="#editExampleModal" data-country='${res_data}''>Edit</button> |
                            //             <button class="btn btn-sm btn-danger">Delete</button>
                            //         </td>
                            //     </tr>
                            // `;
                            // $('#country_t').append(t_data);
                            // $('#country_form')[0].reset();
                            $('#editExampleModal').modal('hide');
                            window.location.reload();
                        }

                        alert_dismis();
                    },
                    error: function(res){
                        console.log(res);
                    }
                });
                
            });



            function alert_dismis(){
                setTimeout(() => {
                    $('.alert').addClass('d-none');
                }, 3000);
            }


                      

            
        });
    </script>

@endsection