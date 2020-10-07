<?php

namespace Laragrad\Uuid\Models\Concerns;

use Laragrad\Uuid\Support\Uuid as CustomUuid;

/**
 * @desc Use this trait in models with UUID primary key
 *
 * Define specific $entityCode and $appCode in model properties to specific UUID generations.
 */
trait HasUuidPrimaryKey
{
    /**
     * Registering handler for "creating" event.
     */
    protected static function bootHasUuidPrimaryKey()
    {
        static::creating(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = CustomUuid::genUuid($model->getEntityCode(), $model->getAppCode());
            }
        });
    }

    /**
     * Overrides model's method and block 'incrementing' property changes
     *
     * @return boolean
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Overrides model's method and block 'keyType' property changes
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * Retrieves the application code specific for model
     *
     * @return integer
     */
    public function getAppCode()
    {
        return $this->appCode;
    }

    /**
     * Retrieves the entity code specific for model
     *
     * @return integer
     */
    public function getEntityCode()
    {
        return $this->entityCode;
    }

}