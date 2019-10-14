<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
class RevendeurController extends Controller {

    public function allAction()
    {
        $em = $this->getDoctrine()->getManager();
        $revendeurs= $em->getRepository('BackendBundle:Revendeurs')->findAll();
        $geojson =array("type" => "FeatureCollection",
            "features"=>array()
        );
        foreach($revendeurs as $revendeur ){
            //$point = new \GeoJson\Geometry\Point([floatval($revendeur->getLongitude()), floatval($revendeur->getLatitude())]);

            $propeties = array(
                "geometry" => array("type" => "Point" , "coordinates" => array(floatval($revendeur->getLongitude()), floatval($revendeur->getLatitude())) ),
                "type" => "Feature",
                "properties" => array(
                    "id" => $revendeur->getId(),
                    "title" => $revendeur->getNomBoutique(),
                    "rue" => $revendeur->getRue(),
                    "postal_code" => $revendeur->getPostalCode(),
                    "ville" => $revendeur->getVille(),
                    "telephone" => $revendeur->getTelephone(),
                    "pays" => $revendeur->getPays()
                ) 
            );            
            array_push($geojson["features"],$propeties);
        }
        
        return $this->json($geojson);
    }
    public function geolocAction(Request $request)
    {

        $json = $request->get("json",null);
        $params = json_decode($json);
        $latitude = floatval($params->latitude);
        $longitude = floatval($params->longitude);
        $em = $this->getDoctrine()->getManager();
 
        $rsm = new ResultSetMappingBuilder($em);
        $sql =  "SELECT * , DEGREES(acos(sin(RADIANS(".$latitude."))*sin(RADIANS(latitude)) + cos(RADIANS(".$latitude."))* cos(RADIANS(latitude)) * cos(RADIANS(longitude-".$longitude."))))*60*1.1515*1.609 as distancia "
            ."FROM revendeurs  "
            ."WHERE DEGREES(acos(sin(RADIANS(".$latitude."))*sin(RADIANS(latitude)) + cos(RADIANS(".$latitude."))* cos(RADIANS(latitude)) * cos(RADIANS(longitude-".$longitude."))))*60*1.1515*1.609<50 "
            ."ORDER BY distancia LIMIT 100"
                ;
        $query= $em->createNativeQuery($sql,$rsm);
        $rsm->addRootEntityFromClassMetadata('BackendBundle\Entity\Revendeurs', 'revendeurs');
        $revendeurs = $query->getResult();
        $geojson =array("type" => "FeatureCollection",
            "features"=>array()
        );
        foreach($revendeurs as $revendeur ){
            //$point = new \GeoJson\Geometry\Point([floatval($revendeur->getLongitude()), floatval($revendeur->getLatitude())]);

            $propeties = array(
                "geometry" => array("type" => "Point" , "coordinates" => array(floatval($revendeur->getLongitude()), floatval($revendeur->getLatitude())) ),
                "type" => "Feature",
                "properties" => array(
                    "id" => $revendeur->getId(),
                    "title" => $revendeur->getNomBoutique(),
                    "rue" => $revendeur->getRue(),
                    "postal_code" => $revendeur->getPostalCode(),
                    "ville" => $revendeur->getVille(),
                    "telephone" => $revendeur->getTelephone(),
                    "pays" => $revendeur->getPays(),
                    "distance" =>$this->distance($latitude,$longitude,$revendeur->getLatitude(),$revendeur->getLongitude(),'K')
                ) 
            );            
            array_push($geojson["features"],$propeties);
        }
        
        return $this->json($geojson);
    }
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
    public function json($data){
        $normalizers = array(new \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer);
        $encoders = array("json" => new \Symfony\Component\Serializer\Encoder\JsonEncoder());
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
        
        $json = $serializer->serialize($data,'json');
        
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->setContent($json);
        $response->headers->set("Content-Type","application/json");
        return $response;
    }
    public function geojson($revendeurs){
        $geojson =array("type" => "FeatureCollection",
            "features"=>array()
        );
        foreach($revendeurs as $revendeur ){
            //$point = new \GeoJson\Geometry\Point([floatval($revendeur->getLongitude()), floatval($revendeur->getLatitude())]);

            $propeties = array(
                "geometry" => array("type" => "Point" , "coordinates" => array(floatval($revendeur->getLongitude()), floatval($revendeur->getLatitude())) ),
                "type" => "Feature",
                "properties" => array(
                    "id" => $revendeur->getId(),
                    "title" => $revendeur->getNomBoutique(),
                    "rue" => $revendeur->getRue(),
                    "postal_code" => $revendeur->getPostalCode(),
                    "ville" => $revendeur->getVille(),
                    "telephone" => $revendeur->getTelephone(),
                    "pays" => $revendeur->getPays()
                ) 
            );            
            array_push($geojson["features"],$propeties);
        }
        return $geojson;
    }
}
