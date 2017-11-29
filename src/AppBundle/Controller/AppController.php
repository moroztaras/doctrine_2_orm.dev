<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\News;
use AppBundle\Entity\Category;
use AppBundle\Entity\Roles;
use AppBundle\Entity\Tags;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AppController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
#        $this->OneToOne();
#        $this->OneToMany();
#        $this->ManyToOne();
        $this->ManyToMany();

        return $this->render("::base.html.twig");
    }

    private function ManyToMany()
    {
        $em = $this->getDoctrine();
        $repoUser = $em->getRepository(User::class);
        $repoRoles = $em->getRepository(Roles::class);
        /*
         * @var $user1 User
         */
        $user1 = $repoUser->find(1);
        $roles = $user1->getRoles();
#        var_dump($roles->toArray());

        $role = $repoRoles->find(1);
        $users = $role->getUsers();
        var_dump($users->toArray());
    }

    private function ManyToOne()
    {
        $em = $this->getDoctrine();
        $repoUser = $em->getRepository(User::class);
        /*
         * @var $user1 User
         */
        $user1 = $repoUser->find(1);
        var_dump("my friend");
        var_dump($user1->getFriends());
        var_dump("friend children");
#        var_dump($user1->getFriendChildren()->toArray());
    }
    private function OneToOne()
    {
#        $em = $this->getDoctrine();
#        $repoArticle = $em->getRepository(Article::class);
#        $article = $repoArticle->find(16);
#        var_dump($article->getParent()->getTitle());
#        var_dump($article->getCategory()->getName());

#        $repoCategory = $em->getRepository(Category::class);
#        $category = $repoCategory->find(7);
#        var_dump($category);

#        $repoNews = $em->getRepository(News::class);
#        $news = $repoNews->find(5);
#        var_dump($news);
    }
    private function OneToMany()
    {
        $em = $this->getDoctrine();
        $repoArticle = $em->getRepository(Article::class);
        $repoTags = $em->getRepository(Tags::class);

        $article = $repoArticle->find(20);
        $tag = $repoTags->find(12);


        var_dump($article->getTags()->toArray());
#        var_dump($tag->getArticle()->getTitle());
    }
}
