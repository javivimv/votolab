<?php

namespace Votolab\VotolabBundle\Voters;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;
use Votolab\VotolabBundle\Model\ElectionManager;

class CanViewElectionVoter implements VoterInterface
{
    /** @var ElectionManager */
    protected $electionManager;

    /**
     * @param $electionManager
     */
    public function __construct(ElectionManager $electionManager)
    {
        $this->electionManager = $electionManager;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsAttribute($attribute)
    {
        return 'CAN_VIEW_ELECTION' === $attribute;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return get_class($class) === 'Votolab\VotolabBundle\Entity\Election';
    }

    /**
     * {@inheritDoc}
     */
    public function vote(TokenInterface $token, $election, array $attributes)
    {
        foreach ($attributes as $attribute) {
            if ($this->supportsAttribute($attribute) && $this->supportsClass($election)) {
                $user = $token->getUser();
                if ($this->electionManager->isVoterForElection($user, $election)) {
                    return VoterInterface::ACCESS_GRANTED;
                }
            }
        }
        return VoterInterface::ACCESS_DENIED;
    }
}