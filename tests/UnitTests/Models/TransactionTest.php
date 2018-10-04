<?php
namespace Midnite81\GoCardless\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Midnite81\GoCardless\Models\Transaction;
use Midnite81\GoCardless\Models\Transaction\Data;
use Midnite81\GoCardless\Tests\TestCases\ModelTestCase;

class TransactionTest extends ModelTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->model = new Transaction();
    }

    /**
     * @test
     */
    public function it_is_an_instance_of_model()
    {
        $this->assertInstanceOf(Model::class, $this->model);
    }

    /**
     * @test
     */
    public function it_has_data_relationship_set_up_correctly()
    {
        $this->hasMany('data', Data::class, null);
    }
}