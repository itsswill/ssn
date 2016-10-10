<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SsnController extends Controller
{
 public function index(){

     return view ('ssn.create');

 }

    public function store(Request $request)
    {
        $areaNumber = $request->input('area_number');
        $groupNumber = $request->input('group_number');
        $serialNumber = $request->input('serial_number');

        $validator = Validator::make($request->all(), [
            'area_number' => 'required',
            'group_number' => 'required',
            'serial_number' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('ssn/create')
                ->withErrors($validator)
                ->withInput();
        }

        $ssn = new Ssn;
        $ssn->area_number = $areaNumber;
        $ssn->group_number = $groupNumber;
        $ssn->serial_number = $serialNumber;
        $ssn->save();
        return redirect()->action('SsnController@index');

    }

}
