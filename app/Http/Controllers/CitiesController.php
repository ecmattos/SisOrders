<?php

namespace L52\Http\Controllers;

use Illuminate\Http\Request;

use L52\Http\Requests;
use L52\Http\Controllers\Controller;
use L52\Repositories\StateRepository;
use L52\Repositories\CityRepository;
use L52\Services\CityService;

use Session;


class CitiesController extends Controller
{
    /**
     * @var StateRepository
     */
    protected $stateRepository;

    /**
     * @var CityRepository
     */
    protected $cityRepository;

    /**
     * @var CityService
     */
    protected $cityService;

    public function __construct(StateRepository $stateRepository, CityRepository $cityRepository, CityService $cityService)
    {
        $this->stateRepository = $stateRepository;
        $this->cityRepository = $cityRepository;
        $this->cityService  = $cityService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->cityRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $cities = $this->cityRepository->all();

        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        $states = array(''=>'') + $this->stateRepository
            ->lists('description', 'id')
            ->all();

        return view('cities.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CityCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CityRequest $request)
    {
        $city = $this->cityService->create($request->all());

        return redirect()->route('cities.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $cityId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($cityId)
    {
        $city = $this->cityRepository->find($cityId);

        return view('cities.show', compact('city'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $cityId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($cityId)
    {
        $states = $this->stateRepository
            ->lists('description', 'id')
            ->all();

        $city = $this->cityRepository->find($cityId);

        return view('cities.edit', compact('city', 'states'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CityUpdateRequest $request
     * @param  string            $cityId
     *
     * @return Response
     */
    public function update(Requests\CityRequest $request, $cityId)
    {
        try 
        {
            $input = $request->all();
            $city = $this->cityService->update($cityId, $input);

            $response = [
                'message' => 'Cidade alterada com sucesso !',
                'data'    => $city->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            #return redirect()->back()->with('message', $response['message']);
            return redirect()->route('cities.index');
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
     * @param  int $cityId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($cityId)
    {
        $deleted = $this->cityRepository->delete($cityId);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Cidade excluida.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Cidade excluida.');
    }
}


