<?php

namespace App\Controller\Admin;

use App\Repository\DishRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_ADMIN')]
class AdminDishController extends AbstractController
{
    #[Route('/admin/dish', name: 'admin_dish')]
    public function dish(DishRepository $dishRepository): Response
    {

        $dish = $dishRepository->findAll();
        return $this->render('admin_dish/index.html.twig', [
            'dish' => $dish,
        ]);
    }
}
