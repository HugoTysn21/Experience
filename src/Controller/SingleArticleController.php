<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Parsedown;
use Symfony\Component\Routing\Annotation\Route;

class SingleArticleController extends AbstractController
{
    /**
     * @Route("/post/{post_id}", name="single_article")
     */
    public function index($post_id = null )
    {
        if (!$post_id) {
            return $this->redirectToRoute('article');
        }

        $parser = new Parsedown();

        $post = $this->getDoctrine()
            ->getRepository(Post::class)
            ->find($post_id);

        return $this->render('single_article/index.html.twig', [
            'controller_name' => 'SingleArticleController',
            'post'  =>  $post,
            'content'   => $parser->text($post->getContent())
        ]);
    }
}
