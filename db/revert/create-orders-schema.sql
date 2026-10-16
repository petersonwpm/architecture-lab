-- Revert event-driven-architecture-lab:create-orders-schema from pg

BEGIN;

DROP TABLE payments;
DROP TABLE order_items;
DROP TABLE order_delivery_address;
DROP TABLE order_customer_snapshot;
DROP TABLE orders;
DROP TABLE products;
DROP TABLE customers;

COMMIT;
