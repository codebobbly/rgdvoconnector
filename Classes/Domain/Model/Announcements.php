<?php
namespace RG\Rgdvoconnector\Domain\Model;
/** copyright notice **/
use RG\Rgdvoconnector\Domain\Model\ListEntity;

class Announcements extends ListEntity {

	/**
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Announcement>
   */
  protected $announcements;

	public function __construct() {
		$this->announcements = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Announcement
	 *
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Announcement $announcement
	 * @return void
	 */
	public function addAnnouncement($announcement)
	{
			$this->getAnnouncements()->attach($announcement);
	}

	 /**
	 * Removes a Announcement
	 *
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Announcement $announcement
	 * @return void
	 */
	public function removeAnnouncement($announcement)
	{
			$this->getAnnouncements()->detach($announcement);
	}

	/**
	 * returns the Announcements
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Announcement>
	 */
	public function getAnnouncements() {
		return $this->announcements;
	}

}