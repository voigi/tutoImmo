<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Http\Requests\Admin\OptionFormRequest;
class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.options.index', 
       ['options' =>Option::paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option = new Option();

        return view('admin.options.form', ['option' => $option]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {
        $option=Option::create($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option a bien été créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // route('admin.options.index');
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(option $option)
    {
        return view(
            'admin.options.form',
            ['option' => $option]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(optionFormRequest $request, option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success','L\'option a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(option $option)
    {
        $option->delete();
        return to_route('admin.option.index')->with('success','L\'option a été supprimé');
    }
}
