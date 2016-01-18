<?php
/**
 * XoopsMembers module
 * Description: Category Admin file
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright::  The XOOPS Project (http://www.xoops.org)
 * @license::    {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @package::    xoopsmembers
 * @subpackage:: admin
 * @since::      1.02
 * @author::     Mamba
 * @version::    $Id $
 **/

include_once 'admin_header.php';
xoops_cp_header();

$index_admin = new ModuleAdmin();

echo $index_admin->addNavigation('index.php');
echo $index_admin->renderIndex();

include 'admin_footer.php';
xoops_cp_footer();
