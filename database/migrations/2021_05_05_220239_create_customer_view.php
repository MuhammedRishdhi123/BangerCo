<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("CREATE VIEW view_customer AS
        SELECT 
            i.id, 
            i.name, 
            i.licenseNo,
            i.status
        FROM users u 
        INNER JOIN insurance.insurers i 
        ON u.licenseNo=i.licenseNo;");
    }





    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW IF EXISTS `view_customer`");
    }

}