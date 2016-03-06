<?php
$criteria_for_count = array(
		'entity_id' => $row->nid,
		'entity_type' => 'node',
		'tag' =>'overall_average',
		'function' => 'count');

$data = $row->votingapi_cache_node_percent_overall_average_average_value;

$count = votingapi_select_results($criteria_for_count);

	$variables = array(
        "rating" => $data,
        "average_rating" => $data,
        "votes"  =>(count($count) > 0 ? $count[0]['value']: 0),
        "stars" => 5
    	);

print theme('fivestar_static', array('rating' => $data, 'stars' => 5, 'tag' => 'food', 'widget' => array('name'=>'oxygen', 'css'=>'oxygen'))).theme('fivestar_summary', $variables);
?>