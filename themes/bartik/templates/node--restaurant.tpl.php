<?php
dpm($content);
// print render($content['field_tet']);
// print render($content['rate_thumbs_up_down']);
if($title){

	print '<h1 class="title" id="page-title">';
	print $title;
	print '</h1>';

}

if(firangiland_custom_check_if_user_has_reviewed()){
	$query = firangiland_custom_check_if_user_has_reviewed();
	$nid = $query['firangiland_custom_user_votes_status_review_nid'];
	print 'You already have a review for this restaurant.';

	print "<a href='".base_path()."node/".$nid."'>Want to modify?</a>";

}else{
print render($content['links']);
}

// print render($content['links']);
// print "<a href=".base_path()."node/add/review-for-restaurant>click</a>";

$criteria_for_count = array(
		'entity_id' => $node->nid,
		'entity_type' => 'node',
		'tag' =>'overall_average',
		'function' => 'count');

$criteria_for_average_votes = array(
		'entity_id' => $node->nid,
		'entity_type' => 'node',
		'tag' =>'overall_average',
		'function' => 'average');

$count = votingapi_select_results($criteria_for_count);

$current_rating = votingapi_select_results($criteria_for_average_votes);
if(count($current_rating) > 0){
	$variables = array(
        "rating" => $current_rating[0]['value'],
        "average_rating" => $current_rating[0]['value'],
        "votes"  =>$count[0]['value'],
        "stars" => 5
    	);

print theme('fivestar_static', array('rating' => $current_rating[0]['value'], 'stars' => 5, 'tag' => 'food', 'widget' => array('name'=>'oxygen', 'css'=>'oxygen'))).theme('fivestar_summary', $variables);
}

print render($content['field_location']);

		
?>