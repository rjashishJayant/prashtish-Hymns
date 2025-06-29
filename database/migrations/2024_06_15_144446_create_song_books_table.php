<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    private $_pre_col = 'lyrics_';

    public function up(): void
    {
        Schema::create('song_books', function (Blueprint $table) {
            $table->bigIncrements($this->_pre_col . 'id');
            $table->unsignedBigInteger($this->_pre_col . 'cat_id');
            $table->foreign($this->_pre_col . 'cat_id')->references('cat_id')->on('categories');
            $table->string($this->_pre_col . 'title', 255);
            $table->string($this->_pre_col . 'worshipper_name', 255)->nullable();
            $table->string($this->_pre_col . 'status', 20);
            $table->string($this->_pre_col . 'thumbnail', 250);
            $table->text($this->_pre_col . 'words');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('song_books');
    }
};
