<?php

namespace L52\Services;

use Illuminate\Support\Facades\Response;
use L52\Repositories\PatrimonialRepository;
use L52\Repositories\OrderRepository;
use L52\Repositories\OrderServiceRepository;
use L52\Repositories\OrderMaterialRepository;

class PatrimonialService
{
	protected $patrimonialRepository;
	protected $orderRepository;
	protected $order_serviceRepository;
	protected $order_materialRepository;

	public function __construct(PatrimonialRepository $patrimonialRepository, OrderRepository $orderRepository, OrderServiceRepository $order_serviceRepository, OrderMaterialRepository $order_materialRepository)
	{
		$this->patrimonialRepository = $patrimonialRepository;
		$this->orderRepository = $orderRepository;
		$this->order_serviceRepository = $order_serviceRepository;
		$this->order_materialRepository = $order_materialRepository;
	}	

	public function create(array $data)
	{
		return $this->patrimonialRepository->create($data);
	}

	public function update($id, array $data)
	{
		return $this->patrimonialRepository->update($data,$id);
	}

	public function totalServices($id)
	{
		$totalServices = 0;

		$orders = $this->orderRepository->findWhere(['patrimonial_id' => $id]);

		foreach($orders as $order)
		{
			$items = $this->order_serviceRepository->findWhere(['order_id' => $order->id]);

			foreach($items as $item)
	    	{
	    		$totalServices += (($item['sale_value'] * $item['factor']) * ((100 - $item['discount'])/100) * $item['service_qty']);
	    	}
	    }

    	return $totalServices;
	}

	public function totalMaterials($id)
	{
		$totalMaterials = 0;

		$orders = $this->orderRepository->findWhere(['patrimonial_id' => $id]);

		foreach($orders as $order)
		{
			$items = $this->order_materialRepository->findWhere(['order_id' => $order->id]);

			foreach($items as $item)
	    	{
	    		$totalMaterials += (($item['sale_value'] * $item['factor']) * ((100 - $item['discount'])/100) * $item['material_qty']);
	    	}
	    }

    	return $totalMaterials;
	}
}
