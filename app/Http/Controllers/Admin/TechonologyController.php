<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechnologyCreateRequest;
use App\Models\Technology;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class TechonologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.technologies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors= [
            'gray'     => 'gray',
            'red'   => 'red',
            'yellow'  => 'yellow',
            'green'  => 'green',
            'blue'  => 'blue',
            'indigo'  => 'indigo',
            'purple'  => 'purple',
            'pink'  => 'pink',
            ]
            ;
        return view('admin.technologies.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologyCreateRequest $request)
    {
        $technology = Technology::create($request->all());
        return redirect()->route('admin.technologies.edit', $technology)->with('info', 'La tecnologia se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        $colors= [
            'gray'     => 'gray',
            'red'   => 'red',
            'yellow'  => 'yellow',
            'green'  => 'green',
            'blue'  => 'blue',
            'indigo'  => 'indigo',
            'purple'  => 'purple',
            'pink'  => 'pink',
            ]
            ;
        return view('admin.technologies.edit', compact('technology', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $technology->update($request->all());

        return redirect()->route('admin.technologies.edit', $technology)->with('info', 'La tecnologia se edito correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete($technology);
        return redirect()->route('admin.technologies.index')->with('info', 'La categoria se elimino correctamente');
    }
}
