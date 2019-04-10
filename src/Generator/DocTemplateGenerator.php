<?php

namespace Moravio\DocTemplates\Generator;

use Moravio\DocTemplates\Exceptions\FileBuildFailed;
use File;
use Log;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class DocTemplateGenerator
{
    /**
     * File path of Template to be used and it's keywords should be replaced.
     *
     * @var string
     */
    protected $templateFilePath;

    /**
     * Template processor of setted Template.
     *
     * @var TemplateProcessor
     */
    protected $templateProcessor;

    /**
     * Template Variables to be replaced.
     *
     * @var TemplateVariables
     */
    protected $templateVariables;

    /**
     * Set Template file path.
     *
     * @param string $templateFilePath
     * @return $this
     * @throws FileBuildFailed
     */
    public function setTemplatePath(string $templateFilePath)
    {
        Settings::setOutputEscapingEnabled(true);
        $this->templateFilePath = $templateFilePath;
        if (File::exists($this->templateFilePath) === false) {
            Log::error('Požadovaná šablona s cestou ' . $this->templateFilePath . ' neexistuje.');
            throw new FileBuildFailed(__('Šablona není v pořádku. Dokument nelze vytvořit.'));
        }

        try {
            $this->templateProcessor = new TemplateProcessor($this->templateFilePath);
        } catch (CreateTemporaryFileException $e) {
            Log::error('Template file in path ' . $this->templateFilePath . ' not found or is not reachable.' .
                'Not possible to create new document from template!');
            throw new FileBuildFailed(__('Šablona není v pořádku. Dokument nelze vytvořit.'));
        } catch (CopyFileException $e) {
            Log::error('Can\'t copy template file in unique temporary file. Not possible to create new ' .
                'document from template!');
            throw new FileBuildFailed(__('Šablona není v pořádku. Dokument nelze vytvořit.'));
        }

        return $this;
    }

    /**
     * Set variables to be replaced.
     *
     * @param TemplateVariables $variables
     * @return DocTemplateGenerator
     */
    public function setVariables(TemplateVariables $variables) : DocTemplateGenerator
    {
        $this->templateVariables = $variables;
        return $this;
    }

    /**
     * Return file path of new file created from Template.
     *
     * @return string
     */
    public function getResult() : string
    {
        $this->replaceTemplate();

        $tempFileName = tempnam(sys_get_temp_dir(), str_random());
        $this->templateProcessor->saveAs($tempFileName);

        return $tempFileName;
    }

    /**
     * Replace variables in Template by variable values.
     *
     * @return void
     */
    protected function replaceTemplate() : void
    {
        foreach ($this->templateVariables->getVariables() as $variable) {
            $this->templateProcessor->setValue($variable->getKeyword(), $variable->getValue());
        }
    }
}
