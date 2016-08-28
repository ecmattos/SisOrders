<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\MaterialRepository;
use L52\Repositories\MaterialUnitRepository;
use L52\Services\MaterialService;

use Session;


class MaterialsController extends Controller
{
    /**
     * @var MaterialUnitRepository
     */
    protected $material_unitRepository;

    /**
     * @var MaterialRepository
     */
    protected $materialRepository;

    /**
     * @var MaterialService
     */
    protected $materialService;

    public function __construct(MaterialRepository $materialRepository, MaterialService $materialService, MaterialUnitRepository $material_unitRepository)
    {
        $this->materialRepository = $materialRepository;
        $this->materialService  = $materialService;
        $this->material_unitRepository = $material_unitRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->materialRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        
        $materials = $this->materialRepository->orderBy('description')->all();

        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        $material_units = array(''=>'') + $this->material_unitRepository
            ->lists('description', 'id')
            ->all();

        return view('materials.create', compact('material_units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MaterialCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\MaterialRequest $request)
    {
        $input = $request->all();

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['cost_value'] = $numberFormatter_ptBR2en->parse($input['cost_value']);
        $input['sale_value'] = $numberFormatter_ptBR2en->parse($input['sale_value']);
        $input['stock_qty'] = $numberFormatter_ptBR2en->parse($input['stock_qty']);

        $material = $this->materialService->create($input);

        Session::flash('flash_message_success', 'Material cadastrado com sucesso !');
            
        return redirect()->route('materials');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $materialId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($materialId)
    {
        $material = $this->materialRepository->find($materialId);

        return view('materials.show', compact('material'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $materialId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($materialId)
    {
        $material_units = $this->material_unitRepository
            ->lists('description', 'id')
            ->all();

        $material = $this->materialRepository->find($materialId);

        return view('materials.edit', compact('material', 'material_units'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MaterialUpdateRequest $request
     * @param  string            $materialId
     *
     * @return Response
     */
    public function update(Requests\MaterialRequest $request, $materialId)
    {
        $input = $request->all();

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['cost_value'] = $numberFormatter_ptBR2en->parse($input['cost_value']);
        $input['sale_value'] = $numberFormatter_ptBR2en->parse($input['sale_value']);
        $input['stock_qty'] = $numberFormatter_ptBR2en->parse($input['stock_qty']);

        $material = $this->materialService->update($materialId, $input);
            
        return redirect()->route('materials');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $materialId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($materialId)
    {
        $deleted = $this->materialRepository->delete($materialId);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Material deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Material deleted.');
    }
}
