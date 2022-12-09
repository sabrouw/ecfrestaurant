<?php

namespace App\Controller\Admin;

use App\Entity\Dish;
use App\Form\DishType;
use App\Repository\DishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//#[IsGranted('ROLE_ADMIN')]
class AdminDishController extends AbstractController
{
    #[Route('/admin/dish', name: 'admin_dish_list')]
    public function dishList(DishRepository $dishRepository): Response
    {   
        $dish = $dishRepository->findAll();

        return $this->render('admin_dish/index.html.twig', [
            'dish' => $dish,
        ]);
    }
    //delete dish of my database
    #[Route('/admin/dish/{id}/delete', name: 'admin_dish_delete')]
    public function dishDelete($id, DishRepository $dishRepository, EntityManagerInterface $entityManager): Response
    {   
        $dish = $dishRepository->find($id);
        $entityManager->remove($dish);
        //on tire la chasse avec flush
        $entityManager->flush();

        return $this->redirectToRoute('admin_dish_list');
    }
    //create allergy on database with form
    #[Route('/admin/dish/create', name: 'admin_dish_create')]
    public function dishCreate(Request $request, EntityManagerInterface $entityManager): Response
    {   
        $dish = new Dish();
        $dishForm = $this->createForm(DishType::class, $dish);
        $dishForm->handleRequest($request);
        if($dishForm->isSubmitted()&& $dishForm->isValid()){
            $entityManager->persist($dish);
            $entityManager->flush();
        }

        
       

        return $this->render('/admin_dish/dish_create.html.twig', [
            'dishForm' => $dishForm->createView(),
        ]);
    }
    #[Route('/admin/dish/{id}/update', name: 'admin_allergy_update')]
    public function dishUpdate($id, DishRepository $dishRepository, Request $request, EntityManagerInterface $entityManager): Response
    {   
        $dish = $dishRepository->find($id);
        
        $dishForm = $this->createForm(DishType::class, $dish);
        $dishForm->handleRequest($request);
        if($dishForm->isSubmitted()&& $dishForm->isValid()){
            $entityManager->persist($dish);
            $entityManager->flush();
        }

        
       

        return $this->render('/admin_dish/dish_create.html.twig', [
            'dishForm' => $dishForm->createView(),
        ]);
    }


}
