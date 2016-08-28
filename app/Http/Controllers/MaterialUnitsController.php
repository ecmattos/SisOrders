<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\MaterialUnitRepository;
use L52\Services\MaterialUnitService;

use Session;


class MaterialUnitsController extends Controller
{
    /**
     * @var MaterialUnitRepository
     */
    protected $repository;

    /**
     * @var MaterialUnitService
     */
    protected $service;

    public function __construct(MaterialUnitRepository $repository, MaterialUnitService $service)
    {
        $this->repository = $repository;
        $this->service  = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        
        $material_units = $this->repository->orderBy('description')->all();

        return view('material_units.index', compact('material_units'));
    }

    public function create()
    {
        return view('material_units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MaterialUnitCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\MaterialUnitRequest $request)
    {
        $material_unit = $this->service->create($request->all());

        Session::flash('flash_message_success', 'Unidade de Material cadastrado com sucesso !');
            
        return redirect()->route('material_units');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $materialUnitId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($materialUnitId)
    {
        $material_unit = $this->repository->find($materialUnitId);

        return view('material_units.show', compact('material_unit'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $materialUnitId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($materialUnitId)
    {

        $material_unit = $this->repository->find($materialUnitId);

        return view('material_units.edit', compact('material_unit'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MaterialUnitUpdateRequest $request
     * @param  string            $materialUnitId
     *
     * @return Response
     */
    public function update(Requests\MaterialUnitRequest $request, $materialUnitId)
    {
        $material_unit = $this->service->update($materialUnitId, $request->all());
            
        return redirect()->route('material_units');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $materialUnitId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($materialUnitId)
    {
        $deleted = $this->repository->delete($materialUnitId);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'MaterialUnit deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'MaterialUnit deleted.');
    }
}
