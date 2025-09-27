<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('order_type', ['pickup', 'delivery', 'dine_in'])->after('payment_method');
            $table->date('order_date')->nullable()->after('order_type');
            $table->time('order_time')->nullable()->after('order_date');
            $table->text('delivery_address')->nullable()->after('order_time');
            $table->enum('order_status', ['pending', 'confirmed', 'preparing', 'ready', 'completed', 'cancelled'])->default('pending')->after('delivery_address');
            $table->decimal('reward_points', 8, 2)->default(0)->after('order_status');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['order_type', 'order_date', 'order_time', 'delivery_address', 'order_status', 'reward_points']);
        });
    }
};