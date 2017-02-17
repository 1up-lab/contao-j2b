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
            if (!is_array($GLOBALS['TL_BODY'])) {
                $GLOBALS['TL_BODY'] = [];
            }

            foreach($GLOBALS['TL_JAVASCRIPT'] as $index => $javascript) {
                $javascript = preg_replace('/\|.*/', '', $javascript);

                $GLOBALS['TL_BODY'] = array_merge(
                    [
                        sprintf(
                            '<script type="text/javascript" src="%s"></script>',
                            $javascript
                        )
                    ],
                    $GLOBALS['TL_BODY']
                );

                unset($GLOBALS['TL_JAVASCRIPT'][$index]);
            }
        }
    }
}
