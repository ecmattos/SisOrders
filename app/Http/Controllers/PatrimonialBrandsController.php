<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\PatrimonialBrandRepository;
use L52\Services\PatrimonialBrandService;

use Session;


class PatrimonialBrandsController extends Controller
{
    /**
     * @var PatrimonialBrandRepository
     */
    protected $repository;

    /**
     * @var PatrimonialBrandService
     */
    protected $service;

    public function __construct(PatrimonialBrandRepository $repository, PatrimonialBrandService $service)
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
        
        $patrimonial_brands = $this->repository->orderBy('description')->all();

        return view('patrimonial_brands.index', compact('patrimonial_brands'));
    }

    public function create()
    {
        return view('patrimonial_brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PatrimonialBrandCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PatrimonialBrandRequest $request)
    {
        $patrimonial_brand = $this->service->create($request->all());

        Session::flash('flash_message_success', 'Marca de Equipamento cadastrado com sucesso !');
            
        return redirect()->route('patrimonial_brands');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $patrimonialBrandId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($patrimonialBrandId)
    {
        $patrimonial_brand = $this->repository->find($patrimonialBrandId);

        $logs = $patrimonial_brand->revisionHistory;

        return view('patrimonial_brands.show', compact('patrimonial_brand', 'logs'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $patrimonialBrandId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($patrimonialBrandId)
    {

        $patrimonial_brand = $this->repository->find($patrimonialBrandId);

        return view('patrimonial_brands.edit', compact('patrimonial_brand'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PatrimonialBrandUpdateRequest $request
     * @param  string            $patrimonialBrandId
     *
     * @return Response
     */
    public function update(Requests\PatrimonialBrandRequest $request, $patrimonialBrandId)
    {
        $patrimonial_brand = $this->service->update($patrimonialBrandId, $request->all());
            
        return redirect()->route('patrimonial_brands');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $patrimonialBrandId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($patrimonialBrandId)
    {
        $deleted = $this->repository->delete($patrimonialBrandId);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'PatrimonialBrand deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'PatrimonialBrand deleted.');
    }
}


