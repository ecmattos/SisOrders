<?php

namespace L52\Services;

use L52\Repositories\CityRepository;

class CityService
{
	protected $repository;

	public function __construct(CityRepository $repository)
	{
		$this->repository = $repository;
	}	

	public function create(array $data)
	{
		return $this->repository->create($data);
	}

	public function update($id, array $data)
	{
		return $this->repository->update($data, $id);
	}
}