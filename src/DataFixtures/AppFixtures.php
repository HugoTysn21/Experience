<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setEmail('hugola1@hotmail.fr');
        $user1->setName('hugo');
        $user1->setRoles(['ROLE_ADMIN']);
        $user1->setPassword($this->encoder->encodePassword($user1, 'jedeven2019'));
        $manager->persist($user1);

        $manager->flush();
    }
}
