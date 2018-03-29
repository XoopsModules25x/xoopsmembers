<?php namespace XoopsModules\Xoopsmembers;

use Xmf\Request;
use XoopsModules\Xoopsmembers;
use XoopsModules\Xoopsmembers\Common;

/**
 * Class Utility
 */
class Utility
{
    use Common\VersionChecks; //checkVerXoops, checkVerPhp Traits

    use Common\ServerStats; // getServerStats Trait

    use Common\FilesManagement; // Files Management Trait

    //--------------- Custom module methods -----------------------------
}
