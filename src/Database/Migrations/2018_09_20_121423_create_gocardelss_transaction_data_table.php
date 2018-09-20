<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGocardelssTransactionDataTable extends Migration
{
    protected $tableName;

    /**
     * CreateGocardlessTransactionsTable constructor.
     */
    public function __construct()
    {
        $this->tableName = gocardless_table_prefix('gocardless_transaction_data');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transaction_id');
            $table->string('key');
            $table->string('value');
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on(gocardless_table_prefix('gocardless_transactions'))->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
