<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 17/01/2020
 * Time: 13:17
 */

namespace App\Service;


use App\Entity\Source;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SourceService
{

    ///////////////////
    ///  Add source ////
    /// ////////////////

    public function newSource($libelle, $work, EntityManagerInterface $em): Source
    {

        $source = new Source();
        $source->setLibelle($libelle);
        $source->setWork($work);
        $em->persist($source);
        $em->flush();
        return $source;
    }


    /////////////////////////
    ///  get all sources ////
    /////////////////////////

    public function AllSource(EntityManagerInterface $em, SerializerInterface $serializer )
    {

        $sources = $em->getRepository(Source::class)->findAll();


        $json = $serializer->serialize(
            $sources,
            'json'
        );



        return $json;


    }

    ///////////////////////////
    ///  get sources by id ////
    ///////////////////////////

    public function SourceById(EntityManagerInterface $em, SerializerInterface $serializer,$idSource)
    {

        $sources = $em->getRepository(Source::class)->find($idSource);


        $json = $serializer->serialize(
            $sources,
            'json'
        );

        return $json;
    }



    ///////////////////////////
    ///    Update source   ////
    ///////////////////////////

    public function UpdateSource($libelle, $work,EntityManagerInterface $em,$idSource, Request $request)
    {

        $libelle = $request->get('libelle');
        $work = $request->get('work');

        $source = $em->getRepository(Source::class)->find($idSource);


        $source->setLibelle($libelle);
        $source->setWork($work);
        $em->persist($source);
        $em->flush();




        return $source;
    }


    ///////////////////////
    ///  delete source ////
    /// ///////////////////

    public function DeleteSource(EntityManagerInterface $em, $idSource)
    {

        $source = $em->getRepository(Source::class)->find($idSource);


        $em->remove($source);
        $em->flush();

        return $source;
    }








}