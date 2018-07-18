<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use RGU\Dvoconnector\Domain\Filter\AssociationFilter;
use RGU\Dvoconnector\Domain\Filter\FunctionaryFilter;
=======
namespace RG\Rgdvoconnector\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use RG\Rgdvoconnector\Domain\Filter\AssociationFilter;
use RG\Rgdvoconnector\Domain\Filter\FunctionaryFilter;
>>>>>>> parent of 8432775... Change Namespace

class FunctionaryViewHelper extends AbstractDvoContextApiViewHelper {

  /**
   * @var string
   */
  const ARGUMENT_ASSOCIATIONID = 'associationID';

  /**
   * @var string
   */
  const ARGUMENT_EVENTID = 'functionaryID';

  /**
   * @var string
   */
  const ARGUMENT_AS = 'as';

  /**
   * @var string
   */
  const ARGUMENT_DEFAULT_AS = 'functionary';

  /**
   * functionaryRepository
<<<<<<< HEAD
   * @var \RGU\Dvoconnector\Domain\Repository\FunctionaryRepository
=======
   * @var \RG\Rgdvoconnector\Domain\Repository\FunctionaryRepository
>>>>>>> parent of 8432775... Change Namespace
   * @inject
   */
  protected $functionaryRepository;

  /**
   * @return void
   */
  public function initializeArguments() {

      parent::initializeArguments();
      $this->registerArgument(self::ARGUMENT_ASSOCIATIONID, 'string', 'The id of the association of the functionary', false);
      $this->registerArgument(self::ARGUMENT_EVENTID, 'string', 'The id of the functionary', true);
      $this->registerArgument(self::ARGUMENT_AS, 'string', 'The name of the functionary variable', false, self::ARGUMENT_DEFAULT_AS);

  }


  /**
   * Renders the view
   *
   * @return string The rendered view
   */
  public function render() {

    $associationID = $this->arguments[self::ARGUMENT_ASSOCIATIONID];
    $functionaryID = $this->arguments[self::ARGUMENT_EVENTID];

    $associationFilter = $this->getDefaultAssociationFilter();
    $functionaryFilter = $this->getDefaultFunctionaryFilter();

    if(empty($associationID)) {

      $functionary = $this->functionaryRepository->findByID($association, $functionaryID, $functionaryFilter);

    } else {

      $association = $this->associationRepository->findByID($associationID, $associationFilter);

      $functionary = $this->functionaryRepository->findByAssociationAndID($association, $functionaryID, $functionaryFilter);

    }

    $functionary->setAssociation($this->associationRepository->findByID($functionary->getAssociation()->getID(), $associationFilter));

  	$this->templateVariableContainer->add($this->arguments[self::ARGUMENT_AS], $functionary);
    $output = $this->renderChildren();
    $this->templateVariableContainer->remove($this->arguments[self::ARGUMENT_AS]);

    return $output;

  }

}
