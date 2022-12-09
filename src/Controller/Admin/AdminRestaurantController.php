<?php

namespace App\Controller\Admin;

use App\Entity\Restaurant;
use App\Form\RestaurantType;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


//#[IsGranted('ROLE_ADMIN')]
class AdminRestaurantController extends AbstractController
{
    #[Route('/admin/restaurant', name: 'admin_restaurant_list')]
    public function restaurantList(RestaurantRepository $restaurantRepository): Response
    {   
        $restaurant = $restaurantRepository->findAll();

        return $this->render('admin_restaurant/index.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }
    //delete restaurant of my database
    #[Route('/admin/restaurant/{id}/delete', name: 'admin_restaurant_delete')]
    public function restaurantDelete($id,RestaurantRepository $restaurantRepository, EntityManagerInterface $entityManager): Response
    {   
        $restaurant = $restaurantRepository->find($id);
        $entityManager->remove($restaurant);
        //on tire la chasse avec flush
        $entityManager->flush();

        return $this->redirectToRoute('admin_restaurant_list');
    }
    //create Restaurant on database with form
    #[Route('/admin/restaurant/create', name: 'admin_restaurant_create')]
    public function restaurantCreate(Request $request, EntityManagerInterface $entityManager): Response
    {   
        $restaurant = new Restaurant();
        $restaurantForm = $this->createForm(RestaurantType::class, $restaurant);
        $restaurantForm->handleRequest($request);
        if($restaurantForm->isSubmitted()&& $restaurantForm->isValid()){
            $entityManager->persist($restaurant);
            $entityManager->flush();
        }

        return $this->render('/admin_restaurant/restaurant_create.html.twig', [
            'restaurantForm' => $restaurantForm->createView(),
        ]);
    }
    #[Route('/admin/restaurant/{id}/update', name: 'admin_restaurant_update')]
    public function restaurantUpdate($id, RestaurantRepository $restaurantRepository, Request $request, EntityManagerInterface $entityManager): Response
    {   
        $restaurant = $restaurantRepository->find($id);
        
        $restaurantForm = $this->createForm(RestaurantType::class, $restaurant);
        $restaurantForm->handleRequest($request);
        if($restaurantForm->isSubmitted()&& $restaurantForm->isValid()){
            $entityManager->persist($restaurant);
            $entityManager->flush();
        }
        return $this->render('/admin_restaurant/restaurant_create.html.twig', [
            'restaurantForm' => $restaurantForm->createView(),
        ]);
    }


}
