<?php

namespace L52\Services;

use Illuminate\Support\Facades\Response;
use L52\Repositories\MaterialUnitRepository;

class MaterialUnitService
{
	protected $repository;

	public function __construct(MaterialUnitRepository $repository)
	{
		$this->repository = $repository;
	}	

	public function create(array $data)
	{
		$materialUnit = $this->repository->create($data);
	}

	public function update($id, array $data)
	{
		$materialUnit = $this->repository->update($data,$id);
	}
}
