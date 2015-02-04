<?php

namespace KMGH\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class KMGHUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
