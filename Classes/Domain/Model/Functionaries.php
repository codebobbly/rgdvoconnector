<?php
namespace RGU\Rgdvoconnector\Domain\Model;
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Functionaries extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Rgdvoconnector\Domain\Model\Functionary>
   */
  protected $functionaries;

	public function __construct() {
		$this->functionaries = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Functionary
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Domain\Model\Functionary $functionary
	 * @return void
	 */
	public function addFunctionary($functionary)
	{
			$this->getfunctionaries()->attach($functionary);
	}

	 /**
	 * Removes a Functionary
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Domain\Model\Functionary $functionary
	 * @return void
	 */
	public function removeFunctionary($functionary)
	{
			$this->getfunctionaries()->detach($functionary);
	}

	/**
	 * returns the functionaries
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Rgdvoconnector\Domain\Model\Functionary>
	 */
	public function getfunctionaries() {
		return $this->functionaries;
	}

}
