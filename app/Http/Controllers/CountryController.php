<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $country = Country::OrderBy('id', 'ASC')->get();
        return view('country.index',compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$data = $request->all();
        $data = $request->validate(
            [
                'code' => 'required|unique:countries|max:255',
                'name' => 'required|unique:countries|max:255',
                'description' => 'required|max:255',
              
            ],
            [
                'code.unique' => 'Code đã có xin điền code khác',
                'name.unique' => 'Name đã có xin điền name khác',
                'code.required' => 'Vui lòng điền giúp tôi code',
                'name.required' => 'Vui lòng điền giúp tôi name',
                'description.required' => 'Vui lòng điền thông tin giúp tôi',
             
            ]
        );
        $country = new Country();
        $country->code = $data['code'];
        $country->name = $data['name'];
        $country->description = $data['description'];
        $country->save();
        toastr()->success('Thành Công','Bạn đã thêm Thành công');
        return redirect()->route('country.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $country = Country::find($id);
        return view('country.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $country = Country::find($id);
        $country->code = $data['code'];
        $country->name = $data['name'];
        $country->description = $data['description'];
        $country->save();
        toastr()->success('Thành Công','Bạn đã sửa Thành công');
        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $country = Country::find($id);
       $country->delete();
       toastr()->success('Thành Công','Bạn đã xóa Thành công');
        return redirect()->route('country.index');
    }
}
