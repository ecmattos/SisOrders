<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\PatrimonialSubTypeRepository;
use L52\Services\PatrimonialSubTypeService;

use Session;


class PatrimonialSubTypesController extends Controller
{
    /**
     * @var PatrimonialSubTypeRepository
     */
    protected $repository;

    /**
     * @var PatrimonialSubTypeService
     */
    protected $service;

    public function __construct(PatrimonialSubTypeRepository $repository, PatrimonialSubTypeService $service)
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
        
        $patrimonial_sub_types = $this->repository->orderBy('description')->all();

        return view('patrimonial_sub_types.index', compact('patrimonial_sub_types'));
    }

    public function create()
    {
        return view('patrimonial_sub_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PatrimonialSubTypeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PatrimonialSubTypeRequest $request)
    {
        $patrimonial_sub_type = $this->service->create($request->all());

        Session::flash('flash_message_success', 'Sub-tipo de Equipamentos cadastrado com sucesso !');
            
        return redirect()->route('patrimonial_sub_types');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $patrimonialSubTypeId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($patrimonialSubTypeId)
    {
        $patrimonial_sub_type = $this->repository->find($patrimonialSubTypeId);

        return view('patrimonial_sub_types.show', compact('patrimonial_sub_type'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $patrimonialSubTypeId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($patrimonialSubTypeId)
    {

        $patrimonial_sub_type = $this->repository->find($patrimonialSubTypeId);

        return view('patrimonial_sub_types.edit', compact('patrimonial_sub_type'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PatrimonialSubTypeUpdateRequest $request
     * @param  string            $patrimonialSubTypeId
     *
     * @return Response
     */
    public function update(Requests\PatrimonialSubTypeRequest $request, $patrimonialSubTypeId)
    {
        $patrimonial_sub_type = $this->service->update($patrimonialSubTypeId, $request->all());
            
        return redirect()->route('patrimonial_sub_types');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $patrimonialSubTypeId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($patrimonialSubTypeId)
    {
        $deleted = $this->repository->delete($patrimonialSubTypeId);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'PatrimonialSubType deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'PatrimonialSubType deleted.');
    }
}


