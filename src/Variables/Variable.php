<?php

namespace Moravio\DocTemplates\Variables;

interface Variable
{
    /**
     * @param string $keyword
     * @return Variable
     */
    public function setKeyword(string $keyword) : Variable;

    /**
     * @param string|null $value
     * @return Variable
     */
    public function setValue(?string $value = null) : Variable;

    /**
     * Get full Keyword (ex. including braces {{keyword}}.
     *
     * @return string
     */
    public function getKeyword() : string;

    /**
     * Get Value what Keyword should be replaced by.
     *
     * @return string|null
     */
    public function getValue() : ?string;
}
