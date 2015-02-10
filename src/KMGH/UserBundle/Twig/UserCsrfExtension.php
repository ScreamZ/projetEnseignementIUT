<?php
/**
 * UserCsrfExtension.php
 */

namespace KMGH\UserBundle\Twig;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Csrf\CsrfTokenManager;

class UserCsrfExtension extends \Twig_Extension
{

    /**
     * @var CsrfTokenManager
     */
    protected $csrfManager;

    /**
     * @var TokenStorage
     */
    protected $securityTokenStorage;

    public function __construct($csrfManager, $sts)
    {
        $this->csrfManager = $csrfManager;
        $this->securityTokenStorage = $sts;

    }

    public function getFunctions()
    {
        return array(
            'userCsrf' => new \Twig_SimpleFunction('user_csrf', array($this, 'generateUserCsrf'))
        );
    }

    public function generateUserCsrf()
    {
        return $this->csrfManager->getToken('projet_iut_' . $this->securityTokenStorage->getToken()->getUser()->getId());
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'user_csrf';
    }
}