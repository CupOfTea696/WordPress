<?php

namespace CupOfTea;

use CupOfTea\Package\Package;
use CupOfTea\Package\Contracts\Package as PackageContract;

class WordPress implements PackageContract
{
    use Package;
    
    /**
     * Package Vendor.
     *
     * @const string
     */
    const VENDOR = 'CupOfTea';
    
    /**
     * Package Name.
     *
     * @const string
     */
    const PACKAGE = 'WordPress';
    
    /**
     * Package Version.
     *
     * @const string
     */
    const VERSION = '1.1.5';
}
