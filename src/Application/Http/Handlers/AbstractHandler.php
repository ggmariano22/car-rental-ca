<?php

namespace Application\Http\Handlers;

class AbstractHandler
{
    public function getAttributes(string $json)
    {
        return json_decode(
            $json,
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}