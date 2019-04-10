<?php

namespace Moravio\DocTemplates\Variables;

class BasicVariable implements Variable
{
    /**
     * Keyword to be replaced.
     *
     * @var string
     */
    private $keyword = '';

    /**
     * Value that keyword to be replaced by.
     *w
     * @var string
     */
    private $value = '';

    /**
     * @param string $keyword
     * @return Variable
     */
    public function setKeyword(string $keyword) : Variable
    {
        $this->keyword = $keyword;
        return $this;
    }

    /**
     * @param string|null $value
     * @return Variable
     */
    public function setValue(?string $value = null) : Variable
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get full Keyword (ex. including braces {{keyword}}).
     *
     * @return string
     */
    public function getKeyword(): string
    {
        return $this->keyword;
    }

    /**
     * Get Value what Keyword should be replaced by.
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
}
