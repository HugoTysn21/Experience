<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PostFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @Assert\DateTime
     * @var string A "Y-m-d H:i:s" formatted value
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $post1 = new Post();
        $post1->setTitle('CDS');
        $post1->setCreatedBy('Hugo');
        $post1->setCreatedAt(new DateTime());
        $post1->setIntroduction('wesh');
        $post1->setIntroductionPost('attention CDS');
        $post1->setAvatarFileName('\Fnatic_2018_profileicon.png');
        $post1->setContent('PRESENTATION CDS');
        $post1->setContentTwo('ert CDS');
        $post1->setContentThree('cee CDS');
        $manager->persist($post1);

        $post2 = new Post();
        $post2->setTitle('CDS');
        $post2->setCreatedBy('ok');
        $post2->setCreatedAt(new DateTime());
        $post2->setIntroduction('wesh alors');
        $post2->setIntroductionPost('attention CDS');
        $post2->setAvatarFileName('\Fnatic_2018_profileicon.png');
        $post2->setContent('PRESENTATION CDS');
        $post2->setContentTwo('ert CDS');
        $post2->setContentThree('cee CDS');
        $manager->persist($post2);

        $user = new User();
        $user->setName('hugo');
        $user->setEmail('hugola1@hotmail.fr');
        $user->setPassword($this->encoder->encodePassword($user, 'lalala'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $user1 = new User();
        $user1->setName('lantillon');
        $user1->setEmail('hlantillon@gmail.com');
        $user1->setPassword($this->encoder->encodePassword($user1, 'lololo'));
        $user1->setRoles(['ROLE_ADMIN']);
        $manager->persist($user1);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
