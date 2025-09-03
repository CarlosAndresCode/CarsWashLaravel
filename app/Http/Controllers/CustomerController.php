<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Trait\AlertSweetTrait;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;


class CustomerController extends Controller
{
    use AlertSweetTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search') && $request->search != ''){
            $customers = Customer::Select(['id', 'name', 'last_name', 'email', 'phone'])
                        ->where('name', 'like', '%'.$request->search.'%')
                        ->paginate(10);
        }else{
            $customers = Customer::Select(['id', 'name', 'last_name', 'email', 'phone'])
                ->orderBy('id', 'desc')
                ->paginate(10);
        }

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        if($customer)
            $this->generateAlert('success', 'Customer created successfully.');
        else
            $this->generateAlert('error', 'Error creating customer.');


        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        if($customer)
            $this->generateAlert('success', 'Customer updated successfully.');
        else
            $this->generateAlert('error', 'Error updating customer.');


        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
