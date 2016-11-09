<?php
namespace Staempfli\Pdf\Api;

/**
 * Fake implementation returned by FakePdfEngine
 */
final class FakeGeneratedPdf implements GeneratedPdf
{
    /** @var string */
    public $contents;
    /** @var bool */
    public $isGenerated = false;
    /** @var bool */
    private $isSent = false;

    /**
     * @param string $contents
     */
    public function __construct($contents = '')
    {
        $this->contents = $contents;
    }

    public function saveAs($path)
    {
        \file_put_contents($path, $this->contents);
    }

    public function send()
    {
        $this->isSent = true;
    }

    public function toString()
    {
        return $this->contents;
    }

    /**
     * @return bool
     */
    public function isSent()
    {
        return $this->isSent;
    }
}