<?php

namespace L52\Services;

use Illuminate\Support\Facades\Response;
use L52\Repositories\OrderServiceRepository;

class OrderServiceService
{
	protected $repository;

	public function __construct(OrderServiceRepository $repository)
	{
		$this->repository = $repository;
	}	

	public function create(array $data)
	{
		return $this->repository->create($data);
	}

	public function update($id, array $data)
	{
		return $this->repository->update($id, $data);
	}

	public function getTotal($orderId)
	{
		$totalService = 0;

		$items = $this->repository->findWhere(['order_id' => $orderId]);

		foreach($items as $item)
    	{
    		$totalService += (($item['sale_value'] * $item['factor']) * ((100 - $item['discount'])/100) * $item['service_qty']);
    	}

    	return $totalService;
	}
}
