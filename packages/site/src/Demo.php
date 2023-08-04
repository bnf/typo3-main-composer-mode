<?php
declare(strict_types=1);

namespace Bnf\Site;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Page\JavaScriptModuleInstruction;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

final class Demo
{
    public function __construct(
         private readonly PageRenderer $pageRenderer
    ) {
    }

    public function demo(string $content, array $configuration, ServerRequestInterface $request): string
    {
        $this->pageRenderer->loadJavaScriptModule('@typo3/t3editor/element/code-mirror-element.js');
        $mode = JavaScriptModuleInstruction::create('@codemirror/lang-json', 'json')->invoke();
        $attributes = [
            'mode' => json_encode($mode),
            'autoheight' => true,
        ];
        $content = '{"foo": "bar"}';

        return sprintf(
            '<typo3-t3editor-codemirror %s><textarea>%s</textarea></typo3-t3editor-codemirror>',
            GeneralUtility::implodeAttributes($attributes, true),
            htmlspecialchars($content),
        );
    }
}
