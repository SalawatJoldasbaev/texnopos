<?php

use App\Models\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('working_hours');
            $table->string('address');
            $table->timestamps();
        });

        Company::create([
            'phone' =>+998330010528,
            'working_hours' =>"Dushanbadan-Yakshanbagacha,9:00 - 20:00",
            'address' =>"G'arezsizlik ko'chasi 80/4"
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
