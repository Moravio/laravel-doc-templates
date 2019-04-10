<?php

namespace Moravio\DocTemplates;

use Moravio\DocTemplates\Exceptions\FileBuildFailed;
use Moravio\DocTemplates\Generator\DocTemplateGenerator;
use Moravio\DocTemplates\Generator\TemplateVariables;
use Moravio\DocTemplates\Variables\Variable;

abstract class Template
{
    /**
     * Returns what Variable type use to.
     *
     * @return string
     */
    abstract public function getVariableType() : string;

    /**
     * Return Template file path.
     *
     * @return string
     */
    abstract public function getTemplateFilePath() : string;

    /**
     * Organized array of variable key and it's value.
     *
     * @return array
     */
    abstract public function getReplacements() : array;

    /**
     * Use $this->getDocumentPath() to get path of newly created file from template.
     * Implement storage of file just where you want.
     *
     * @param string $filePath
     * @return string
     */
    abstract public function saveFile(?string $filePath = null) : string;

    /**
     * Returns temporary file path of newly created Document.
     *
     * @return string
     * @throws FileBuildFailed
     */
    protected function getDocumentPath() : string
    {
        $templateGenerator = new DocTemplateGenerator();
        $templateVariables = new TemplateVariables();
        $variableType = $this->getVariableType();

        // Prepare Variables
        foreach ($this->getReplacements() as $keyword => $value) {
            /** @var Variable $variable */
            $variable = new $variableType;
            $templateVariables->setVariable($variable->setKeyword($keyword)->setValue($value));
        }

        $templateGenerator->setTemplatePath($this->getTemplateFilePath())
            ->setVariables($templateVariables);

        return $templateGenerator->getResult();
    }
}
