<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\Image2Type;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/image")
 */
class ImageController extends AbstractController
{
    /**
     * @Route("/", name="image_index", methods="GET")
     */
    public function index(ImageRepository $imageRepository): Response
    {
        return $this->render('image/index.html.twig', ['images' => $imageRepository->findAll()]);
    }

    /**
     * @Route("/new", name="image_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $image = new Image();
        $form = $this->createForm(Image2Type::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $fileDirectory = $this->uploadAvatar($image);

            if (!is_null($fileDirectory)) {
                $image->setContent( $fileDirectory );
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();

            return $this->redirectToRoute('image_index');
        }

        return $this->render('image/new.html.twig', [
            'image' => $image,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="image_show", methods="GET")
     */
    public function show(Image $image): Response
    {
        return $this->render('image/show.html.twig', ['image' => $image]);
    }

    /**
     * @Route("/{id}/edit", name="image_edit", methods="GET|POST")
     */
    public function edit(Request $request, Image $image): Response
    {
        $form = $this->createForm(Image2Type::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('image_edit', ['id' => $image->getId()]);
        }

        return $this->render('image/edit.html.twig', [
            'image' => $image,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="image_delete", methods="DELETE")
     */
    public function delete(Request $request, Image $image): Response
    {
        if ($this->isCsrfTokenValid('delete'.$image->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush();
        }

        return $this->redirectToRoute('image_index');
    }

    private function uploadAvatar(Image $image) {
        $file = $image->getAvatar();

        if (is_null($file)) {
            return null;
        }

        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        try {
            $file->move(
                $this->getParameter('file_directory'),
                $fileName
            );
            return '/uploads/'.$fileName;
        } catch (FileException $e) {
            dump($e);
            return null;
        }
    }
}