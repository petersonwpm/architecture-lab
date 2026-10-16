-- Deploy event-driven-architecture-lab:create-orders-schema to pg

BEGIN;

CREATE TABLE customers (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE products (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image TEXT,
    price NUMERIC(12, 2) NOT NULL CHECK (price >= 0),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE orders (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    customer_id UUID NOT NULL REFERENCES customers(id) ON DELETE RESTRICT,
    status VARCHAR(20) NOT NULL DEFAULT 'created'
        CHECK (status IN ('created', 'confirmed', 'cancelled')),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE order_customer_snapshot (
    order_id UUID PRIMARY KEY
        REFERENCES orders(id) ON DELETE RESTRICT,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL
);

CREATE TABLE order_delivery_address (
    order_id UUID PRIMARY KEY
        REFERENCES orders(id) ON DELETE RESTRICT,
    recipient_name VARCHAR(255) NOT NULL,
    postal_code VARCHAR(20) NOT NULL,
    country VARCHAR(100) NOT NULL,
    state VARCHAR(100) NOT NULL,
    city VARCHAR(150) NOT NULL,
    neighborhood VARCHAR(150) NOT NULL,
    street VARCHAR(255) NOT NULL,
    number VARCHAR(50) NOT NULL,
    complement VARCHAR(255)
);

CREATE TABLE order_items (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    order_id UUID NOT NULL REFERENCES orders(id) ON DELETE RESTRICT,
    product_id UUID NOT NULL REFERENCES products(id) ON DELETE RESTRICT,
    product_name VARCHAR(255) NOT NULL,
    quantity INTEGER NOT NULL CHECK (quantity > 0),
    unit_price NUMERIC(12, 2) NOT NULL CHECK (unit_price >= 0),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE TABLE payments (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    order_id UUID NOT NULL REFERENCES orders(id) ON DELETE RESTRICT,
    method VARCHAR(20) NOT NULL
        CHECK (method IN ('card', 'pix')),
    status VARCHAR(20) NOT NULL DEFAULT 'pending'
        CHECK (status IN ('pending', 'approved', 'declined', 'expired', 'failed')),
    amount NUMERIC(12, 2) NOT NULL CHECK (amount >= 0),
    provider_transaction_id VARCHAR(255),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

COMMIT;
