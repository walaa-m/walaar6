<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('stuclasses', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->text('description')->after('title');
            $table->integer('credits')->after('description');
        });
    }

    public function down()
    {
        Schema::table('stuclasses', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'credits']);
        });
    }
};
