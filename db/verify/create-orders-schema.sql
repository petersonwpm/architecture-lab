-- Verify event-driven-architecture-lab:create-orders-schema on pg

BEGIN;

DO $$
DECLARE
    table_name TEXT;
BEGIN
    FOREACH table_name IN ARRAY ARRAY[
        'customers',
        'products',
        'orders',
        'order_customer_snapshot',
        'order_delivery_address',
        'order_items',
        'payments'
    ]
    LOOP
        IF to_regclass('public.' || table_name) IS NULL THEN
            RAISE EXCEPTION 'Expected table public.% does not exist', table_name;
        END IF;
    END LOOP;
END;
$$;

ROLLBACK;
