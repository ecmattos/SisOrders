<?php

namespace L52\Services;

use Illuminate\Support\Facades\Response;
use L52\Repositories\OrderRepository;

class OrderService
{
	protected $repository;

	public function __construct(OrderRepository $repository)
	{
		$this->repository = $repository;
	}	

	public function create(array $data)
	{
		return $this->repository->create($data);
	}

	public function update($orderId, array $data)
	{
		return $this->repository->update($data, $orderId);
	}
}
