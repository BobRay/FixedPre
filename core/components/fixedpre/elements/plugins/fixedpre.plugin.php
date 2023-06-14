<?php
/**
 * FixedPre plugin
 *
 * *
 * @author Bob Ray <https://bobsguides.com>
 * Copyright 2011-2017 Bob Ray
 * 3/23/11
 *
 * FixedPre is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FixedPre is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FixedPre; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package fixedpre
 */

/**
 * MODX FixedPre plugin
 *
 * Description: MODX tags inside <fixedpre> blocks will be displayed
 * rather than executed.
 *
 * Events: OnParseDocument
 *
 * @package fixedpre
 *
 * @property
 */

/** plugin fixedpre  -- implements <fixedpre> tag
 * MODX code inside <fixedpre></fixedpre> tags will be displayed
 * rather than executed.
 * @author Rahul Dhesi
 * @author Bob Ray
 * @package fixedpre
 * Bugs and feature requests: https://github.com/BobRay/FixedPre/issues
 * Support: https://community.modx.com
 * 
 */
if (! function_exists('quote_meta') ) {
    function quote_meta($a) {
        $lhs = array("<", ">", "[", "]", "!", "{", "}", "`", "*", "~");
        $rhs = array("&lt;", "&gt;", "&#091;", "&#093;", "&#033;", "&#123;", "&#125;", "&#96;", "&#42;", "&#126;");
        $b = str_replace("&", "\255", $a[2]);  //save "&"
        $lhs_preg = array('|<!(!*)fixedpre>|',  '|<!(!*)/fixedpre>|');
        $rhs_preg = array('<$1fixedpre>',  '<$1/fixedpre>');
        $b = preg_replace($lhs_preg, $rhs_preg, $b);
        $b = str_replace($lhs, $rhs, $b);

        /* restore '&' as '&amp;' and wrap in span tag */
        //return '<span class="fxp">' . str_replace("\255", "&amp;", $b) . '</span>';
        return str_replace("\255", "&amp;", $b);
    }
}
/** @var $modx modX */
$output =& $modx->documentOutput;
$output = preg_replace_callback("#(<fixedpre>)(.*?)(</fixedpre>)#s",
    "quote_meta", $output);

return '';