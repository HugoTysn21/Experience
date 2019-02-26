<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\Post3Type;
use App\Repository\PostRepository;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/admin/post")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="post_index", methods="GET")
     */
    public function index(PostRepository $postRepository): Response
    {
        return $this->render('post/index.html.twig', ['posts' => $postRepository->findAll()]);
    }


    /**
     * @Route("/new", name="post_new", methods="GET|POST")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request): Response
    {
        $post = new Post();
        $form = $this->createFormBuilder($post)
            ->add('title', TextType::class)
            ->add('introduction', TextType::class)
            ->add('introductionPost', TextType::class)
            ->add('content', TextType::class)
            ->add('contentTwo', TextType::class)
            ->add('contentThree', TextType::class)
            ->add('contentFour', TextType::class)
            ->add('avatar', FileType::class, array('label' => 'File'))
            ->add('createdBy',TextType::class)
            ->add('createdAt', DateTimeType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

            /*
             // permet d'encrypter les password pour la bdd
            $plainPassword = $post->getPassword();
            $encryptedPassword = $encoder->encodePassword($post, $plainPassword);
            $post->setPassword($encryptedPassword);
            */

        //fichier recuperer via form
            $avatarFile = $post->getAvatar();
            $em= $this->getDoctrine()->getManager();

        //nom du fichier qui sera mis dans la bdd
            $post->setAvatarFileName(md5(uniqid()).'.'.$avatarFile->guessExtension());
            $em->persist($post);

            $avatarFile->move(
                $this->getParameter('file_directory'),
                $post->getAvatarFileName()
            );

            $em->flush();

            return $this->redirectToRoute('post_index');
        }

        return $this->render('post/new.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="post_show", methods="GET")
     */
    public function show(Post $post): Response
    {
        return $this->render('post/show.html.twig', ['post' => $post]);
    }

    /**
     * @Route("/{id}/edit", name="post_edit", methods="GET|POST")
     */
    public function edit(Request $request, Post $post): Response
    {
        $form = $this->createForm(Post3Type::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('post_edit', ['id' => $post->getId()]);
        }

        return $this->render('post/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="post_delete", methods="DELETE")
     */
    public function delete(Request $request, Post $post): Response
    {
        if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
        }

        return $this->redirectToRoute('post_index');
    }
}
