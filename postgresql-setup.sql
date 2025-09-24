-- Create database (run in psql as a superuser or a user with createdb)
-- Adjust owner if needed
CREATE DATABASE cvi_wirotaman WITH ENCODING 'UTF8' TEMPLATE template1;

\c cvi_wirotaman

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'admin',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Events table
CREATE TABLE IF NOT EXISTS events (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    image VARCHAR(255) NULL,
    price NUMERIC(10,2) NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'upcoming',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Merchandise table
CREATE TABLE IF NOT EXISTS merchandise (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price NUMERIC(10,2) NOT NULL,
    image VARCHAR(255) NULL,
    category VARCHAR(100) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    status VARCHAR(20) NOT NULL DEFAULT 'available',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Campgrounds table
CREATE TABLE IF NOT EXISTS campgrounds (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    price_per_person NUMERIC(10,2) NOT NULL,
    image VARCHAR(255) NULL,
    facilities TEXT NULL,
    contact_info TEXT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'active',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Seed default admin (username/password: admin/admin123)
INSERT INTO users (username, password_hash, role, created_at, updated_at)
VALUES (
    'admin',
    '$2y$10$8QcvvZJ7y6mSDX3JbC9WYe6iB2J7mZpF6QHnYxqzFypqN6A6Yl0QO',
    'admin',
    NOW(), NOW()
) ON CONFLICT (username) DO NOTHING;

-- The above password_hash is a bcrypt hash of 'admin123'


