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
                        <tr>
                            <th>Id</th>
                            <th>Country Name</th>
                            <th>Capital Name</th>
                            <th>Population</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>India</td>
                            <td>Dehli</td>
                            <td>145000000</td>
                            <td>
                                <button class="btn btn-sm btn-info">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Pakistan</td>
                            <td>Islamad</td>
                            <td>45000000</td>
                            <td>
                                <button class="btn btn-sm btn-info">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="" id="country_form">
                <div class="modal-body">
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


@endsection


@section('script')

    <script>
        $(function(){
            $('#country_form').submit(function(e){
                e.preventDefault();

                var country_name = $('input[name="country_name"]').val();
                var capital_name = $('input[name="capital_name"]').val();
                var population = $('input[name="population"]').val();

                console.log(country_name, capital_name, population);
            });
        });
    </script>

@endsection