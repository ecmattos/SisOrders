<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\PatrimonialRepository;
use L52\Repositories\ContractRepository;
use L52\Repositories\OrderRepository;
use L52\Repositories\OrderServiceRepository;
use L52\Repositories\OrderMaterialRepository;
use L52\Services\OrderService;
use L52\Services\OrderServiceService;
use L52\Services\OrderMaterialService;
use L52\Repositories\ClientRepository;
use L52\Repositories\ServiceRepository;
use L52\Repositories\MaterialRepository;

use Carbon\Carbon;
use DB;

use Session;

class OrdersController extends Controller
{
    protected $patrimonialRepository;
    protected $contractRepository;
    protected $orderRepository;
    protected $orderServiceRepository;
    protected $orderMaterialRepository;
    protected $orderService;
    protected $orderServiceService;
    protected $orderMaterialService;
    protected $clientRepository;
    protected $serviceRepository;
    protected $materialRepository;

    public function __construct(PatrimonialRepository $patrimonialRepository, ContractRepository $contractRepository,  OrderService $orderService, OrderRepository $orderRepository, OrderServiceService $orderServiceService, OrderServiceRepository $orderServiceRepository, OrderMaterialService $orderMaterialService,   OrderMaterialRepository $orderMaterialRepository, ClientRepository $clientRepository, ServiceRepository $serviceRepository, MaterialRepository $materialRepository)
    {
        $this->patrimonialRepository = $patrimonialRepository;
        $this->contractRepository = $contractRepository;
        $this->orderService  = $orderService;
        $this->orderRepository = $orderRepository;
        $this->orderServiceService  = $orderServiceService;
        $this->orderServiceRepository = $orderServiceRepository;
        $this->orderMaterialService  = $orderMaterialService;
        $this->orderMaterialRepository = $orderMaterialRepository;
        $this->clientRepository = $clientRepository;
        $this->serviceRepository = $serviceRepository;
        $this->materialRepository = $materialRepository;

        $this->serviceRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = $this->contractRepository->orderBy('code')->all();
        
        return view('contracts.index', compact('contracts'));
    }

    public function create($patrimonialId)
    {
        $patrimonial = $this->patrimonialRepository
            ->findWhere(['id' => $patrimonialId])
            ->first();

        $client = $this->clientRepository
            ->findWhere(['id' => $patrimonial->client_id])
            ->first();
        #dd($patrimonial);
        $contracts = array('1'=>'(SEM CONTRATO)') + $this->contractRepository
            ->findWhere(['client_id' => $patrimonial->client_id])
            ->lists('code', 'id')
            ->all();

        return view('orders.create', compact('patrimonial', 'client', 'contracts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PatrimonialCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\OrderRequest $request, $patrimonialId)
    {
        $input = $request->all();

        $input['patrimonial_id'] = $patrimonialId;

        $input['date_status_1'] = Carbon::now();

        $order = $this->orderService->create($input);

        $lastOrderId = $order->id;

        Session::flash('flash_message_success', 'Ordem de Serviço cadastrada com sucesso !');
            
        return redirect()->route('orders.show', ['id' => $lastOrderId]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $orderId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {
        $order = $this->orderRepository->find($orderId);
        $order_services = $this->orderServiceRepository->findWhere(['order_id' => $orderId]);
        $order_materials = $this->orderMaterialRepository->findWhere(['order_id' => $orderId]);

        $totalService = $this->orderServiceService->getTotal($orderId);
        $totalMaterial = $this->orderMaterialService->getTotal($orderId);

        $totalOrder = $totalService + $totalMaterial;

        $logs = $order->revisionHistory;

        return view('orders.show', compact('order', 'order_services', 'order_materials', 'totalService', 'totalMaterial', 'totalOrder', 'logs'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $orderId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($orderId)
    {
        $patrimonials = $this->patrimonialRepository
            ->orderBy('description_short')
            ->lists('description_short', 'id')
            ->all();

        $managers = $this->managerRepository
            ->orderBy('name')
            ->lists('name', 'id')
            ->all();

        $contract = $this->contractRepository->find($orderId);

        return view('contracts.edit', compact('contract', 'patrimonials', 'managers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $orderId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($orderId)
    {
        $deleted = $this->contractRepository->delete($orderId);

        return redirect()->back()->with('message', 'Patrimonial deleted.');
    }
    
    public function services_search($orderId)
    {
        $order = $this->orderRepository->find($orderId);
        $order_services = $this->orderServiceRepository->findWhere(['order_id' => $orderId]);
        $order_materials = $this->orderMaterialRepository->findWhere(['order_id' => $orderId]);

        $totalService = $this->orderServiceService->getTotal($orderId);
        $totalMaterial = $this->orderMaterialService->getTotal($orderId);

        $totalOrder = $totalService + $totalMaterial;

        return view('orders.services.search', compact('order', 'order_services', 'order_materials', 'totalService', 'totalMaterial', 'totalOrder'));
    }

    public function services_search_results($orderId, Requests\OrderServiceSearchRequest $request)
    {
        $input = $request->all();

        $order = $this->orderRepository->find($orderId);
        $order_services = $this->orderServiceRepository->findWhere(['order_id' => $orderId]);
        $order_materials = $this->orderMaterialRepository->findWhere(['order_id' => $orderId]);

        $totalService = $this->orderServiceService->getTotal($orderId);
        $totalMaterial = $this->orderMaterialService->getTotal($orderId);

        $totalOrder = $totalService + $totalMaterial;

        $contract = $this->contractRepository->findWhere(['id' => $order->contract_id])->first();

        $factor = $contract->factor_service;

        $services = $this->serviceRepository->findWhere([
            ['code','like', '%'.$input['code'].'%'], 
            ['description','like','%'.$input['description'].'%']
        ]);

        return view('orders.services.search_results', compact('order', 'factor', 'services', 'totalOrder'));
    }

    public function services_cart($orderId, $serviceId)
    {
        $order = $this->orderRepository->find($orderId);
        #$order_services = $this->orderServiceRepository->findWhere(['order_id' => $orderId]);
        #$order_materials = $this->orderMaterialRepository->findWhere(['order_id' => $orderId]);

        $totalService = $this->orderServiceService->getTotal($orderId);
        $totalMaterial = $this->orderMaterialService->getTotal($orderId);

        $totalOrder = $totalService + $totalMaterial;

        $contract = $this->contractRepository->findWhere(['id' => $order->contract_id])->first();

        $factor = $contract->factor_service;

        $service = $this->serviceRepository->find($serviceId);

        return view('orders.services.cart', compact('order', 'service', 'factor', 'totalOrder'));
    }

    public function services_store($orderId, $serviceId, Requests\OrderServiceRequest $request)
    {
        $input = $request->all();

        $input['order_id'] = $orderId;
        $input['service_id'] = $serviceId;

        $order = $this->orderRepository->find($orderId);

        $contract = $this->contractRepository->findWhere(['id' => $order->contract_id])->first();
        $input['factor'] = $contract->factor_service;

        $service = $this->serviceRepository->find($serviceId);
        $input['sale_value'] = $service->sale_value;

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['discount'] = $numberFormatter_ptBR2en->parse($input['discount']);
        $input['service_qty'] = $numberFormatter_ptBR2en->parse($input['service_qty']);

        $cart = $this->orderServiceService->create($input);

        return redirect()->route('orders_services.search', ['id' => $orderId]);
    }

    public function services_destroy($id)
    {
        $order_service = $this->orderServiceRepository->find($id);

        $orderId = $order_service->order_id;

        $this->orderServiceRepository->delete($id);

        return redirect()->route('orders.show', ['id' => $orderId]);
    }



    public function materials_search($orderId)
    {
        $order = $this->orderRepository->find($orderId);
        $order_services = $this->orderServiceRepository->findWhere(['order_id' => $orderId]);
        $order_materials = $this->orderMaterialRepository->findWhere(['order_id' => $orderId]);

        $totalService = $this->orderServiceService->getTotal($orderId);
        $totalMaterial = $this->orderMaterialService->getTotal($orderId);

        $totalOrder = $totalService + $totalMaterial;

        return view('orders.materials.search', compact('order', 'order_services', 'order_materials', 'totalService', 'totalMaterial', 'totalOrder'));
    }

    public function materials_search_results($orderId, Requests\OrderMaterialSearchRequest $request)
    {
        $input = $request->all();

        $order = $this->orderRepository->find($orderId);
        $order_services = $this->orderServiceRepository->findWhere(['order_id' => $orderId]);
        $order_materials = $this->orderMaterialRepository->findWhere(['order_id' => $orderId]);

        $totalService = $this->orderServiceService->getTotal($orderId);
        $totalMaterial = $this->orderMaterialService->getTotal($orderId);

        $totalOrder = $totalService + $totalMaterial;

        $contract = $this->contractRepository->findWhere(['id' => $order->contract_id])->first();

        $factor = $contract->factor_material;

        $materials = $this->materialRepository->findWhere([
            ['code','like', '%'.$input['code'].'%'], 
            ['description','like','%'.$input['description'].'%']
        ]);

        return view('orders.materials.search_results', compact('order', 'factor', 'materials', 'totalOrder'));
    }

    public function materials_cart($orderId, $materialId)
    {
        $order = $this->orderRepository->find($orderId);
        #$order_services = $this->orderServiceRepository->findWhere(['order_id' => $orderId]);
        #$order_materials = $this->orderMaterialRepository->findWhere(['order_id' => $orderId]);

        $totalService = $this->orderServiceService->getTotal($orderId);
        $totalMaterial = $this->orderMaterialService->getTotal($orderId);

        $totalOrder = $totalService + $totalMaterial;

        $contract = $this->contractRepository->findWhere(['id' => $order->contract_id])->first();

        $factor = $contract->factor_material;

        $material = $this->materialRepository->find($materialId);

        return view('orders.materials.cart', compact('order', 'material', 'factor', 'totalOrder'));
    }

    public function materials_store($orderId, $materialId, Requests\OrderMaterialRequest $request)
    {
        $input = $request->all();

        $input['order_id'] = $orderId;
        $input['material_id'] = $materialId;

        $order = $this->orderRepository->find($orderId);

        $contract = $this->contractRepository->findWhere(['id' => $order->contract_id])->first();
        $input['factor'] = $contract->factor_material;

        $material = $this->materialRepository->find($materialId);
        $input['sale_value'] = $material->sale_value;

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['discount'] = $numberFormatter_ptBR2en->parse($input['discount']);
        $input['material_qty'] = $numberFormatter_ptBR2en->parse($input['material_qty']);

        $cart = $this->orderMaterialService->create($input);

        return redirect()->route('orders.show', ['id' => $orderId]);
    }

    public function materials_destroy($id)
    {
        $order_material = $this->orderMaterialRepository->find($id);

        $orderId = $order_material->order_id;

        $this->orderMaterialRepository->delete($id);

        return redirect()->route('orders.show', ['id' => $orderId]);
    }

    public function cart($orderId)
    {
        $order = $this->orderRepository->find($orderId);
        $order_services = $this->orderServiceRepository->findWhere(['order_id' => $orderId]);
        $order_materials = $this->orderMaterialRepository->findWhere(['order_id' => $orderId]);

        $totalService = $this->orderServiceService->getTotal($orderId);
        $totalMaterial = $this->orderMaterialService->getTotal($orderId);

        $totalOrder = $totalService + $totalMaterial;

        return view('orders.cart', compact('order', 'order_services', 'totalService', 'order_materials', 'totalMaterial', 'totalOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PatrimonialUpdateRequest $request
     * @param  string            $orderId
     *
     * @return Response
     */
    public function cart_update(Requests\OrderCartRequest $request, $orderId)
    {
        $input = $request->all();

        $input['cart_date'] = Carbon::createFromFormat('d/m/Y', $input['cart_date'])->format('Y-m-d');

        $this->orderService->update($orderId, $input);
            
        return redirect()->route('orders.show', ['id' => $orderId]);
    }

    public function set_status_2($orderId)
    {
        $data['date_status_2'] = Carbon::now();

        $data['order_status_id'] = '2';

        $this->orderService->update($orderId, $data);
            
        return redirect()->route('orders.show', ['id' => $orderId]);
    }

    public function set_status_3($orderId)
    {
        $input['date_status_3'] = Carbon::now();

        $input['order_status_id'] = '3';

        $this->orderService->update($orderId, $input);
            
        return redirect()->route('orders.show', ['id' => $orderId]);
    }

    public function set_status_4($orderId)
    {
        $input['date_status_4'] = Carbon::now();

        $input['order_status_id'] = '4';

        $this->orderService->update($orderId, $input);
            
        return redirect()->route('orders.show', ['id' => $orderId]);
    }
}


