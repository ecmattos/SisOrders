<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\ContractRepository;
use L52\Services\ContractService;
use L52\Repositories\ClientRepository;
use L52\Repositories\UserRepository;

use Carbon\Carbon;
use DB;

use Session;

class ContractsController extends Controller
{
    /**
     * @var ContractRepository
     */
    protected $contractRepository;
    protected $contractService;
    protected $clientRepository;
    protected $managerRepository;


    public function __construct(ContractRepository $contractRepository, ContractService $contractService,ClientRepository $clientRepository, UserRepository $managerRepository)
    {
        $this->contractRepository = $contractRepository;
        $this->contractService  = $contractService;
        $this->clientRepository = $clientRepository;
        $this->managerRepository = $managerRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->contractRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        
        $contracts = $this->contractRepository
            ->findWhereNotIn('id',[1]);
        
        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        $clients = array(''=>'') + $this->clientRepository
            ->findWhereNotIn('id',[1])
            ->lists('description_short', 'id')
            ->all();

        $managers = array(''=>'') + $this->managerRepository
            ->orderBy('name')
            ->lists('name', 'id')
            ->all();

        return view('contracts.create', compact('clients', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClientCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ContractRequest $request)
    {
        $input = $request->all();

        $input['date_start'] = new Carbon();     
        $input['date_start'] = Carbon::parse($input['date_start'])->format('Y-m-d');
        
        $input['date_end'] = new Carbon();
        $input['date_end'] = Carbon::parse($input['date_end'])->toDateString();
        
        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['factor_material'] = $numberFormatter_ptBR2en->parse($input['factor_material']);
        $input['factor_service'] = $numberFormatter_ptBR2en->parse($input['factor_service']);

        $contract = $this->contractService->create($input);

        Session::flash('flash_message_success', 'Contrato cadastrado com sucesso !');
            
        return redirect()->route('contracts');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $contractId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($contractId)
    {
        $contract = $this->contractRepository->find($contractId);

        $logs = $contract->revisionHistory;

        return view('contracts.show', compact('contract', 'logs'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $contractId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($contractId)
    {
        $clients = $this->clientRepository
            ->orderBy('description_short')
            ->lists('description_short', 'id')
            ->all();

        $managers = $this->managerRepository
            ->orderBy('name')
            ->lists('name', 'id')
            ->all();

        $contract = $this->contractRepository->find($contractId);

        return view('contracts.edit', compact('contract', 'clients', 'managers'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ClientUpdateRequest $request
     * @param  string            $contractId
     *
     * @return Response
     */
    public function update(Requests\ContractRequest $request, $contractId)
    {
        $input = $request->all();

        $input['date_start'] = Carbon::createFromFormat('d/m/Y', $input['date_start'])->format('Y-m-d');
        $input['date_end'] = Carbon::createFromFormat('d/m/Y', $input['date_end'])->format('Y-m-d');

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['factor_material'] = $numberFormatter_ptBR2en->parse($input['factor_material']);
        $input['factor_service'] = $numberFormatter_ptBR2en->parse($input['factor_service']);

        $contract = $this->contractService->update($contractId, $input);
            
        return redirect()->route('contracts');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $contractId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($contractId)
    {
        $deleted = $this->contractRepository->delete($contractId);

        return redirect()->back()->with('message', 'Client deleted.');
    }
}


