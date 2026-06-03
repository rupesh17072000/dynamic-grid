# Dynamic Grid With Expanded View & Column Configuration
## Overview

This project is a Laravel 10-based Dynamic Grid application developed as part of a technical assessment. The application provides a configurable data grid with column visibility management, expandable row details, AJAX-based filtering, and Excel export functionality.

## Technology Stack

* PHP 8.2
* Laravel 10
* MySQL
* Bootstrap 5
* jQuery / AJAX
* Laravel Excel (Maatwebsite)

## Features
### 1. Dynamic Grid View
* Displays records using a responsive Bootstrap table.
* Supports configurable column visibility.
* Data is loaded dynamically without page refresh.

### 2. Column Configuration
Users can customize the grid by enabling or disabling columns.
Available columns include:
* File Number
* Manager Name
* Service Provider Name
* Claim Number
* Assignment ID
* Company Name
* Invoice Date
* Expenses
* Sale Tax
* Payment Amount
* Balance Amount
* Payment Date
* Loss Amount
Configuration is persisted in the database and restored automatically on page reload

### 3. AJAX Filtering
The grid supports real-time filtering without page refresh.
Filters available:
* File Number
* Manager Name
* Company Name

Features:
* AJAX-based search
* Instant results
* Improved user experience

### 4. Expandable Row Details
Each row contains an expand button.
When expanded, additional information is displayed:
* Claim Number
* Assignment ID
* Loss Amount
Only one row can remain expanded at a time.

### 5. Excel Export
Users can export all records to an Excel file using Laravel Excel.
Export includes:
* All available records
* XLSX format
* One-click download

### 6. Pagination
* Laravel pagination implemented
* 10 records per page
* AJAX-friendly structure

### 7. Loader Support
A loading spinner is displayed during:
* Filtering
* Pagination
* Configuration updates

## Database Tables
### records
Stores all grid records.
Sample fields:
* id
* file_number
* manager_name
* service_provider_name
* claim_number
* assignment_id
* company_name
* invoice_date
* expenses
* sale_tax
* payment_amount
* balance_amount
* payment_date
* loss_amount

### grid_configurations
Stores user column preferences.
Fields:
* id
* column_name
* is_visible
* created_at
* updated_at

## Installation
### Clone Repository

git clone https://github.com/rupesh17072000/dynamic-grid.git
### Install Dependencies
composer install
### Environment Setup
cp .env.example .env
Update database credentials in `.env`.
### Generate Application Key
php artisan key:generate

### Run Migrations
php artisan migrate
### Seed Sample Data
php artisan db:seed
### Start Server
php artisan serve
Application URL:
http://127.0.0.1:8000
