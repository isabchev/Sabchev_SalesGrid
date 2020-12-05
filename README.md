Magento 1 module adding shipping postcode column to sales order grid.

Adding column shipping postcode to sales_flat_order table and sales_flat_order_grid. That way we avoid expensive join operation to sales_flat_order_address table.
