<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $person = Person::OrderBy('id','asc')->get();
        return view('person.index',compact('person'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //$data = $request->all();
         $data = $request->validate(
            [
                'full_name' => 'required|max:255',
                'gender' => 'required|max:255',
                'birthdate' => 'required|max:255',
                'phone_number' => 'required|max:255',
                'address' => 'required|max:255'
              
            ],
            [
                'full_name.required' => 'Vui lòng điền giúp tôi full_name',
                'gender.required' => 'Vui lòng điền giúp tôi gender',
                'birthdate.required' => 'Vui lòng điền giúp tôi birthdate',
                'phone_number.required' => 'Vui lòng điền giúp tôi phone_number',
                'address.required' => 'Vui lòng điền địa chỉ thông tin giúp tôi',
             
            ]
        );
        $person = new Person();
        $person->full_name = $data['full_name'];
        $person->gender = $data['gender'];
        $person->birthdate = $data['birthdate'];
        $person->phone_number = $data['phone_number'];
        $person->address = $data['address'];
        $person->save();
        toastr()->success('Thành Công','Bạn đã thêm Thành công');
        return redirect()->route('person.index');
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
        $person = Person::find($id);
        return view('person.edit',compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $person = person::find($id);
        $person->full_name = $data['full_name'];
        $person->gender = $data['gender'];
        $person->birthdate = $data['birthdate'];
        $person->phone_number = $data['phone_number'];
        $person->address = $data['address'];
        $person->save();
        toastr()->success('Thành Công','Bạn đã sủa Thành công');
        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $person = Person::find($id);
       $person->delete();
       toastr()->success('Thành Công','Bạn đã xóa Thành công');
        return redirect()->route('person.index');
    }
}
