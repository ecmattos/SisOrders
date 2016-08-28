<?php

namespace L52\Services;

use Illuminate\Support\Facades\Response;
use L52\Repositories\PatrimonialSubTypeRepository;

class PatrimonialSubTypeService
{
	protected $repository;

	public function __construct(PatrimonialSubTypeRepository $repository)
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
