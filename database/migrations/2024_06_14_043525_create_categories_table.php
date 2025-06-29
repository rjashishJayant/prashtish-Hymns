<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private $_pre_col = 'cat_';

    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements($this->_pre_col . 'id');
            $table->string($this->_pre_col . 'name', 255);
            $table->string($this->_pre_col . 'status',20);
            $table->text($this->_pre_col . 'desc')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
