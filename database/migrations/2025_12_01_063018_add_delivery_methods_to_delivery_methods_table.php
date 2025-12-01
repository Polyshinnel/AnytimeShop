<?php

use App\Models\DeliveryMethod;
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
        $data_items = [
            [
                'name' => 'Custom'
            ],
            [
                'name' => 'Sdec'
            ],
        ];
        foreach ($data_items as $item) {
            DeliveryMethod::create($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DeliveryMethod::whereIn('name', ['Custom', 'Sdec'])->delete();
    }
};
