<?php

namespace L52\Services;

use Illuminate\Support\Facades\Response;
use L52\Repositories\PatrimonialBrandRepository;

class PatrimonialBrandService
{
	protected $repository;

	public function __construct(PatrimonialBrandRepository $repository)
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
