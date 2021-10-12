<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Promo;
use App\Entity\Truc;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    /**
     * @return Response
     *
     * @Route "/demo"
     */
    #[Route(path: "/demo")]
    public function demo()
    {
        return new Response('Réponse');
    }

    /**
     * @return Response
     *
     * @Route "/demo2"
     */
    #[Route(path: "/demo2")]
    public function demo2()
    {
        return new Response('Réponse2');
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @return Response
     *
     * @Route "/test"
     */
    #[Route(path: "/test")]
    public function test(EntityManagerInterface $entityManager)
    {
        $promo = new Promo('M3');
        $entityManager->persist($promo);
        $promo->setIntitule('ancien M2');
        $entityManager->flush();

        $promo = $entityManager->getRepository(Promo::class)->findOneBy(['intitule' => 'M2']);
        $this->createEtudiant($entityManager, 'Julie', $promo);
        $this->removeEtudiantByName($entityManager, 'Julie');

        $entityManager->flush();
        $listeEtudiants = $entityManager->getRepository(Etudiant::class)->findAll();
        dump($listeEtudiants);
        $listePromos = $entityManager->getRepository(Promo::class)->findAll();
        dump($listePromos);
        return new Response('Réponse test');
    }

    #[Route(path: "/etudiant/{id}", methods: ['GET'])]
    public function etudiantGet(EntityManagerInterface $entityManager, int $id)
    {
        $etu = $entityManager->getRepository(Etudiant::class)->find($id);
        return $this->render("test.json.twig", ['etudiant' => $etu]);
    }

    #[Route(path: "/etudiant/{id}", methods: ['DELETE'])]
    public function etudiantDelete(EntityManagerInterface $entityManager, int $id)
    {
        $etu = $entityManager->getRepository(Etudiant::class)->find($id);
        $entityManager->remove($etu);
        $entityManager->flush();
        return new Response('Etudiant supprimé');
    }

    #[Route(path: "/etudiant/{id}", methods: ['PUT'])]
    public function etudiantPut(Request $request, EntityManagerInterface $entityManager, int $id)
    {
        $data = json_decode($request->getContent());

        $etu = $entityManager->getRepository(Etudiant::class)->find($id);
        $etu->setNom($data->nom);
        $etu->setPromo($data->promo);
        $entityManager->flush();
        return new Response('Etudiant modifié');
    }

    #[Route(path: "/etudiants", methods: ['POST'])]
    public function etudiantPost(Request $request, EntityManagerInterface $entityManager, int $id)
    {
        $data = json_decode($request->getContent());
        $etu = new Etudiant($data->nom, $data->promo);
        $entityManager->persist($etu);
        $entityManager->flush();
        return new Response('Etudiant créé');
    }

    #[Route(path: "/etudiants")]
    public function tutu(EntityManagerInterface $entityManager)
    {
        $promo = $entityManager->getRepository(Promo::class)->findOneBy(['intitule' => 'M2']);
        $this->createEtudiant($entityManager, 'Julie', $promo);
        $listeEtu = $entityManager->getRepository(Etudiant::class)->findAll();
        return $this->render("test3.json.twig", ['liste' => $listeEtu]);
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @param Promo $promo
     * @param string $nom
     */
    public function createEtudiant(EntityManagerInterface $entityManager, string $nom, Promo $promo): void
    {
        $etudiant = new Etudiant($nom, $promo);
        $entityManager->persist($etudiant);
        $entityManager->flush();
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @param string $nom
     */
    public function removeEtudiantByName(EntityManagerInterface $entityManager, string $nom): void
    {
        $etudiant = $entityManager->getRepository(Etudiant::class)->findOneBy(['nom' => $nom]);
        $entityManager->remove($etudiant);
        $entityManager->flush();
    }


}