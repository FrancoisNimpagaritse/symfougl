<?php

namespace App\Controller;

use App\Entity\Cursus;
use App\Form\CursusType;
use App\Repository\CursusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminCursusController extends AbstractController
{
    /**
     * @Route("/admin/cursus", name="admin_cursus_index")
     */
    public function index(CursusRepository $repo)
    {
        $cursus = $repo->findAll();
        return $this->render('admin/cursus/index.html.twig', [
            'cursus' => $cursus
        ]);
    }

    /**
     * Permet de créer un nouvel cursus
     * @Route("/admin/cursus/new", name="admin_cursus_create")
     *
     * @return Response
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $cursus = new Cursus();
        $form = $this->createForm(CursusType::class, $cursus);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($cursus);

            $manager->flush();

            $this->addFlash(
                'success',
                "Le cursus <strong>{$cursus->getName()}</strong> a bien été enregistré !"
            );

            return $this->redirectToRoute('admin_cursus_index');
        }

        return $this->render('admin/cursus/new.html.twig', [
                'form' => $form->createView()
        ]);
    }

    /**
     * Permet de modifier un cursus
     * @Route("/admin/cursus/edit/{id}", name="admin_cursus_edit")
     * 
     * @return Response
     */
    public function edit(Cursus $cursus, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(CursusType::class, $cursus);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($cursus);

            $manager->flush();

            $this->addFlash(
                'success',
                "Le cursus <strong>{$cursus->getName()}</strong> a bien été modifié !"
            );

            return $this->redirectToRoute('admin_cursus_index');
        }

        return $this->render('admin/cursus/edit.html.twig', [
            'form'  => $form->createView(),
            'cursus' => $cursus
        ]);
    }

    /**
     * Permet de supprimer un cursus
     * 
     * @Route("/admin/cursus/delete/{id}", name="admin_cursus_delete")
     * 
     * @return Response
     */
    public function delete(Cursus $cursus, EntityManagerInterface $manager)
    {
        if(count($cursus->getRegistrations()) > 0) {
            $this->addFlash(
                'danger',
                "Attention ! Vous ne pouvez pas supprimer le cursus <strong>{$cursus->getName()}</strong> car il possède déjà des inscriptions !!!"
            );
        } else {

            $manager->remove($cursus);
    
            $manager->flush();
    
            $this->addFlash(
                'success',
                "Le cursus <strong>{$cursus->getName()}</strong> a bien été supprimé !"
            );
        }

        return $this->redirectToRoute("admin_cursus_index");
    }
}
