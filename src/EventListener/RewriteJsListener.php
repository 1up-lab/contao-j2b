<?php

namespace Oneup\Contao\J2BBundle\EventListener;

use Contao\PageModel;
use Contao\LayoutModel;
use Contao\PageRegular;

class RewriteJsListener
{
    public function onPageGenerate(PageModel $objPage, LayoutModel $objLayout, PageRegular $objPageRegular): void
    {
        if ('FE' === TL_MODE) {
            foreach($GLOBALS['TL_JAVASCRIPT'] as $index => $javascript) {
                $javascript = preg_replace('/\|.*/', '', $javascript);

                $GLOBALS['TL_BODY'][] = '<script type="text/javascript" src="' . $javascript . '"></script>';

                unset($GLOBALS['TL_JAVASCRIPT'][$index]);
            }
        }
    }
}
