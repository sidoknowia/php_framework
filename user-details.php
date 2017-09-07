<?php // this will return details of the user based on the available input 
// inputs : u = username   t = type from the below mentioned list
// basic, interest, links, pic, communities , readinglist, wishlist, 
// results , internships, post         
require_once 'core/init.php';
if(!$u = (Input::get('u'))){
	return null;
} 

if(!$t = (Input::get('t'))){
	return null;
}

$user = new User($u);

switch ($t) {
		case 'basic':
			if($user->dataInfoExists()){
				$e = json_encode($user->dataInfo());//print_r($e);
				return $e;
			} else {
				return "No information found.";
			}
			break;

		case 'interest':
			if($user->dataInterestsExists()){
				$e = json_encode($user->dataInterests());print_r($e);
				return $e;
			} else {
				//echo "No info";
				return "No information found.";
			}
			break;

		case 'links':
			if($user->dataLinksExists()){
				$e = json_encode($user->dataLinks());//print_r($e);
				return $e;
			} else {
				return "No information found.";
			}
			break;

		case 'pic': // Nothing made for this :(
			if($user->dataInfoExists()){
				$e = json_encode($user->dataInfo());//print_r($e);
				return $e;
			} else {
				return "No information found.";
			}
			break;

		case 'communities':
			if($user->dataCommunityExists()){
				$e = json_encode($user->dataCommunity());//print_r($e);
				return $e;
			} else {
				return "No information found.";
			}
			break;

		case 'readinglist':
			if($user->dataReadingListExists()){
				$e = json_encode($user->dataReadingList());//print_r($e);
				return $e;
			} else {
				return "No information found.";
			}
			break;

		case 'results':
			if($user->dataResultsExists()){
				$e = json_encode($user->dataResults());//print_r($e);
				return $e;
			} else {
				return "No information found.";
			}
			break;

		case 'wishlist':
			if($user->dataWishListExists()){
				$e = json_encode($user->dataWishList());//print_r($e);
				return $e;
			} else {
				return "No information found.";
			}
			break;

		case 'internships':
			if($user->dataInternshipExists()){
				$e = json_encode($user->dataInternship());//print_r($e);
				return $e;
			} else {
				return "No information found.";
			}
			break;

		case 'post':
			if($user->postExists()){
				$e = json_encode($user->postData());//print_r($e);
				return $e;
			} else {
				return "No information found.";
			}
			break;

		default:
			return false;
			break;
	}	
