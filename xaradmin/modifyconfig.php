<?php
/**
 * Standard function to modify configuration parameters
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
 * This is a standard function to modify the configuration parameters of the
 * module
 * @author Jo Dalle Nogare
 * @return array
 */
function search_admin_modifyconfig()
{
    // Security check
    if (!xarSecurityCheck('AdminSearch')) return;
    // Generate a one-time authorisation code for this operation
    $data['authid'] = xarSecGenAuthKey();
    $data['menulinks'] = xarModAPIFunc('search','admin','getmenulinks');
    // Specify some labels and values for display
    $data['showLastSearches'] = xarModGetVar('search', 'showsearches');

    $data['searchitemvalue'] = xarModGetVar('search', 'searchestoshow');
    if (!isset($data['searchitemvalue'])) {
        $data['searchitemvalue']=0;
    }
    $data['itemsvalue'] = xarModGetVar('search', 'itemsperpage');
    if (!isset($data['itemsvalue'])) {
        $data['itemsvalue']=20;
    }
    $data['updatebutton'] = xarVarPrepForDisplay(xarML('Update Configuration'));
    //$data['shorturlslabel'] = xarML('Enable short URLs?');
    //$data['shorturlschecked'] = xarModGetVar('search', 'SupportShortURLs') ? true : false;
    // Return the template variables defined in this function
    return $data;
}

?>
