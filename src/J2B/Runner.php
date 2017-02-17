<?php

namespace Oneup\Contao\J2B;

use Contao\PageModel;
use Contao\LayoutModel;
use Contao\PageRegular;

class Runner
{
    public function moveJs(PageModel $objPage, LayoutModel $objLayout, PageRegular $objPageRegular)
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
