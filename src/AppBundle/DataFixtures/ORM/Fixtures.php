<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Address;
use AppBundle\Entity\Article;
use AppBundle\Entity\Category;
use AppBundle\Entity\News;
use AppBundle\Entity\Roles;
use AppBundle\Entity\Tags;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
#        $this->exemOneToOne($manager);
#        $this->exemManyToOne($manager);
#        $this->exemOneToMany($manager);
#        $this->exemManyToOneSelf($manager);
        $this->exemManyToMany($manager);
    }

    private function exemManyToMany(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setFullname("Мороз Тарас");

        $user2 = new User();
        $user2->setFullname("Мороз Катя");

        $user3 = new User();
        $user3->setFullname("Мороз Рома");

        $role1 = new Roles();
        $role1->setRole("ROLE_USER");

        $role2 = new Roles();
        $role2->setRole("ROLE_ADMIN");

        $user1->addRole($role1);
        $user1->addRole($role2);
        $user2->addRole($role1);
        $user3->addRole($role2);

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);

        $manager->flush();
    }

    private function exemManyToOneSelf(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setFullname("Мороз Тарас");

        $user2 = new User();
        $user2->setFullname("Мороз Катя");

        $user3 = new User();
        $user3->setFullname("Мороз Рома");

        #freands
        $user1->setFriends($user2);
        $user2->setFriends($user1);
        $user3->setFriends($user1);

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);

        $manager->flush();
    }
    private function exemOneToMany(ObjectManager $manager)
    {
        $article1 = new Article();
        $article1->setTitle("My first article");
        $manager->persist($article1);

        $article2 = new Article();
        $article2->setTitle("My second article");
        $manager->persist($article2);

        $tags1 = new Tags();
        $tags1->setName("Tag 1");
#        $tags1->setArticle($article1);
        $manager->persist($tags1);

        $tags2 = new Tags();
        $tags2->setName("Tag 2");
#        $tags2->setArticle($article2);
        $manager->persist($tags2);

       $article1->addTag($tags1);
       $article2->addTag($tags2);

        $manager->flush();
    }
    private function exemOneToOne(ObjectManager $manager)
    {
        $article1 = new Article();
        $article1->setTitle("My first article");

        $article2 = new Article();
        $article2->setTitle("My second article");

        $news1 = new News();
        $news1->setTitle("My first news");

        $category1 = new Category();
        $category1->setName("Caterory1");

        $category2 = new Category();
        $category2->setName("Caterory2");

        $article1->setCategory($category1);
        $article2->setCategory($category2);
        $article2->setPatent($article1);

        $news1->setCategory($category1);

        $manager->persist($article1);
        $manager->persist($article2);
        $manager->persist($news1);
        $manager->persist($category1);
        $manager->persist($category2);

        $manager->flush();
    }

    private function exemManyToOne(ObjectManager $manager)
    {
        $address = new Address();
        $address->setAddress("Україна, Черкаси, вул. Гагаріна");

        $user1 = new User();
        $user1->setFullname("Мороз Тарас");
        $user1->setAddress($address);

        $user2 = new User();
        $user2->setFullname("Мороз Катя");
        $user2->setAddress($address);

        $manager->persist($address);
        $manager->persist($user1);
        $manager->persist($user2);
        
        $manager->flush();
    }
}
