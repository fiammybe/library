<?php
/**
 * Check requirements of the module
 *
 * @copyright	Copyright Madfish (Simon Wilkinson) 2012
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since		1.0
 * @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
 * @package		library
 * @version		$Id$
 */

defined("ICMS_ROOT_PATH") or die("ICMS root path not defined");

$failed_requirements = [];

if (PHP_VERSION_ID < 80200) {
	$failed_requirements[] = _AM_LIBRARY_REQUIREMENTS_PHP_VERSION;
}

// ImpressCMS 2.0.3 Final is build 118
if (!defined('ICMS_VERSION_BUILD') || ICMS_VERSION_BUILD < 118) {
	$failed_requirements[] = _AM_LIBRARY_REQUIREMENTS_ICMS_BUILD;
}

if (count($failed_requirements) > 0) {
	icms_cp_header();
	$icmsAdminTpl->assign("failed_requirements", $failed_requirements);
	$icmsAdminTpl->display(LIBRARY_ROOT_PATH . "templates/library_requirements.html");
	icms_cp_footer();
	exit;
}
