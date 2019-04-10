<?php

namespace Moravio\DocTemplates\Generator;

use Moravio\DocTemplates\Variables\Variable;

class TemplateVariables
{
    /**
     * List of variables with key as keyword to be replaced and value as value to change.
     *
     * @var Variable[]
     */
    private $variables = [];

    /**
     * Set new Variable to be replaced.
     *
     * @param Variable $variable
     * @return $this
     */
    public function setVariable(Variable $variable) : TemplateVariables
    {
        $this->variables[] = $variable;
        return $this;
    }

    /**
     * Get list of Variables.
     *
     * @return Variable[]
     */
    public function getVariables() : array
    {
        return $this->variables;
    }
}
