<?php
/**
 * FixedPre transport plugins
  * @author Bob Ray <https://bobsguides.com>
 * 2/10/11
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
 * Description:  Array of plugin objects for FixedPre package
 * @package fixedpre
 * @subpackage build
 */

/** @var $modx modX */
/** @var $sources array */
if (! function_exists('getPluginContent')) {
    function getPluginContent($filename) {
        $o = file_get_contents($filename);
        $o = str_replace('<?php','',$o);
        $o = str_replace('?>','',$o);
        $o = trim($o);
        return $o;
    }
}
$plugins = array();

$plugins[1]= $modx->newObject('modplugin');
$plugins[1]->fromArray(array(
    'id' => 1,
    'name' => 'FixedPre',
    'description' => 'Plugin Code for FixedPre.',
    'plugincode' => getPluginContent($sources['source_core'].'/elements/plugins/fixedpre.plugin.php'),
),'',true,true);

return $plugins;