<?php
/**
 * Modify block settings
 *
 * @package modules
 * @copyright (C) 2002-2006 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Search Module
 * @copyright (C) 2008-2010 2skies.com
 * @link http://xarigami.com/projects/
 * @author Search Module Development Team
 */
/**
 * @param array $blockinfo The array with information for this block
 * @return array with (int numitems, id blockid)
 */
function search_searchblock_modify($blockinfo)
{
    /* Get current content */
    if (!is_array($blockinfo['content'])) {
        $vars = unserialize($blockinfo['content']);
    } else {
        $vars = $blockinfo['content'];
    }

    if (empty($vars['useadvanced'])) {
        $vars['useadvanced'] = false;
    }

    return array(
        'useadvanced' => $vars['useadvanced'],
        'blockid' => $blockinfo['bid']
    );
}

/**
 * Update block settings
 *
 * @param array $blockinfo
 * @param int numitems
 * @return array $blockinfo
 */
function search_searchblock_update($blockinfo)
{
    $vars = array();
    if (!xarVarFetch('useadvanced', 'checkbox', $vars['useadvanced'], false, XARVAR_DONT_SET)) {return;}
    $blockinfo['content'] = $vars;
    return $blockinfo;
}
?>
