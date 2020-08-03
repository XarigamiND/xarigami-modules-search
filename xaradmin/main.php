<?php
/**
 * Search main administration function
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
 * The main administration function
 * @author Jo Dalle Nogare <jojodee@xaraya.com>
 * @return bool true
 *
 */
function search_admin_main()
{
    if (!xarSecurityCheck('AdminSearch')) return;

    // If docs are turned off, then we just return the view page, or whatever
    // function seems to be the most fitting.
    xarResponseRedirect(xarModURL('search', 'admin', 'modifyconfig'));
    // success
    return true;
}

?>
