<?php
/**
 * Search System - Present searches via hooks
 *
 * @package modules
 * @copyright (C) 2002-2007 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Search Module
 * @copyright (C) 2008-2010 2skies.com
 * @link http://xarigami.com/projects/
 * @author Search Module Development Team
 */
/**
 * initialise block
 *
 * @access public
 * @param none $
 * @return nothing
 * @throws no exceptions
 * @todo nothing
 */
function search_searchblock_init()
{
    return array(
        'nocache' => 1, // don't cache by default
        'pageshared' => 1, // share across pages
        'usershared' => 1, // share for group members
        'cacheexpire' => null,
        'useadvanced' => false
        );
}

/**
 * get information on block
 *
 * @access public
 * @param none $
 * @return data array
 * @throws no exceptions
 * @todo nothing
 */
function search_searchblock_info()
{
    // Values
    return array('text_type'        => 'Search',
        'module'                    => 'search',
        'text_type_long'            => 'Search Block',
        'allow_multiple'            => false,
        'form_content'              => false,
        'form_refresh'              => false,
        'show_preview'              => true);
}

/**
 * display search block
 *
 * @access public
 * @param none $
 * @return data array on success or void on failure
 * @throws no exceptions
 * @todo implement centre menu position
 */
function search_searchblock_display($blockinfo)
{
    // Security Check - reminder here
    //if (!xarSecurityCheck('ReadSearch', 0)) {return;}
    // Security is now handled by Blocks module
    // Get variables from content block
    if (is_string($blockinfo['content'])) {
        $vars = @unserialize($blockinfo['content']);
    } else {
        $vars = $blockinfo['content'];
    }
    if (!isset($vars['useadvanced'])) {
        $vars['useadvanced'] = 0;
    }

    $blockinfo['content'] = array(
        'blockid' => $blockinfo['bid'],
        'useadvanced' => $vars['useadvanced']
    );
    return $blockinfo;
}

?>
