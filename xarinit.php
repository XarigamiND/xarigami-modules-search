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
 * Initialise the search module
 *
 * @access public
 * @param none $
 * @return true on success or void or false on failure
 * @throws 'DATABASE_ERROR'
 * @todo nothing
 */
function search_init()
{
    xarModSetVar('search', 'resultsperpage', 10);
    xarModSetVar('search', 'showsearches', false);
    // Register blocks
    if (!xarModAPIFunc('blocks',
            'admin',
            'register_block_type',
            array('modName' => 'search',
                'blockType' => 'search'))) return;

    // Register search hook
    xarModRegisterHook('item','search','GUI','search','user','searchform');

    // Register Mask
    xarRegisterMask('ReadSearch', 'All', 'search', 'All', 'All', 'ACCESS_READ');
    xarRegisterMask('AdminSearch', 'All', 'search', 'All', 'All', 'ACCESS_ADMIN');
    //This initialization takes us to version 0.2.0 - continue in upgrade
    return search_upgrade('0.2.0');
}

/**
 * Upgrade the search module from an old version
 *
 * @access public
 * @param  $oldVersion
 * @return true on success or false on failure
 * @throws no exceptions
 * @todo nothing
 */
function search_upgrade($oldversion)
{
    switch($oldversion) {
    case '0.1':
        // Register search hook
        xarModRegisterHook('item','search','GUI','search','user','searchform');

    //fall through to next version upgrade
    case '0.2.0':
        //register AdminSearch mask
        xarRegisterMask('AdminSearch', 'All', 'search', 'All', 'All', 'ACCESS_ADMIN');
        //admin configurable prior search display
        //set this to false - most people don't want to see their search term listed
        // also possible spammers aid to get higher search engine rankings with it on
         xarModSetVar('search', 'showsearches', false);

    case '0.3.1':     //current version
        break;
    }
    return true;
}
/**
 * Delete the search module
 *
 * @access public
 * @param no $ parameters
 * @return true on success or false on failure
 * @todo restore the default behaviour prior to 1.0 release
 */
function search_delete()
{
    xarModDelAllVars('search');
    // UnRegister blocks
    if (!xarModAPIFunc('blocks',
            'admin',
            'unregister_block_type',
            array('modName' => 'search',
                'blockType' => 'search'))) return;
    // Remove Masks and Instances
    xarRemoveMasks('search');
    xarRemoveInstances('search');

    // Unregister search hook
    xarModUnRegisterHook('item','search','GUI','search','user','searchform');

    return true;
}

?>
