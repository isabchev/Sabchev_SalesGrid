<?php

class Sabchev_SalesGrid_Model_Observer extends Mage_Core_Model_Abstract
{
	public function updateGridPostcode(Varien_Event_Observer $observer)
	{
		$order = $observer->getEvent()->getOrder();
		$shippingAddress = $order->getShippingAddress();
		
		if ($shippingAddress != false) {
			$postCode = $shippingAddress->getData('postcode');
			$order->setData('postcode', $postCode);
			$order->save();
		}  
	}
}
