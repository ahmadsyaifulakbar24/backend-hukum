<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS vw_total_legal_product_by_service_categories");
        DB::statement("
            CREATE VIEW vw_total_legal_product_by_service_categories as
            SELECT 
                a.id,
                a.type,
                a.name,
                a.order,
                count(b.id) as total
            FROM 
            service_categories as a 
            LEFT JOIN legal_products as b ON a.id = b.service_category_id
            GROUP BY a.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
