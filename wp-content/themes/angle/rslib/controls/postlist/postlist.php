<?php

/// Post List Control - Render Script And HTML ////
include_once(RS_LIB_PATH . "/controls/selectbox/selectbox.php");

class RsPostlist extends RsSelectBox{
	public $default = array(
		'name' 		=> 'postlist',
		'type'		=> 'postlist',
		'query' 	=> array(),
		'post_type' => 'post',
		'width' 	=> null,
		'empty_first' 	=> true,
		'multiple'	=> false
	);
	
	public $query_default = array(
		'posts_per_page'   => -1,
		'offset'           => 0,
		'category'         => '',
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true
	);
	
	public function RsPostlist(){
		$this->addControl('postlist', 'postlist');
	}
	
	public function parseOptions($options){
		if(!$options = parent::parseOptions($options)){
			return false;
		}
		if(!is_array($options['query'])){
			$options['query'] = array();
		}
		if(empty($options['query']['post_type'])) {
			$options['query']['post_type'] = $options['post_type'];
		}
		$options['query'] = array_merge($this->query_default, $options['query']);
		return $options;
	}
		
	public function render($options = array()){
		if(!$options =$this->parseOptions($options)){
			return $this->renderError();
		}
		$elements = get_posts( $options['query'] );
		$options['items'] = array();
		if($options['empty_first']){
			$options['items'][""] = "";
		}
		if($elements){
			foreach($elements as $item){
				$options['items'][$item->ID] = $item->post_title;
			}
		}
		$options['css_class'] .= ' rs-postlist';
		parent::render($options);
	}
}
