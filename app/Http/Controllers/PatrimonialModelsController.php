<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\PatrimonialBrandRepository;
use L52\Repositories\PatrimonialModelRepository;
use L52\Services\PatrimonialModelService;

use Session;


class PatrimonialModelsController extends Controller
{
    /**
     * @var PatrimonialModelRepository
     */
    protected $patrimonial_brandRepository;

    /**
     * @var PatrimonialModelRepository
     */
    protected $patrimonial_modelRepository;

    /**
     * @var PatrimonialModelService
     */
    protected $patrimonial_modelService;

    public function __construct(PatrimonialBrandRepository $patrimonial_brandRepository,PatrimonialModelRepository $patrimonial_modelRepository, PatrimonialModelService $patrimonial_modelService)
    {
        $this->patrimonial_brandRepository = $patrimonial_brandRepository;
        $this->patrimonial_modelRepository = $patrimonial_modelRepository;
        $this->patrimonial_modelService  = $patrimonial_modelService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->patrimonial_modelRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        
        $patrimonial_models = $this->patrimonial_modelRepository->orderBy('description')->all();

        return view('patrimonial_models.index', compact('patrimonial_models'));
    }

    public function create()
    {
        $patrimonial_brands = array(''=>'') + $this->patrimonial_brandRepository
            ->lists('description', 'id')
            ->all();

        return view('patrimonial_models.create', compact('patrimonial_brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PatrimonialModelCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PatrimonialModelRequest $request)
    {
        $patrimonial_model = $this->patrimonial_modelService->create($request->all());

        Session::flash('flash_message_success', 'Marca de Equipamento cadastrado com sucesso !');
            
        return redirect()->route('patrimonial_models');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $patrimonialModelId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($patrimonialModelId)
    {
        $patrimonial_model = $this->patrimonial_modelRepository->find($patrimonialModelId);

        $logs = $patrimonial_model->revisionHistory;

        return view('patrimonial_models.show', compact('patrimonial_model', 'logs'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $patrimonialModelId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($patrimonialModelId)
    {
        $patrimonial_brands = $this->patrimonial_brandRepository
            ->lists('description', 'id')
            ->all();

        $patrimonial_model = $this->patrimonial_modelRepository->find($patrimonialModelId);

        return view('patrimonial_models.edit', compact('patrimonial_model', 'patrimonial_brands'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PatrimonialModelUpdateRequest $request
     * @param  string            $patrimonialModelId
     *
     * @return Response
     */
    public function update(Requests\PatrimonialModelRequest $request, $patrimonialModelId)
    {
        $patrimonial_model = $this->patrimonial_modelService->update($patrimonialModelId, $request->all());
            
        return redirect()->route('patrimonial_models');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $patrimonialModelId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($patrimonialModelId)
    {
        $deleted = $this->patrimonial_modelRepository->delete($patrimonialModelId);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'PatrimonialModel deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'PatrimonialModel deleted.');
    }
}


