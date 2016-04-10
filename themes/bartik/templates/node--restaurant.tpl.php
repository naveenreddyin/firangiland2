<?php
dpm($content);
// print render($content['field_tet']);
// print render($content['rate_thumbs_up_down']);
if($title){

	print '<h1 class="title" id="page-title">';
	print $title;
	print '</h1>';

}
?>
<div id="restaurant-wrapper">
	<div id="col1">
		<?php
		// dpm(variable_get('site_mail', ''));

		if(firangiland_custom_check_if_user_has_reviewed()){
			$query = firangiland_custom_check_if_user_has_reviewed();
			$nid = $query['firangiland_custom_user_votes_status_review_nid'];
			print 'You already have a review for this restaurant.';

			print "<a href='".base_path()."node/".$nid."'>Want to modify?</a>";

		}else{
		print render($content['links']);
		}

		// print render($content['links']);
		// print "<a href=".base_path()."node/add/review-for-restaurant/".get_defined_vars()['nid'].">click</a>";

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

		print "<div class='restaurant-body'>";
			print render($content['body']['#items'][0]['value']);
		print "</div>";

		// check if the restaurant is open today
		// $todays_day_name = strtolower(fc_get_todays_day_name());
		// if ($content['field_timing']['#items'][0][$todays_day_name] == 1){
		// 	print 'yes';
		// }else{
		// 	print $todays_day_name;
		// }
				print render($content['field_timing']);
		?>
	</div>
	<div id="col2">
		<div id="restaurant-location-map">
			<?php 
				print render($content['field_location']);
			?>
		</div>

	</div>
</div>