<?php

namespace Oneup\Contao\J2B;

class Runner
{
    public function moveJs(\PageModel $objPage, \LayoutModel $objLayout, \PageRegular $objPageRegular)
    {
        if ('FE' === TL_MODE) {
            foreach($GLOBALS['TL_JAVASCRIPT'] as $index => $javascript) {
                $javascript = preg_replace('/\|static/', '', $javascript);

                $GLOBALS['TL_BODY'][] = '<script type="text/javascript" src="' . $javascript . '"></script>';

                unset($GLOBALS['TL_JAVASCRIPT'][$index]);
            }
        }
    }
}
