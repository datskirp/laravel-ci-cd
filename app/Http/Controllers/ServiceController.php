<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceFormRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-service');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceFormRequest $request, Service $service)
    {
        $validated = $request->validated();
        $service->fill($validated)->save();

        return redirect('/admin')->with('success', 'Service was created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Service $service
     */
    public function edit(Service $service, $id)
    {
        if (!$service = $service->firstWhere('id', $id)) {
            abort(404);
        }
        return view('edit-service', [
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceFormRequest $request, Service $service)
    {
        $validated = $request->validated();
        $service->where('id', $request->input('id'))->update($validated);

        return redirect('/admin')->with('success', sprintf('Service with id: %s was updated', $request->input('id')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Service $service
     */
    public function destroy(Service $service, $id)
    {
        if (!$service->firstWhere('id', $id)->delete()) {
            abort(404);
        }

        return back()->with('success', sprintf('Service with id: %s was deleted', $id));
    }
}
