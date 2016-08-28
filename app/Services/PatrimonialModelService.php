<?php

namespace L52\Services;

use Illuminate\Support\Facades\Response;
use L52\Repositories\PatrimonialModelRepository;

class PatrimonialModelService
{
	protected $repository;

	public function __construct(PatrimonialModelRepository $repository)
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
