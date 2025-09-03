<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Trait\AlertSweetTrait;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;


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

        if($customer){
            $this->generateAlert('success', 'Customer created successfully.');
        }else{
            $this->generateAlert('error', 'Error creating customer.');
        }

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
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,'.$customer->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
