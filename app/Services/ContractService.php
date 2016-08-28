<?php

namespace L52\Services;

use Illuminate\Support\Facades\Response;
use L52\Repositories\ContractRepository;

class ContractService
{
	protected $repository;

	public function __construct(ContractRepository $repository)
	{
		$this->repository = $repository;
	}	

	public function create(array $data)
	{
		return $this->repository->create($data);
	}

	public function update($id, array $data)
	{
		return $this->repository->update($data,$id);
	}
}
