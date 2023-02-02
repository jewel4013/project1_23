<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('countries.index', [
            'countries' => Country::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(request()->all(), [
            'country_name' => 'required|unique:countries,country_name',
            'capital_name' => 'required',
            'population' => 'required|numeric',
        ]);

        if($validate->fails())
        {
            return ['status' => false, 'message' => 'Data validation fail.'];
        }


        $country = Country::create(request()->all());
        return ['status' => true, 'message' => 'Country Creation successful.', 'data' => $country];



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $country = Country::find($id);

        $validate = Validator::make(request()->all(), [
            'country_name' => 'required|unique:countries,country_name,'.$country->id,
            'capital_name' => 'required',
            'population' => 'required|numeric',
        ]);

        if($validate->fails())
        {
            return ['status' => false, 'message' => 'Data validation fail.'];
        }
    
        

        $country->update(request()->except('id'));

        return ['status' => true, 'message' => 'Country update success'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();

        return ['status' => true, 'message' => 'Country Delete success'];
    }
}
