<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\ServiceRepository;
use L52\Services\ServiceService;

use Session;


class ServicesController extends Controller
{
    /**
     * @var ServiceRepository
     */
    protected $serviceRepository;

    /**
     * @var ServiceService
     */
    protected $serviceService;

    public function __construct(ServiceRepository $serviceRepository, ServiceService $serviceService)
    {
        $this->serviceRepository = $serviceRepository;
        $this->serviceService  = $serviceService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->serviceRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        
        $services = $this->serviceRepository->orderBy('description')->all();

        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ServiceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ServiceRequest $request)
    {
        $input = $request->all();

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['cost_value'] = $numberFormatter_ptBR2en->parse($input['cost_value']);
        $input['sale_value'] = $numberFormatter_ptBR2en->parse($input['sale_value']);
        
        $service = $this->serviceService->create($input);

        Session::flash('flash_message_success', 'Serviço cadastrado com sucesso !');
            
        return redirect()->route('services');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $serviceId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($serviceId)
    {
        $service = $this->serviceRepository->find($serviceId);

        return view('services.show', compact('service'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $serviceId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($serviceId)
    {
        $service = $this->serviceRepository->find($serviceId);

        return view('services.edit', compact('service'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ServiceUpdateRequest $request
     * @param  string            $serviceId
     *
     * @return Response
     */
    public function update(Requests\ServiceRequest $request, $serviceId)
    {
        $input = $request->all();

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['cost_value'] = $numberFormatter_ptBR2en->parse($input['cost_value']);
        $input['sale_value'] = $numberFormatter_ptBR2en->parse($input['sale_value']);
        
        $service = $this->serviceService->update($serviceId, $input);
            
        return redirect()->route('services');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $serviceId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($serviceId)
    {
        $deleted = $this->serviceRepository->delete($serviceId);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Service deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Service deleted.');
    }
}
