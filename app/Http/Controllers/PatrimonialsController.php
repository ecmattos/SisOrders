<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\PatrimonialRepository;
use L52\Services\PatrimonialService;
use L52\Repositories\PatrimonialTypeRepository;
use L52\Repositories\PatrimonialSubTypeRepository;
use L52\Repositories\PatrimonialBrandRepository;
use L52\Repositories\PatrimonialModelRepository;
use L52\Repositories\ClientRepository;
use L52\Repositories\OrderRepository;
use L52\Repositories\OrderServiceRepository;
use L52\Repositories\OrderMaterialRepository;

use Session;


class PatrimonialsController extends Controller
{
    protected $patrimonialRepository;
    protected $patrimonialService;
    protected $patrimonial_typeRepository;
    protected $patrimonial_sub_typeRepository;
    protected $patrimonial_brandRepository;
    protected $patrimonial_modelRepository;
    protected $clientRepository;
    protected $orderRepository;
    protected $order_serviceRepository;
    protected $order_materialRepository;

    public function __construct(PatrimonialRepository $patrimonialRepository, PatrimonialService $patrimonialService, PatrimonialTypeRepository $patrimonial_typeRepository, PatrimonialSubTypeRepository $patrimonial_sub_typeRepository, PatrimonialBrandRepository $patrimonial_brandRepository, PatrimonialModelRepository $patrimonial_modelRepository, ClientRepository $clientRepository, OrderRepository $orderRepository, OrderServiceRepository $order_serviceRepository, OrderMaterialRepository $order_materialRepository)
    {
        $this->patrimonialRepository            = $patrimonialRepository;
        $this->patrimonialService               = $patrimonialService;
        $this->patrimonial_typeRepository       = $patrimonial_typeRepository;
        $this->patrimonial_sub_typeRepository   = $patrimonial_sub_typeRepository;
        $this->patrimonial_brandRepository      = $patrimonial_brandRepository;
        $this->patrimonial_modelRepository      = $patrimonial_modelRepository;
        $this->clientRepository                 = $clientRepository;
        $this->orderRepository                  = $orderRepository;
        $this->order_serviceRepository          = $order_serviceRepository;
        $this->order_materialRepository         = $order_materialRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->patrimonialRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        
        $patrimonials = $this->patrimonialRepository->orderBy('description')->orderBy('description')->all();

        return view('patrimonials.index', compact('patrimonials'));
    }

    public function create()
    {
        $patrimonial_types = array(''=>'') + $this->patrimonial_typeRepository
            ->orderBy('description')
            ->lists('description', 'id')
            ->all();

        $patrimonial_sub_types = array(''=>'') + $this->patrimonial_sub_typeRepository
            ->orderBy('description')
            ->lists('description', 'id')
            ->all();

        $patrimonial_brands = array(''=>'') + $this->patrimonial_brandRepository
            ->orderBy('description')
            ->lists('description', 'id')
            ->all();

        $patrimonial_models = array(''=>'') + $this->patrimonial_modelRepository
            ->orderBy('description')
            ->lists('description', 'id')
            ->all();

        $clients = array(''=>'') + $this->clientRepository
            ->findWhereNotIn('id',[1])
            ->lists('description', 'id')
            ->all();

        return view('patrimonials.create', compact('patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PatrimonialCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PatrimonialRequest $request)
    {
        $input = $request->all();

        #$patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findWhere(['id' => $input['patrimonial_sub_type_id']]);
        #
        #$patrimonial_brand = $this->patrimonial_brandRepository->findWhere(['id' => $input['patrimonial_brand_id']]);

        #$patrimonial_model = $this->patrimonial_modelRepository->findWhere(['id' => $input['patrimonial_model_id']]);

        #$input['description'] = $patrimonial_sub_type->description." ".$patrimonial_model->description." ".$patrimonial_brand->description." ".$input['serial'];

        $patrimonial = $this->patrimonialService->create($input);

        Session::flash('flash_message_success', 'Equipamento cadastrado com sucesso !');
            
        return redirect()->route('patrimonials');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $patrimonialId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($patrimonialId)
    {
        $patrimonial = $this->patrimonialRepository->find($patrimonialId);

        $orders = $this->orderRepository->findWhere(['patrimonial_id' => $patrimonial->id])->all();

        $order_services = $this->order_serviceRepository->all();
        $total_order_services = 0;

        $order_materials = $this->order_materialRepository->all();
        $total_order_materials = 0;

        $total_patrimonial_services = $this->patrimonialService->totalServices($patrimonialId);
        #dd($total_patrimonial_services);
        $total_patrimonial_materials = $this->patrimonialService->totalMaterials($patrimonialId);
        #dd($total_patrimonial_materials);

        return view('patrimonials.show', compact('patrimonial', 'orders', 'order_services', 'total_order_services', 'total_patrimonial_services', 'order_materials', 'total_order_materials', 'total_patrimonial_materials'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $patrimonialId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($patrimonialId)
    {
        $patrimonial_types = $this->patrimonial_typeRepository
            ->orderBy('description')
            ->lists('description', 'id')
            ->all();

        $patrimonial_sub_types = $this->patrimonial_sub_typeRepository
            ->orderBy('description')
            ->lists('description', 'id')
            ->all();

        $patrimonial_brands = $this->patrimonial_brandRepository
            ->orderBy('description')
            ->lists('description', 'id')
            ->all();

        $patrimonial_models = $this->patrimonial_modelRepository
            ->orderBy('description')
            ->lists('description', 'id')
            ->all();

        $clients = $this->clientRepository
            ->orderBy('description')
            ->lists('description', 'id')
            ->all();

        $patrimonial = $this->patrimonialRepository->find($patrimonialId);

        return view('patrimonials.edit', compact('patrimonial', 'patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'clients'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PatrimonialUpdateRequest $request
     * @param  string            $patrimonialId
     *
     * @return Response
     */
    public function update(Requests\PatrimonialRequest $request, $patrimonialId)
    {
        $input = $request->all();

        #$patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findWhere(['id' => $input['patrimonial_sub_type_id']]);

        #$patrimonial_brand = $this->patrimonial_brandRepository->findWhere(['id' => $input['patrimonial_brand_id']]);

        
        $patrimonial_model = $this->patrimonial_modelRepository->findWhere(['id' => $input['patrimonial_model_id']]);

        #$input['description'] = $patrimonial_sub_type->description." ".$patrimonial_model->description." ".$patrimonial_brand->description." ".$input['serial'];

        $patrimonial = $this->patrimonialService->update($patrimonialId, $input);
            
        return redirect()->route('patrimonials');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $patrimonialId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($patrimonialId)
    {
        $deleted = $this->patrimonialRepository->delete($patrimonialId);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Patrimonial deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Patrimonial deleted.');
    }
}


