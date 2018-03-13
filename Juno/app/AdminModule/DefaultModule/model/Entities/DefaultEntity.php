<?php

namespace DefaultModule\Entities;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;
use Kdyby\Doctrine\Entities\MagicAccessors;
use Latte\Runtime\Filters;
use Nette;
use ProjectModule\Classes\DefaultValues;
use ReflectionClass;
use ReflectionProperty;

class DefaultEntity extends Nette\Object {

    use MagicAccessors;

    public function getTrProp($name) {
        
        $property = $this->__get($name);
        $truncatedProperty = Filters::truncate($property, DefaultValues::$TRUNCATE_MAX_SIZE);
        
        return $truncatedProperty;
    }
    
    /**
     * Converts this entity into array
     * @return array
     */
    public function toArray($unwantedKeys = [], $defaultDateFormat = "d.m.Y") {
        
        /**
         * This will be entity as array
         */
        $objectArray = [];
        foreach ($this as $property => $propertyValue) {
            // if it is unwanted key we do nothing
            if (!in_array($property, $unwantedKeys)) {
                //if it is object, we have to work with that little bit more
                if (is_object($propertyValue)) {

    //                // we create reflection of property object
                    $reflection = new ReflectionClass($propertyValue);
                    $currentObjectArray = [];
                    //if it is PersistenCollection ..
                    if ($propertyValue instanceof PersistentCollection) {
    //                    
                        foreach ($propertyValue->getValues() as $entity) {
                            $protectedProperties = $entity->getReflection()->getProperties(ReflectionProperty::IS_PROTECTED);
                            $entityValues = [];

                            foreach ($protectedProperties as $protectedProperty) {
                                $entityValues[$protectedProperty->getName()] = $entity->__get($protectedProperty->getName());
                            }
                            $currentObjectArray[] = $entityValues;
                        }
    //                    
    //                // if it is datetime
                    } elseif ($propertyValue instanceof DateTime) {
                        $currentObjectArray = $propertyValue->format($defaultDateFormat);

                    // if it is kdyby generated proxy entity
                    } else {
                        $protectedProperties = $reflection->getProperties(ReflectionProperty::IS_PROTECTED);
                        if ($propertyValue->id == 0) {
                            $currentObjectArray = [];
                            continue;
                        }

                        foreach ($protectedProperties as $protectedProperty) {                        
                            $currentObjectArray[$protectedProperty->getName()] = $propertyValue->__get($protectedProperty->getName());
                        }


                    }
                    $objectArray[$property] = $currentObjectArray;
                // if it is not object, we copy the string
                } else {

                    if (!is_null($propertyValue)) {
                        $objectArray[$property] = $propertyValue;
                    }
                }
            }
        }
        return $objectArray;
        
    }
    
    /**
     * I DONT THINK THIS WORKS
     * @param type $data
     * @return \DefaultEntity
     */
    public function hydrateMe($data) {
        
        foreach ($this as $propertyName => $propertyValue) {
            
            if ($propertyValue instanceof PersistentCollection) {
//                dump($propertyName);
//                $propertyValue->clear();
//                
//                $arrayCollection = new Doctrine\Common\Collections\ArrayCollection();
//                foreach ($data[$propertyName] as $arrayValue) {
//                    dump($arrayValue);
//                    $arrayCollection->add(new \App\Entities\E_mail);
//                }
//                dump($arrayCollection);
//                die();
//                $this->__set($propertyName, $arrayCollection);
                $this->__set($propertyName, new ArrayCollection($propertyValue->getValues()));
            }
            
        }
        
        
        return $this;        
    }
    
}
