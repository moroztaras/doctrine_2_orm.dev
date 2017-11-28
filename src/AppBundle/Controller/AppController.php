<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\News;
use AppBundle\Entity\Category;
use AppBundle\Entity\Tags;
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
        $this->OneToMany();

        return $this->render("::base.html.twig");
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
