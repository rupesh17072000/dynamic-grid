<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('file_number');
            $table->string('manager_name');
            $table->string('service_provider_name');
            $table->string('claim_number');
            $table->string('assignment_id');
            $table->string('company_name');

            $table->date('invoice_date')->nullable();

            $table->decimal('expenses',10,2)->default(0);
            $table->decimal('sale_tax',10,2)->default(0);
            $table->decimal('payment_amount',10,2)->default(0);
            $table->decimal('balance_amount',10,2)->default(0);

            $table->date('payment_date')->nullable();

            $table->decimal('loss_amount',10,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
