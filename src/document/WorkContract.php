<?php

namespace app\document;

class WorkContract implements  ExportableJson,  ExportableTXT,  ExportablePdf 
{
    private $content;

    public function __construct(String $content) {
        $this->content = $content;
    }

    public function toPdf() {
        // Test implementation, in reality this would
        // be more complex
        return $this->content;;
    }

    public function toJson() {
        // Test implementation, in reality this would
        // be more complex
        return "{'content':'" . $this->content ."'}";
    }

    public function toTxt() {
        // Test implementation, in reality this would
        // be more complex
        return $this->content;
    }
}