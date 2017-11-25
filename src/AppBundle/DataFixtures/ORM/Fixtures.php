<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Article;
use AppBundle\Entity\News;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $article1 = new Article();
        $article1->setTitle("My first article");

        $article2 = new Article();
        $article2->setTitle("My second article");

        $news1 = new News();
        $news1->setTitle("My first news");

        $manager->persist($article1);
        $manager->persist($article2);
        $manager->persist($news1);

        $manager->flush();
    }
}
