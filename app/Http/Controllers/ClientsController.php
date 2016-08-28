<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\ClientRepository;
use L52\Repositories\ClientTypeRepository;
use L52\Repositories\CityRepository;
use L52\Repositories\ContractRepository;
use L52\Repositories\PatrimonialRepository;
use L52\Services\ClientService;

use Session;

class ClientsController extends Controller
{
    protected $cityRepository;
    protected $client_typeRepository;
    protected $clientService;
    protected $clientRepository;
    protected $contractRepository;

    public function __construct(ClientRepository $clientRepository, ClientService $clientService, ClientTypeRepository $client_typeRepository, CityRepository $cityRepository, ContractRepository $contractRepository, PatrimonialRepository $patrimonialRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->clientService  = $clientService;
        $this->client_typeRepository = $client_typeRepository;
        $this->cityRepository = $cityRepository;
        $this->contractRepository = $contractRepository;
        $this->patrimonialRepository = $patrimonialRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->clientRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        
        $clients = $this->clientRepository
            ->findWhereNotIn('id',[1]);
        
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $client_types = array(''=>'') + $this->client_typeRepository
            ->lists('description', 'id')
            ->all();

        $cities = array(''=>'') + $this->cityRepository
            ->lists('description', 'id')
            ->all();

        return view('clients.create', compact('cities', 'client_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClientCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ClientRequest $request)
    {
        $client = $this->clientService->create($request->all());

        Session::flash('flash_message_success', 'Cliente cadastrado com sucesso !');
            
        return redirect()->route('clients.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $clientId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($clientId)
    {
        $client = $this->clientRepository->find($clientId);

        $contracts = $this->contractRepository->findWhere(['client_id' => $clientId]);

        $patrimonials = $this->patrimonialRepository->findWhere(['client_id' => $clientId]);

        $logs = $client->revisionHistory;

        return view('clients.show', compact('client', 'contracts', 'patrimonials', 'logs'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $clientId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($clientId)
    {
        $client_types = $this->client_typeRepository
            ->lists('description', 'id')
            ->all();

        $cities = $this->cityRepository
            ->lists('description', 'id')
            ->all();

        $client = $this->clientRepository->find($clientId);

        return view('clients.edit', compact('client_types', 'cities', 'client'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ClientUpdateRequest $request
     * @param  string            $clientId
     *
     * @return Response
     */
    public function update(Requests\ClientRequest $request, $clientId)
    {
        $this->clientService->update($request->all(),$clientId);
            
        return redirect()->route('clients.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $clientId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($clientId)
    {
        $deleted = $this->clientRepository->delete($clientId);

        return redirect()->back()->with('message', 'Client deleted.');
    }
}


