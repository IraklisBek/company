<?php

namespace App\Http\Controllers\Admin;

use App\Acme\Container\DataContainer;
use App\Acme\Services\GeneralService;
use App\Acme\Services\ValidationService;
use App\General;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = DataContainer::getOnePageWebsiteData();
        return view('admin.pages.general.index')
            ->with('data', $data);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id, $page)
    {
        //$general = General::find(1);
        $data = DataContainer::getOnePageWebsiteData();
        $validator = ValidationService::validateUpdateGeneral($request, $data['generals'], $page);
        if($validator->fails())
            return redirect()->route('general.index')->withErrors($validator)->withInput();
        GeneralService::createOrUpdateGeneral($data['generals'], $request, $page);
        return redirect()->route('general.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
