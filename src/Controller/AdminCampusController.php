<?php

namespace App\Controller;

use App\Repository\CampusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminCampusController extends AbstractController
{
    /**
     * Permet d'afficher la liste des campus
     * @Route("/admin/campus", name="admin_campus_index")
     * 
     * @return Response
     */
    public function index(CampusRepository $repo)
    {
        $camps = $repo->findAll();
        return $this->render('admin/campus/index.html.twig', [
            'camps' => $camps,
        ]);
    }
}
