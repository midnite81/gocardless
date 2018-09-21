<?php
namespace Midnite81\GoCardless\Tests\TestCases;

use Illuminate\Support\Collection;
use Midnite81\GoCardless\Tests\BaseTestCase;

class ModelTestCase extends BaseTestCase
{
    /**
     * The model we are testing.
     *
     * @var string
     */
    protected $model;

    /**
     * Test that the belongs to relationship is setup correctly.
     *
     * @param string      $relation
     * @param string      $relatedModel
     * @param string|null $key
     */
    protected function belongsTo($relation, $relatedModel, $key = null)
    {
        $model = new $this->model;

        $this->assertNull($model->$relation);

        // If a key isn't provided attempt to guess it.
        if ( ! $key) {
            $key = snake_case($relation) . '_id';
        }

        $relatedInstance = factory($relatedModel)->create();
        $model = factory(get_class($this->model))->create([$key => $relatedInstance->id]);

        $this->assertInstanceOf($relatedModel, $model->$relation);
    }

    /**
     * Test that the belongs to relationship is setup correctly.
     *
     * @param string        $relation
     * @param string        $relatedModel
     * @param callable|null $callback
     */
    protected function hasOne($relation, $relatedModel, callable $callback = null)
    {
        $model = new $this->model;

        $this->assertNull($model->$relation);

        $model = factory(get_class($this->model))->create();

        if ($callback) {
            $callback();
        } else {
            $model->$relation()->save(factory($relatedModel)->make());
        }

        $this->assertInstanceOf($relatedModel, $model->$relation);
    }

    /**
     * Test that the has many relationship is setup correctly.
     *
     * @param string        $relation
     * @param string        $relatedModel
     * @param callable|null $callback
     */
    protected function hasMany($relation, $relatedModel, callable $callback = null)
    {
        $model = new $this->model;

        $this->assertInstanceOf(Collection::class, $model->$relation);
        $this->assertTrue($model->$relation->isEmpty());

        $model = factory(get_class($this->model))->create();

        if ($callback) {
            $callback($model);
        } else {
            $model->$relation()->saveMany(
                factory($relatedModel, 3)->make()
            );
        }

        $model = $model->fresh($relation);

        $this->assertInstanceOf(Collection::class, $model->$relation);
        $this->assertFalse($model->$relation->isEmpty());
        $this->assertEquals(3, $model->$relation->count());
        $this->assertInstanceOf($relatedModel, $model->$relation->first());
    }


    /**
     * Test that the belongs to many relationship is setup correctly.
     *
     * @param string        $relation
     * @param string        $relatedModel
     * @param callable|null $callback
     */
    protected function belongsToMany($relation, $relatedModel, callable $callback = null)
    {
        return $this->hasMany($relation, $relatedModel, $callback);
    }

    /**
     * Test that the morph to relationship is setup correctly.
     *
     * @param string      $relation
     * @param string      $relatedModel
     * @param string|null $type
     */
    protected function morphTo($relation, $relatedModel, $type = null)
    {
        $model = new $this->model;

        $this->assertNull($model->$relation);

        // If a type isn't provided attempt to guess it.
        if ( ! $type) {
            $type = $relation;
        }

        $relatedInstance = factory($relatedModel)->create();
        $model = factory(get_class($this->model))->create([
            $type . '_id' => $relatedInstance->getKey(),
            $type . '_type' => $relatedModel,
        ]);

        $this->assertInstanceOf($relatedModel, $model->$relation);
    }

    /**
     * Test that the morphs one relationship is setup correctly.
     *
     * @param string      $relation
     * @param string      $relatedModel
     * @param string|null $type
     */
    protected function morphOne($relation, $relatedModel, $type = null)
    {
        $model = new $this->model;

        $this->assertNull($model->$relation);

        // If a type isn't provided attempt to guess it.
        if ( ! $type) {
            $type = $relation . 'able';
        }

        $model = factory(get_class($this->model))->create();

        factory($relatedModel)->create([
            $type . '_id' => $model->getKey(),
            $type . '_type' => $this->model,
        ]);

        $this->assertInstanceOf($relatedModel, $model->$relation);
    }

    /**
     * Test that the morph many relationship is setup correctly.
     *
     * @param string        $relation
     * @param string        $relatedModel
     * @param callable|null $callback
     * @return void
     */
    protected function morphMany($relation, $relatedModel, callable $callback = null)
    {
        return $this->hasMany($relation, $relatedModel, $callback);
    }
}