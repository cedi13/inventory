<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->decimal('price', 10, 2); 
            $table->unsignedBigInteger('category_id'); 
            $table->timestamps();

         
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
