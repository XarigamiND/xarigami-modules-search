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
$modversion['name']           = 'Search';
$modversion['id']             = '32';
$modversion['version']        = '0.3.1';
$modversion['displayname']    =  'Search';
$modversion['description']    = 'Search for data';
$modversion['credits']        = 'xardocs/credits.txt';
$modversion['help']           = 'xardocs/help.txt';
$modversion['changelog']      = 'xardocs/changelog.txt';
$modversion['license']        = 'xardocs/license.txt';
$modversion['official']       = 'http://xarigami/projects';
$modversion['homepage']       = 1;
$modversion['author']         = '';
$modversion['contact']        = '';
$modversion['admin']          = 1;
$modversion['user']           = 1;
$modversion['class']          = 'Utility';
$modversion['category']       = 'Utilities';
$modversion['dependencyinfo']   = array(
                                    0 => array(
                                            'name' => 'core',
                                            'version_ge' => '1.2.0'
                                         )
                                    );

if (false) {
    xarML('Search');
    xarML('Search for data');
}
?>
