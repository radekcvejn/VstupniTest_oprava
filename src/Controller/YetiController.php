<?php

namespace App\Controller;

use App\Entity\Yeti;
use App\Entity\YetiRating;
use App\Form\YetiType;
use App\Form\YetiRatingType;

use App\Repository\YetiRatingRepository;
use App\Repository\YetiRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class YetiController extends AbstractController
{

    public function seznam(ManagerRegistry $doctrine): Response
    {
        $yetis = $doctrine -> getRepository(Yeti::class) -> findAll();

        return $this -> render('seznam.html.twig',
        [
            'yetis' => $yetis,
        ]);
    }

    public function pridat(Request $request, ManagerRegistry $doctrine)
    {
        $yeti = new Yeti();
        $form = $this -> createForm(YetiType::class, $yeti);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid())
        {
            $em = $doctrine -> getManager();
            $em -> persist($yeti);
            $em -> flush();
            return $this ->redirectToRoute('yeti_seznam');
        }

        return  $this -> render('new.html.twig',
        [
            'yeti' => $yeti,
            'form' => $form -> createView(),
        ]);
    }

    public function zobrazNahodneho(Request $request,ManagerRegistry $doctrine): Response
    {
        //zobrazeni yetiho nahodne - zjistit pocet v db a nasledne přes rand(1, pocet) ziskat cislo a nasledne cislo pouzit v dotazu

        $repository = $doctrine -> getRepository(Yeti::class);
        $yetisInTotal = count($repository -> findAll());
        $nahodnePoradi = rand(1, $yetisInTotal);
        $nahodnyYeti = $repository ->find($nahodnePoradi);

        return $this -> render('random.html.twig',
        [
            'nahodnyYeti' => $nahodnyYeti,
        ]);
    }

    public function rateYeti(Request $request, EntityManagerInterface $entityManager)
    {
        $yetiId = $request->get('yeti_id');
        $yeti = $entityManager->getRepository(Yeti::class)->findOneBy(['id' => $yetiId]);


        $rating = new YetiRating();
        $rating->setYeti($yeti);
        $rating->setRatedAt(new \DateTime());

        $form = $this->createForm(YetiRatingType::class, $rating);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($rating);
            $entityManager->flush();

            return $this->redirectToRoute('yeti_nahodny');
        }
        return $this->render('rate.html.twig', [
            'yeti_id' => $yeti,
            'form' => $form->createView(),
        ]);
    }





    public function index(YetiRepository $yetiRepository)
    {
        $topYetis = $yetiRepository -> findTopRatedYetis();

        return $this -> render('index.html.twig',
        [
            'yetis' => $topYetis,
        ]);
    }

    public function statistikyHodnoceni(ManagerRegistry $doctrine)
    {
        $yetiHodnoceni = $doctrine ->getRepository(YetiRating::class) -> findAll();

        $hodnoceniDen = [];
        foreach ($yetiHodnoceni as $rating)
        {
            $date = $rating -> getRatedAt() -> format('Y-m-d');

            if(!isset($hodnoceniDen[$date]))
            {
                $hodnoceniDen[$date] = [
                    'date' => $date,
                    'ratingSum' => 0,
                    'ratingCount' => 0,

                ];
            }
            $hodnoceniDen[$date]['ratingSum'] += $rating -> getValue();
            $hodnoceniDen[$date]['ratingCount']++;
        }
        $statistics=[];

            foreach ($hodnoceniDen as $dateData)
            {
                $prumerneHodnoceni = $dateData['ratingSum'] / $dateData['ratingCount'];
                $statistics[] = [

                    'date' => $dateData['date'],
                    'averageRating' => $prumerneHodnoceni,
                ];
    }
            return $this->render('statistics.html.twig',
            [
               'statistics' => $statistics,
            ]);

}



}
