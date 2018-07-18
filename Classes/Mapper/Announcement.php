<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Mapper;

use \RGU\Dvoconnector\Mapper\Generic;
use \RGU\Dvoconnector\Domain\Model\Association;
use \RGU\Dvoconnector\Domain\Model\Meta\Event\Type;
=======
namespace RG\Rgdvoconnector\Mapper;

use \RG\Rgdvoconnector\Mapper\Generic;
use \RG\Rgdvoconnector\Domain\Model\Association;
use \RG\Rgdvoconnector\Domain\Model\Meta\Event\Type;
>>>>>>> parent of 8432775... Change Namespace

class Announcement extends Generic {

  /**
	 * map attributName to property
	 *
	 * @param SimpleXMLElement xmlElement
	 * @param string attributName
	 *
	 * @return string
 	*/
	protected function mapAttributToProperty($xmlEntry, $attributName, $stackEntity) {

		switch ($xmlEntry->getName()) {
      case 'date';

				switch ($attributName) {
					case 'created';
						return 'createdDate';
		        break;
					default:
						return $attributName;
						break;
				}

        break;
			case 'image';

				switch ($attributName) {
					case 'src';
						return 'imageSource';
		        break;
					case 'title';
						return 'imageTitle';
		        break;
					default:
						return $attributName;
						break;
				}

        break;
			default:

				switch ($attributName) {
					case 'associationid';
						return 'id';
						break;
					default:
						return $attributName;
						break;
				}

		}

	}

  /**
	 * get Entity for attribut
	 *
	 * @param AbstractEntity entity
	 * @param SimpleXMLElement xmlElement
	 * @param string attributName
	 *
	 * @return AbstractEntity
 	*/
	protected function getEntityForAttribut($entity, $xmlEntry, $attributName, $stackEntity) {

    switch ($attributName) {
      case 'associationid';

        $association = $entity->getAssociation();

        if(!$association) {
          $association = new Association();
          $entity->setAssociation($association);
        }

        return $association;
        break;
			default:
				return $entity;
				break;
		}

	}

}
