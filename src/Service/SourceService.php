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

class SourceService
{

    public function newSource($libelle, $work, EntityManagerInterface $em): Source
    {

        $source = new Source();
        $source->setLibelle($libelle);
        $source->setWork($work);
        $em->persist($source);
        $em->flush();
        return $source;
    }




}