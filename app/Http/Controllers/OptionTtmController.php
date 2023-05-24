<?php

namespace App\Http\Controllers;

use App\Models\OptionTtm;
use App\Http\Requests\StoreOptionTtmRequest;
use App\Http\Requests\UpdateOptionTtmRequest;

class OptionTtmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $optionTtms = OptionTtm::all();
        return view('optionsttm.index', compact('optionTtms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $optionTtms = OptionTtm::all();
        return view('optionsttm.index' , compact('optionTtms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOptionTtmRequest $request)
    {
        OptionTtm::create([
            'nom' => $request->nom,
            'minComplexite' => $request->minComplexite,
            'maxComplexite' => $request->maxComplexite,
        ]);
        return redirect()->route('optionsttm.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OptionTtm $optionTtm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OptionTtm $optionTtm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOptionTtmRequest $request, OptionTtm $optionTtm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OptionTtm $optionTtm)
    {
        //
    }
}
