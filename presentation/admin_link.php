<?php
class AdministrationLink
{
	public $mLinkToAdmin;
	
	public function __construct()
	{
		$this->mLinkToAdmin = Link::ToAdmin();
	}
}
?>