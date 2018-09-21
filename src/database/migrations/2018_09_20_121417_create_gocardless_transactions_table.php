<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGocardlessTransactionsTable extends Migration
{
    protected $tableName;

    /**
     * CreateGocardlessTransactionsTable constructor.
     */
    public function __construct()
    {
        $this->tableName = gocardless_table_prefix('gocardless_transactions');
    }

    /**
     * Run the migrations.
     *
     * @return void
     * @codeCoverageIgnore
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('transactionable_type')->nullable();
            $table->unsignedBigInteger("transactionable_id")->nullable();
            $table->string('action')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(["transactionable_type", "transactionable_id"], $this->tableName . '_morphs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @codeCoverageIgnore
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
