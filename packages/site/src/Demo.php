<?php
declare(strict_types=1);

namespace Bnf\Site;

use TYPO3\CMS\Core\Page\JavaScriptModuleInstruction;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

final class Demo
{
    public function __construct(
         private readonly PageRenderer $pageRenderer
    ) {
    }

    public function demo(): string
    {
        $mode = JavaScriptModuleInstruction::create('@codemirror/lang-json', 'json')->invoke();
        $attributes = [
            'mode' => json_encode($mode),
            'autoheight' => true,
        ];
        $content = '{"foo": "bar"}';

        $this->pageRenderer->loadJavaScriptModule('@typo3/t3editor/element/code-mirror-element.js');
        return sprintf(
            '<typo3-t3editor-codemirror %s><textarea>%s</textarea></typo3-t3editor-codemirror>',
            GeneralUtility::implodeAttributes($attributes, true),
            htmlspecialchars($content, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8'),
        );
    }
}
