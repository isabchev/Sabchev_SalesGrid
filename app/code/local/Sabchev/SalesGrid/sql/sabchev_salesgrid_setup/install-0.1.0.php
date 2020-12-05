<?php

$this->startSetup();

$this->getConnection()->addColumn(
    $this->getTable('sales/order'),
    'postcode',
    [
		'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
		'nullable'  => false,
		'length'    => 255,
		'comment'   => 'Postcode'
    ]
);

$this->getConnection()->addColumn(
    $this->getTable('sales/order_grid'),
    'postcode',
    [
		'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
		'nullable'  => false,
		'length'    => 255,
		'comment'   => 'Postcode'
    ]   
);

$select = $this->getConnection()->select();
$select->join(
    array('order_address'=>$this->getTable('sales/order_address')),
	'order_address.parent_id = order_grid.entity_id AND order_address.address_type = "shipping"',
    array('postcode' => 'postcode')
);

$this->getConnection()->query(
    $select->crossUpdateFromSelect(
        array('order_grid' => $this->getTable('sales/order_grid'))
    )
);

$this->endSetup();
