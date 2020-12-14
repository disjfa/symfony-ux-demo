<?php

namespace App\Controller;

use App\Entity\FierceChef;
use App\Form\FierceChefType;
use App\Repository\FierceChefRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fierce/chef")
 */
class FierceChefController extends AbstractController
{
    /**
     * @Route("/", name="fierce_chef_index", methods={"GET"})
     */
    public function index(FierceChefRepository $fierceChefRepository): Response
    {
        return $this->render('fierce_chef/index.html.twig', [
            'fierce_chefs' => $fierceChefRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fierce_chef_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fierceChef = new FierceChef();
        $form = $this->createForm(FierceChefType::class, $fierceChef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fierceChef);
            $entityManager->flush();

            return $this->redirectToRoute('fierce_chef_index');
        }

        return $this->render('fierce_chef/new.html.twig', [
            'fierce_chef' => $fierceChef,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fierce_chef_show", methods={"GET"})
     */
    public function show(FierceChef $fierceChef): Response
    {
        return $this->render('fierce_chef/show.html.twig', [
            'fierce_chef' => $fierceChef,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fierce_chef_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FierceChef $fierceChef): Response
    {
        $form = $this->createForm(FierceChefType::class, $fierceChef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fierce_chef_index');
        }

        return $this->render('fierce_chef/edit.html.twig', [
            'fierce_chef' => $fierceChef,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fierce_chef_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FierceChef $fierceChef): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fierceChef->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fierceChef);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fierce_chef_index');
    }
}
