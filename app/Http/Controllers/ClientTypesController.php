<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\ClientTypeRepository;
use L52\Services\ClientTypeService;

use Session;


class ClientTypesController extends Controller
{
    /**
     * @var ClientTypeRepository
     */
    protected $repository;

    /**
     * @var ClientTypeService
     */
    protected $service;

    public function __construct(ClientTypeRepository $repository, ClientTypeService $service)
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
        
        $client_types = $this->repository->orderBy('description')->all();

        return view('client_types.index', compact('client_types'));
    }

    public function create()
    {
        return view('client_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClientTypeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ClientTypeRequest $request)
    {
        $client_type = $this->service->create($request->all());

        Session::flash('flash_message_success', 'Tipo de Cliente cadastrado com sucesso !');
            
        return redirect()->route('client_types.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $clientTypeId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($clientTypeId)
    {
        $client_type = $this->repository->find($clientTypeId);

        return view('client_types.show', compact('client_type'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $clientTypeId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($clientTypeId)
    {

        $client_type = $this->repository->find($clientTypeId);

        return view('client_types.edit', compact('client_type'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ClientTypeUpdateRequest $request
     * @param  string            $clientTypeId
     *
     * @return Response
     */
    public function update(Requests\ClientTypeRequest $request, $clientTypeId)
    {
        $client_type = $this->service->update($clientTypeId, $request->all());
            
        return redirect()->route('client_types.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $clientTypeId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($clientTypeId)
    {
        $deleted = $this->repository->delete($clientTypeId);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'ClientType deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ClientType deleted.');
    }
}


