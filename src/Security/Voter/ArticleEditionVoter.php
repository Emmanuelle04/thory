<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Security;

class ArticleEditionVoter extends Voter
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return $attribute === 'EDIT'
            && $subject instanceof \App\Entity\ArticleEdition;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

         // l'utilisateur est l'auteur de l'article
         if ($user === $subject->getAuthor()) {
            return true;
        }

           // l'utilisateur est un administrateur
           if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        return false;
    }
}
