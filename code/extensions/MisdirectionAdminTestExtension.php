<?php

/**
 *	Allow AJAX link mapping chain testing when viewing the LinkMappingAdmin.
 *	@author Nathan Glasl <nathan@silverstripe.com.au>
 */

class MisdirectionAdminTestExtension extends Extension {

	public function updateEditForm(&$form) {

		// Restrict the testing interface to administrators.

		$user = Member::currentUserID();
		if(Permission::checkMember($user, 'ADMIN')) {
			$gridfield = $form->fields->items[0];
			if(isset($gridfield)) {
				$configuration = $gridfield->config;

				// Add the required HTML fragment.

				$configuration->addComponent(new LinkMappingTest());
			}
		}
	}

}
