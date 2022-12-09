<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


//#[IsGranted('ROLE_ADMIN')]
class AdminReservationController extends AbstractController
{
    #[Route('/admin/reservation', name: 'admin_reservation_list')]
    public function reservationList(ReservationRepository $reservationRepository): Response
    {   
        $reservation = $reservationRepository->findAll();

        return $this->render('admin_reservation/index.html.twig', [
            'reservation' => $reservation,
        ]);
    }
    //delete reservation of my database
    #[Route('/admin/reservation/{id}/delete', name: 'admin_reservation_delete')]
    public function reservationDelete($id, ReservationRepository $reservationRepository, EntityManagerInterface $entityManager): Response
    {   
        $reservation = $reservationRepository->find($id);
        $entityManager->remove($reservation);
        //on tire la chasse avec flush
        $entityManager->flush();

        return $this->redirectToRoute('admin_reservation_list');
    }
    //create allergy on database with form
    #[Route('/admin/reservation/create', name: 'admin_reservation_create')]
    public function reservationCreate(Request $request, EntityManagerInterface $entityManager): Response
    {   
        $reservation = new Reservation();
        $reservationForm = $this->createForm(ReservationType::class, $reservation);
        $reservationForm->handleRequest($request);
        if($reservationForm->isSubmitted()&& $reservationForm->isValid()){
            $entityManager->persist($reservation);
            $entityManager->flush();
        }

        
       

        return $this->render('/admin_reservation/reservation_create.html.twig', [
            'reservationForm' => $reservationForm->createView(),
        ]);
    }
    #[Route('/admin/reservation/{id}/update', name: 'admin_allergy_update')]
    public function reservationUpdate($id, ReservationRepository $reservationRepository, Request $request, EntityManagerInterface $entityManager): Response
    {   
        $reservation = $reservationRepository->find($id);
        
        $reservationForm = $this->createForm(ReservationType::class, $reservation);
        $reservationForm->handleRequest($request);
        if($reservationForm->isSubmitted()&& $reservationForm->isValid()){
            $entityManager->persist($reservation);
            $entityManager->flush();
        }

        
       

        return $this->render('/admin_reservation/reservation_create.html.twig', [
            'reservationForm' => $reservationForm->createView(),
        ]);
    }

}
