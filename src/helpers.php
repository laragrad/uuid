<?php

if (! function_exists('gen_uuid')) {

    /**
     * Generates UUID with specific algorithm
     *
     * @param int $entityCode
     * @param int $appCode
     * @return string
     */
    function gen_uuid(int $entityCode = 0, int $appCode = 0)
    {
        return \Laragrad\Uuid\Support\Uuid::genUuid($entityCode, $appCode);
    }
}

if (! function_exists('get_uuid_timestamp')) {

    /**
     * Decode timestamp from UUID
     *
     * @param string $uuid
     * @param string $format
     * @return \Laragrad\Uuid\Support\DateTime|\Carbon\Carbon|string
     */
    function get_uuid_timestamp(string $uuid, string $format = 'Carbon')
    {
        return \Laragrad\Uuid\Support\Uuid::getUuidTimestamp($uuid, $format);
    }
}

if (! function_exists('get_uuid_app_code')) {

    /**
     * Decode application code from UUID
     *
     * @param string $uuid
     * @return number
     */
    function get_uuid_app_code(string $uuid)
    {
        return \Laragrad\Uuid\Support\Uuid::getUuidAppCode($uuid);
    }
}

if (! function_exists('get_uuid_entity_code')) {

    /**
     * Decode entity code from UUID
     *
     * @param string $uuid
     * @return number
     */
    function get_uuid_entity_code(string $uuid)
    {
        return \Laragrad\Uuid\Support\Uuid::getUuidEntityCode($uuid);
    }
}

