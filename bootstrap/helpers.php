<?php

function title(){
	return '';

    $controller = Request::route()->controller;
    $model = $controller->model;
    if($model){
	    $currentAction = Request::route()->action['as'];
	    return ucfirst(__($controller->model.'.'.$currentAction));
    }

	return '';
}


function isGranted($role){
	return auth()->user()->isGranted($role);
}

function list_actions($object){
	
	$class = get_class($object);
	$path = explode('\\', $class);
    $object_class = array_pop($path);

    $_class_upper = strtoupper($object_class);
    $_class_lower = strtolower($object_class);

	$html = '';
	
	if( method_exists($object, 'list_actions') ){
            $html .= $object->list_actions();
        }

	// if( isGranted('ROLE_'.$_class_upper.'_SHOW') )
	// 	$html .= '<a href="'.route($_class_lower.'_show',$object->id).'" class="icon pl-3"><i class="fa fa-eye"></i></a>';
	
	if( isGranted($_class_lower) && Route::has($_class_lower.'_edit',$object->id) )
		$html .= '<a href="'.route($_class_lower.'_edit',$object->id).'" class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></a>';
	
	if( isGranted($_class_lower) && Route::has($_class_lower.'_delete',$object->id) )
		$html .= '<a href="'.route($_class_lower.'_delete',$object->id).'"  type="button" data-toggle="modal" data-target="#confirmdelete" class="delete_btn btn btn-sm btn-outline-danger ms-2"><i class="fa fa-trash"></i></a>';

	return $html;
}

function update_actions($object=null){
	

	$html = '<button type="submit" id="save_btn" class="btn btn-lg btn-success"> <i class="fa fa-check"></i>&nbsp; '.__('global.submit') .'</button>';

	$_class_lower = null;

	if( $object ){
	
		$class = get_class($object);
		$path = explode('\\', $class);
	    $object_class = array_pop($path);

	    $_class_upper = strtoupper($object_class);
	    $_class_lower = strtolower($object_class);
		if( $object->id and isGranted($_class_lower) )
			$html .= '<a id="create_btn" class="btn btn-lg ms-2 btn-primary" href="'.route(strtolower($object_class).'_create').'"> <i class="fa fa-plus"></i>&nbsp; '. __('global.add') .'</a>';
		
		if( $object->id and isGranted($_class_lower) )
			$html .= '<a href="'.route(strtolower($object_class).'_delete',$object->id) .'" type="button" data-toggle="modal" data-target="#confirmdelete" class="btn btn-lg ms-2 btn-danger delete_btn"> <i class="fa fa-times"></i>&nbsp; '. __('global.delete') .'</a>';

	}
	
	if( $_class_lower and isGranted($_class_lower) )
		$html .= '<a id="list_btn" class="btn btn-lg btn-outline-secondary ms-2" href="'.route(strtolower($object_class)) .'"> <i class="fa fa-ban"></i>&nbsp; '. __('global.cancel') .'</a>';

	return $html;
}

function base_list($results){

	$controller = Request::route()->controller;
	$f = $controller->filter();

	$fields = $f->fields;
	$filter = $f->filter;
	$model = $f->model;

	$html ='<div class="card">';
		$html .= '<div class="card-header">';

			$html .= '<div class="card-actions float-end">';
				if( isGranted($model) && Route::has(strtolower($model)."_create") )
                	$html .= '<a class="btn btn-outline-secondary" href="'.route(strtolower($model)."_create").'"><i class="fa fa-plus"></i>&nbsp;'. __('global.add').'</a>';
			$html .= '</div>';
			$html .= '<h3 class="card-title">'.__(strtolower($model).'.list_').'</h3>';
			//$html .= '<h6 class="card-subtitle text-muted">'.__(strtolower($model).'.list_').'</h6>';
		$html .= '</div>';

      	$html .= '<div class="table-responsive">';
	        $html .= '<table class="table table-striped table-hover">';
	          	$html .= '<thead class="">';
	            	$html .= '<tr class="fields">';
	              		$html .= '<th class="text-center w-1">#</th>';
	              		foreach ($fields as $key => $value) {
	              			$html .= '<th class="text-center">'.__($model.'.'.$key).'</th>';
	              		}
	              		$html .= '<th>'.__('global.actions').'</th>';
	            	$html .= '</tr>';
              		$html .= $filter;
              		//$html .= '<th class="text-center w-1"><i class="icon-people"></i></th>';
	          	$html .= '</thead>';
	          	$html .= '<tbody>';

	          		foreach ($results as $object ) {
			            $html .= '<tr>';
			            	$html .= '<td>';
	                        	$html .= '<label class="form-check" for="idx'.$object->id.'">';
	                            	$html .= '<input type="checkbox" class="form-check-input" name="idx[]" value="'.$object->id.'" id="idx'.$object->id.'">';
	                          	$html .= '</label>';
			            	$html .= '</td>';
		              		foreach ($fields as $key => $value) {
		              			$geter = 'get'.$key;
				            	$html .= '<td class="td-'.$key.'">'.$object->$geter().'</td>';
		              		}
		              		
		              		$html .= '<td class="text-center table-action">';
		              			$html .= list_actions($object);
	                        $html .= '</td>';
			            $html .= '</tr>';
              		}

	          	$html .= '</tbody>';
	        $html .= '</table>';
	    $html .= '</div>';

		$html .= '<div class="card-header card-footer">';
			$html .= '<div class="row"><div class="col-md-6">';
				$html .= '<select class="per-page w-9 custom-select" id="perpage">';

	                $pages__ = [16,32,64,128,192];
	                $currnt_page__ = $controller->perpage();
	                $url__ = $controller->url_params(true,['perpage'=>'mypagenull']);

	                foreach ($pages__ as $perpage) {
	                	$selected = ( $perpage == $currnt_page__ ) ? 'selected="selected"' : '';

	                	$html .= '<option '.$selected.' value="'.str_replace('mypagenull', $perpage, $url__).'">'.$perpage.'</option> ';
	                }
	            $html .= '</select>';

	            if($results) 
	            	$html .=  __('global.pages_list',[
	                  'current'=> $results->currentPage(),
	                  'length'=> $results->lastPage(),
	                  'total'=> $results->total(),
	                  'module'=>__($model.'.'.$model)
	                ]);
			$html .= '</div>';
			$html .= '<div class="col-md-6">';
				$html .= $results->links();
			$html .= '</div></div>';
		$html .= '</div>';
    $html .= '</div>';

	echo $html;
}