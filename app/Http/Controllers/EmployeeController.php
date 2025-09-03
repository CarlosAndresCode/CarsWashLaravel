<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Trait\AlertSweetTrait;
use App\Http\Requests\CreateEmployeeRequest;


class EmployeeController extends Controller
{
    use AlertSweetTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search') && $request->search != ''){
            $employees = Employee::Select(['id', 'name', 'last_name', 'email', 'phone', 'position'])
                ->where('name', 'like', '%'.$request->search.'%')
                ->paginate(10);
        }else{
            $employees = Employee::Select(['id', 'name', 'last_name', 'email', 'phone', 'position'])
                ->orderBy('id', 'desc')
                ->paginate(10);
        }
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());

        if ($employee)
            $this->generateAlert('success', 'Employee created successfully.');
        else
            $this->generateAlert('error', 'Error creating employee.');

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        if($employee)
            $this->generateAlert('success', 'Employee updated successfully.');
        else
            $this->generateAlert('error', 'Error updating employee.');

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
