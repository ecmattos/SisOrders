<?php

namespace L52\Services;

use Illuminate\Support\Facades\Response;
use L52\Repositories\ServiceRepository;

class ServiceService
{
	protected $repository;

	public function __construct(ServiceRepository $repository)
	{
		$this->repository = $repository;
	}	

	public function create(array $data)
	{
		$material = $this->repository->create($data);
	}

	public function update($id, array $data)
	{
		$material = $this->repository->update($data,$id);
	}
}
