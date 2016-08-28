<?php

namespace L52\Services;

use Illuminate\Support\Facades\Response;
use L52\Repositories\ClientTypeRepository;

class ClientTypeService
{
	protected $repository;

	public function __construct(ClientTypeRepository $repository)
	{
		$this->repository = $repository;
	}	

	public function create(array $data)
	{
		$client_type = $this->repository->create($data);
	}

	public function update($id, array $data)
	{
		$client_type = $this->repository->update($data,$id);
	}
}
