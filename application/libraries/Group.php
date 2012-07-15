<?php
class Group {

	public static function groupIdToName($id) {

		switch($id){
			case 1:
				return 'Normal Member';
				break;
			case 2:
				return 'Premium Member';
				break;
			case 3:
				return 'Administrator';
				break;

		}
	}

}