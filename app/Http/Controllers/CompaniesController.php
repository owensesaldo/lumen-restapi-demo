<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Companies;

class CompaniesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Companies::all();
        return response()->json($companies);
    }

    /**
     * Get the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $company = Companies::where('id', $id)->get();
        if(!empty($company['items'])){
            return response()->json($company);
        }
        else{
            return response()->json(['status' => 'fail']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
        'name' => 'required',
        'description' => 'required',
        'category' => 'required'
         ]);

        $company = new Companies();
        $company->name = $request->name;
        $company->description = $request->description;
        $company->category = $request->category;
        $company->date_added = date('Y-m-d');
        $company->save();
        return response()->json(['status' => 'success']);
        
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
        //
        $this->validate($request, [
        'name' => 'required',
        'description' => 'required',
        'category' => 'required'
         ]);

        $company = Companies::find($id);
        $company->name = $request->name;
        $company->description = $request->description;
        $company->category = $request->category;
        $company->save();
        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Companies::destroy($id)){
             return response()->json(['status' => 'success']);
        }
    }
}