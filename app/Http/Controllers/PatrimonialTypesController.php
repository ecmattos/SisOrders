<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\PatrimonialTypeRepository;
use L52\Services\PatrimonialTypeService;

use Session;


class PatrimonialTypesController extends Controller
{
    /**
     * @var PatrimonialTypeRepository
     */
    protected $repository;

    /**
     * @var PatrimonialTypeService
     */
    protected $service;

    public function __construct(PatrimonialTypeRepository $repository, PatrimonialTypeService $service)
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
        
        $patrimonial_types = $this->repository->orderBy('description')->all();

        return view('patrimonial_types.index', compact('patrimonial_types'));
    }

    public function create()
    {
        return view('patrimonial_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PatrimonialTypeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PatrimonialTypeRequest $request)
    {
        $patrimonial_type = $this->service->create($request->all());

        Session::flash('flash_message_success', 'Tipo de Equipamentos cadastrado com sucesso !');
            
        return redirect()->route('patrimonial_types');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $patrimonialTypeId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($patrimonialTypeId)
    {
        $patrimonial_type = $this->repository->find($patrimonialTypeId);

        return view('patrimonial_types.show', compact('patrimonial_type'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $patrimonialTypeId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($patrimonialTypeId)
    {

        $patrimonial_type = $this->repository->find($patrimonialTypeId);

        return view('patrimonial_types.edit', compact('patrimonial_type'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PatrimonialTypeUpdateRequest $request
     * @param  string            $patrimonialTypeId
     *
     * @return Response
     */
    public function update(Requests\PatrimonialTypeRequest $request, $patrimonialTypeId)
    {
        $patrimonial_type = $this->service->update($patrimonialTypeId, $request->all());
            
        return redirect()->route('patrimonial_types');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $patrimonialTypeId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($patrimonialTypeId)
    {
        $deleted = $this->repository->delete($patrimonialTypeId);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'PatrimonialType deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'PatrimonialType deleted.');
    }
}


