<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'guest_name')) {
                $table->string('guest_name')->nullable();
            }
            if (!Schema::hasColumn('orders', 'guest_mobile')) {
                $table->string('guest_mobile')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropColumn(['customer_id', 'guest_name', 'guest_mobile', 'order_type']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
};