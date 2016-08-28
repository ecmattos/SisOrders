<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\StateRepository;
use L52\Services\StateService;


class StatesController extends Controller
{
    /**
     * @var StateRepository
     */
    protected $repository;

    /**
     * @var StateService
     */
    protected $service;

    public function __construct(StateRepository $repository, StateService $service)
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
        $states = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $states,
            ]);
        }

        return view('states.index', compact('states'));
    }

    public function create()
    {
        return view('states.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StateCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StateRequest $request)
    {
        try 
        {
            $input = $request->all();
            $state = $this->service->create($input);

            $response = 
            [
                'message' => 'Estado cadastrado com sucesso !',
                'data'    => $state->toArray(),
            ];

            if ($request->wantsJson()) 
            {
                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } 
        catch (ValidatorException $e) 
        {
            if ($request->wantsJson()) 
                {
                    return response()->json([
                        'error'   => true,
                        'message' => $e->getMessageBag()
                    ]);
                }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $stateId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($stateId)
    {
        $state = $this->repository->find($stateId);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $state,
            ]);
        }

        return view('states.show', compact('state'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $stateId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($stateId)
    {

        $state = $this->repository->find($stateId);

        return view('states.edit', compact('state'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  StateUpdateRequest $request
     * @param  string            $stateId
     *
     * @return Response
     */
    public function update(Requests\StateRequest $request, $stateId)
    {
        try 
        {
            $input = $request->all();
            $state = $this->service->update($stateId, $input);

            $response = [
                'message' => 'Estado alterado com sucesso !',
                'data'    => $state->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            #return redirect()->back()->with('message', $response['message']);
            return redirect()->route('states.index');
        } 
        catch (ValidatorException $e) 
        {
            if ($request->wantsJson()) 
            {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $stateId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($stateId)
    {
        $deleted = $this->repository->delete($stateId);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Estado excluído com sucesso!',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Estado excluído com sucesso!');
    }
}


