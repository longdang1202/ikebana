<?php
global $current_user;


$groups = array();

foreach(rs::$options as $tab){
	if($tab['controls']){
		$groups[$tab['name']] = $tab['controls'];
	}
	foreach($tab['subtabs'] as $subtab){
		if($subtab['controls']){
			$groups[$subtab['name']] = $subtab['controls'];
		}
	}
}


if(isset($_POST['rs-options'])){
	foreach($groups as $group){
		rs_cpanel_save_fields($group);
	}

	/* trigger action when save options */
	do_action('rs_save_options', $groups);
}

function rs_cpanel_render_control($control){
	$control['render_by'] = 'cpanel';
	$return = rs::renderControl($control);
	if(rs::isMessage($return)){
		echo '<div class="rs-render-error">' . $return['message'] . '</div>';
	}
}
	
function rs_cpanel_save_fields($group, $prefix = ''){
	foreach($group as $control){
		if($control['name']){
			if($prefix){
				$control['name_prefix'] = $prefix;
			}
			$name = str_replace(' ', '_', $control['name_prefix'] . $control['name']);
			
			if(isset($_POST[$name])){
				rs::updateOption($control['name'], $_POST[$name], $control['type']);
			}
		}
		elseif(is_array($control['controls'])){
			rs_cpanel_save_fields($control['controls'], $control['name_prefix']);
		}
	}
}

?>

<form class="rs-panel" action="<?php echo admin_url('/themes.php?page=theme-options') ?>" method="post" enctype="multipart/form-data">
<div id="wrapper">
	<div id="header">
		<div class="box-loadding-page">
			<div class="overlay">
				<div class="wrapper">
					<div class="box"></div>
					<div class="box"></div>
					<div class="box"></div>
					<div class="box"></div>
				</div>
			</div>
		</div>
		<iframe id="iframe" frameborder="0" width="100%" height="100%" src="<?php echo home_url() ?>?hidden_adminbar" ></iframe>
	</div><!--End Header-->
	<div id="content">
		<span id="resize"></span>
		<div id="nav" class="clearfix">
			<div class="nav_left left">
				<a href="#"><i class="fa fa-bars"></i> <span>Admin Dashboard</span></a>
			</div>
			<div class="nav_right right clearfix">
				<div class="button_reponsive left">
					<a id="laptop" href="#"><i class="icon-laptop icon-2x"></i></a>
					<a id="tablet" href="#"><i class="icon-tablet icon-2x"></i></a>
					<a id="mobie" href="#"><i class="icon-mobile-phone icon-2x"></i></a>
				</div>
				<div class="button_save left">
					<input type="submit" class="btn" value="Save" name="save" />
				</div>
				<div class="button_save left">
					<a href="#" class="btn save_view" id="save">Save & View</a>
				</div>
				<div class="button_toggle left">
					<a href="#" id="toggle"><i class="fa fa-sort"></i></a>
				</div>
			</div>
		</div>
		<div id="main" class="content clearfix">
			<div class="nav_siddebar left">
				<ul id="accordion">
					<?php
						foreach(rs::$options as $key=>$tab){
							?>
						<li>
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#rs-tab-<?php echo esc_attr($tab['name']) ?>">
								<?php if(!is_file($tab['icon'])) { ?>
									<i class="rs-icon fa dashicons <?php echo sanitize_html_class($tab['icon']) ?>"></i>
								<?php } ?>
								<?php echo force_balance_tags($tab['title']) ?>
								<?php
									if(count($tab['subtabs'])) {
									?>
								<b class="rs_arrow"></b>
									<?php
									}
								?>
							</a>
							<?php
								if(count($tab['subtabs'])){
								?>
							<ul id="collapse<?php echo esc_attr($key) ?>" class="panel-collapse collapse">
								<?php foreach($tab['subtabs'] as $subtab) { ?>
								<li><a href="#rs-tab-<?php echo esc_attr($subtab['name']) ?>"><i class="fa fa-angle-right"></i> <?php echo force_balance_tags($subtab['title']) ?></a></li>
								<?php } ?>
							</ul>
								<?php
								}
							?>
						</li>	
							<?php
						}
					?>
				</ul>
			</div>
			<input type="hidden" name="rs-options" value="true"/>
			<div class="main_content">
				<?php
					$rscontrol = new RsControl;
					foreach($groups as $name=>$fields) { ?>
						<div class="rs-fields" id="rs-tab-<?php echo esc_attr($name) ?>"> 
							<?php foreach($fields as $field) { 
								if($field['type'] == 'script') {
									rs::renderControl($field);
								}
								else{
									if(!array_key_exists('name',$field)){
										$field['name'] = 'noname';
									}
									if(null !== $value = $rscontrol->getOption($field['name'])){
										$field['value'] = $value;
									}
									$field = $rscontrol->parseOptions($field);
										if($field['name'] == 'noname'){
											unset($field['name']);
											$field['label'] = isset($field['label']) ? $field['label'] : '';
										}
										if($field['type'] == 'group'){
											if(!array_key_exists('name',$field)){
												$field['name'] = 'noname';
											}
											if(null !== $value = $rscontrol->getOption($field['name'])){
												$field['value'] = $value;
											}
											$field = $rscontrol->parseOptions($field);
											if($field['name'] == 'noname'){
												unset($field['name']);
												$field['label'] = isset($field['label']) ? $field['label'] : 'No name';
											}            
										}
								   $field['conditional_logic_id'] = $field['field_id'] . '-field';
									$class_custom = $field['type'] === 'group' ? ' label rs-group-label' : '';
									?>
									<div class="rs-field rs-control-cpanel <?php echo esc_attr('rs-box-'.$field['type']) ?>" id="<?php echo esc_attr($field['conditional_logic_id']) ?>">
											<div class="rs-field-label <?php echo esc_attr($class_custom); ?>">
												<label for="<?php echo esc_attr($field['field_id']) ?>"><?php echo force_balance_tags($field['label']) ?></label>
												<p><?php echo force_balance_tags($field['description']) ?></p>
											</div>
											<div class="rs-field-editor">
												<?php rs_cpanel_render_control($field) ?>
											</div>
										<div class="clear"></div>
									</div>
									<?php 
								} 
							}?>
						</div>
					<?php } 
				?>
			</div>
		</div>
	</div><!--End Content -->
</div><!--End Wrapper -->
</form>

<?php

rs::loadStyle('rs-panel-font', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600');
rs::loadStyle('rs-panel-flaticon-css', RS_LIB_URL . '/cpanel/theme/flaticon/flaticon.css');
rs::loadStyle('rs-bootstrap-css', RS_LIB_URL . '/cpanel/css/bootstrap.min.css');
rs::loadStyle('rs-font-awesome-css', RS_LIB_URL . '/cpanel/css/font-awesome.min.css');
rs::loadStyle('rs-panel-css', RS_LIB_URL . '/cpanel/style.css');
rs::loadStyle('rs-panel-responsive-css', RS_LIB_URL . '/cpanel/css/screen.css');
rs::loadScript('rs-bootstrap-script', RS_LIB_URL . '/cpanel/js/bootstrap.min.js');
rs::loadScript('rs-panel-script', RS_LIB_URL . '/cpanel/js/custom.js');