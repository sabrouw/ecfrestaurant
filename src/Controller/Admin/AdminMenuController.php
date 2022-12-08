<?php

namespace App\Controller\Admin;

use App\Repository\MenuRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[IsGranted('ROLE_ADMIN')]
class AdminMenuController extends AbstractController
{
    #[Route('/admin/menu', name: 'admin_menu')]
    public function Menu(MenuRepository $menuRepository): Response
    {   
        $menu = $menuRepository->findAll();
        return $this->render('admin_menu/index.html.twig', [
            'menu' => $menu,
        ]);
    }
}
