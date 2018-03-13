<?php

namespace AuthenticationModule\Classes;

use Nette,
    UserModule\Services\UserService,
    DefaultModule\Services\HydratorService,
    Nette\Security\IAuthenticator,
    Nette\Security\Identity,
    Nette\Security\AuthenticationException,
    Nette\Security\Passwords;


/**
 * Users management.
 */
class Authentication extends Nette\Object implements IAuthenticator {
    
    const
        TABLE_NAME = 'user',
        COLUMN_ID = 'id',
        COLUMN_NAME = 'mail',
        COLUMN_PASSWORD_HASH = 'password';

    /** @var UserService */
    private $userService;

    /** @var HydratorService */
    private $hydratorService;

    public function __construct(UserService $userService, HydratorService $hydratorService) {
        $this->userService = $userService;
        $this->hydratorService = $hydratorService;
    }

    /**
     * Performs an authentication.
     * @return Nette\Security\Identity
     * @throws Nette\Security\AuthenticationException
     */
    public function authenticate(array $credentials)
    {
        list($e_mail, $password) = $credentials;

        $user = $this->userService->getOneByEMail($e_mail);

        if (!$user) {
                throw new AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);

        } elseif (!Passwords::verify($password, $user->getPassword())) {
                throw new AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
        }

        return new Identity($user->getId());
    }

    public function authenticateWithoutLogin($id) {

        $user = $this->userService->getOneById($id);

        return new Identity($user->getId());
    }

}
