<?php

namespace L52\Services;

use Illuminate\Support\Facades\Response;
use L52\Repositories\OrderMaterialRepository;

class OrderMaterialService
{
	protected $repository;

	public function __construct(OrderMaterialRepository $repository)
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
		$totalMaterial = 0;

		$items = $this->repository->findWhere(['order_id' => $orderId]);

		foreach($items as $item)
    	{
    		$totalMaterial += (($item['sale_value'] * $item['factor']) * ((100 - $item['discount'])/100) * $item['material_qty']);
    	}

    	return $totalMaterial;
	}
}
