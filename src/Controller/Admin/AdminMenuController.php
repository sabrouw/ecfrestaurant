<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Form\MenuType;
use App\Repository\MenuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


//#[IsGranted('ROLE_ADMIN')]
class AdminMenuController extends AbstractController
{
    
    #[Route('/admin/menu', name: 'admin_menu_list')]
    public function menuList(MenuRepository $menuRepository): Response
    {   
        $menu = $menuRepository->findAll();

        return $this->render('admin_menu/index.html.twig', [
            'menu' => $menu,
        ]);
    }
    //delete menu of my database
    #[Route('/admin/menu/{id}/delete', name: 'admin_menu_delete')]
    public function menuDelete($id,MenuRepository $menuRepository, EntityManagerInterface $entityManager): Response
    {   
        $menu = $menuRepository->find($id);
        $entityManager->remove($menu);
        //on tire la chasse avec flush
        $entityManager->flush();

        return $this->redirectToRoute('admin_menu_list');
    }
    //create menu on database with form
    #[Route('/admin/menu/create', name: 'admin_menu_create')]
    public function menuCreate(Request $request, EntityManagerInterface $entityManager): Response
    {   
        $menu = new Menu();
        $menuForm = $this->createForm(MenuType::class, $menu);
        $menuForm->handleRequest($request);
        if($menuForm->isSubmitted()&& $menuForm->isValid()){
            $entityManager->persist($menu);
            $entityManager->flush();
        }

        return $this->render('/admin_menu/menu_create.html.twig', [
            'menuForm' => $menuForm->createView(),
        ]);
    }
    #[Route('/admin/menu/{id}/update', name: 'admin_menu_update')]
    public function menuUpdate($id, MenuRepository $menuRepository, Request $request, EntityManagerInterface $entityManager): Response
    {   
        $menu = $menuRepository->find($id);
        
        $menuForm = $this->createForm(MenuType::class, $menu);
        $menuForm->handleRequest($request);
        if($menuForm->isSubmitted()&& $menuForm->isValid()){
            $entityManager->persist($menu);
            $entityManager->flush();
        }
        return $this->render('/admin_menu/menu_create.html.twig', [
            'menuForm' => $menuForm->createView(),
        ]);
    }


}
