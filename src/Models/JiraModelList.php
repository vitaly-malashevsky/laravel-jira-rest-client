<?php

namespace Atlassian\JiraRest\Models;

use Atlassian\JiraRest\Traits\JiraModelTrait;
use Doctrine\Common\Collections\AbstractLazyCollection;

abstract class JiraModelList extends AbstractLazyCollection
{
    use JiraModelTrait {
        __construct as jiraModelConstruct;
    }

    /**
     * @var string
     */
    protected $attribute = null;

    /**
     * JiraModelList constructor.
     *
     * @param mixed $response
     */
    public function __construct($response)
    {
        if (is_array($response)) {
            $this->jiraModelConstruct((object) [$this->attribute => $response]);
        } else {
            $this->jiraModelConstruct($response);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function doInitialize()
    {
        if (! isset($this->attribute) || ! array_key_exists($this->attribute, $this->attributes)) {
            throw new \RuntimeException("The \"{$this->attribute}\" property has to be defined.");
        }

        $this->collection = $this->attributes[$this->attribute];
    }

}
