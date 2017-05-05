<?php

namespace Atlassian\JiraRest\Requests\User;

class UserPropertyRequest extends UserPropertiesRequest
{
    /**
     * The property key name.
     *
     * @var string
     */
    protected $propertyKey;

    public function __construct($propertyKey)
    {
        $this->propertyKey = $propertyKey;
    }

    /**
     * Get the resource to call.
     */
    public function getResource()
    {
        return parent::getResource() . '/' . $this->propertyKey;
    }
}
