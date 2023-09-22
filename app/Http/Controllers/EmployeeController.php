<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Employee::all();
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
        //
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);
    
        // Get the uploaded file
        $file = $request->file('csv_file');
    
        $csv = array_map('str_getcsv', file($file));
        foreach ($csv as $row) {
            Employee::create([
                'id' => $row[0],
                'name_prefix' => $row[1],
                'first_name' => $row[1],
                'middle_initial' => $row[1],
                'last_name' => $row[1],
                'gender' => $row[1],
                'e_mail' => $row[1],
                'date_of_birth' => $row[1],
                'time_of_birth' => $row[1],
                'age' => $row[1],
                'date_of_joining' => $row[1],
                'age_in_company' => $row[1],
                'phone_no' => $row[1],
                'place_name' => $row[1],
                'county' => $row[1],
                'city' => $row[1],
                'zip' => $row[1],
                'region' => $row[1],
                'username' => $row[1],
            ]);
        }
    
        return redirect()->back()->with('success', 'CSV data imported successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return 'Successfully removed!';
    }
}
