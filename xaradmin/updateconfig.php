<?php
/**
 * Search System - Present searches via hooks
 *
 * @package modules
 * @copyright (C) 2002-2007 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Search Module
 * @copyright (C) 2008-2011 2skies.com
 * @link http://xarigami.com/projects/
 * @author Search Module Development Team
 */
/**
 * This is a standard function to update the configuration parameters of the
 * module given the information passed back by the modification form
 *
 * @author Jo Dalle Nogare
 * @return bool true on successfull update of configuration
 */
function search_admin_updateconfig()
{
    if (!xarVarFetch('showsearches', 'checkbox', $showsearches, false, XARVAR_NOT_REQUIRED)) return;

    //The following - todo - later
    //if (!xarVarFetch('itemsperpage', 'int', $itemsperpage, 10, XARVAR_NOT_REQUIRED)) return;
    //if (!xarVarFetch('searchestoshow', 'int', $searchestoshow, 10, XARVAR_NOT_REQUIRED)) return;
    //if (!xarVarFetch('shorturls', 'checkbox', $shorturls, false, XARVAR_NOT_REQUIRED)) return;

    if (!xarSecConfirmAuthKey()) return;
    // Update module variables.  Note that the default values are set in
    // xarVarFetch when recieving the incoming values, so no extra processing
    // is needed when setting the variables here.
    xarModSetVar('search', 'showsearches', $showsearches);
    //xarModSetVar('search', 'itemsperpage', $itemsperpage);
    //xarModSetVar('search', 'searchestoshow', $searchestoshow);
    //xarModSetVar('search', 'SupportShortURLs', $shorturls);

    xarModCallHooks('module','updateconfig','search',
                   array('module' => 'search'));

    $msg = xarML('Search configuration successfully updated.');
    xarTplSetMessage($msg,'status');
    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    xarResponseRedirect(xarModURL('search', 'admin', 'modifyconfig'));

    // Return
    return true;
}

?>
