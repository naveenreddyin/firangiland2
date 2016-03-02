<?php
if($title){

	print '<h1 class="title" id="page-title">';
	print $title;
	print '</h1>';

}
print render($content['links']);

$current_rating = votingapi_select_results(
	array(
		'entity_id' => $node->nid,
		'entity_type' => 'node',
		'tag' =>'food',
		'function' => 'average'));
// $rating = votingapi_select_single_result_value(array(
//         'entity_id' => $node->nid,
//         'entity_type' => 'node',
//         'tag' => 'food',
//         'function' => 'average',
//    ));
      
      
      dpm($content);
    
   print theme('fivestar_static', array('rating' => $current_rating[0]['value'], 'stars' => 5, 'tag' => 'food'));

//    $settings = array(
//     'stars' => 5,
//     'tag' =>'food',
//     'allow_clear' => FALSE,
//     'allow_revote'=> FALSE,
//     'allow_ownvote' => FALSE,
//     'entity_type' => $node,
//     'auto_submit' => FALSE,
//     'style' => 'average',
//     );
// $vote = drupal_get_form('fivestar_custom_widget', array('average'=>$current_rating[0]['value']), $settings);

// print render($vote);
?>