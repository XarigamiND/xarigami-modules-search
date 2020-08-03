<?php
/**
 * Search System - Present searches via hooks
 *
 * @package modules
 * @copyright (C) 2002-2007 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Search Module
 * @copyright (C) 2008,2009 2skies.com
 * @link http://xarigami.com/projects/
 * @author Search Module Development Team
 */
/**
 * @author Jo Dalle Nogare
 * the Search Overview function
 */
function search_admin_overview()
{
    if (!xarSecurityCheck('AdminSearch')) return;
    $data=array();
    // success
    $data['menulinks'] = xarModAPIFunc('search','admin','getmenulinks');
    return $data;
}

?>
