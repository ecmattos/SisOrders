<?php

namespace L52\Services;

use L52\Repositories\StateRepository;

class StateService
{
	protected $repository;

	public function __construct(StateRepository $repository)
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