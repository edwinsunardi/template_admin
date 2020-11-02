<?php 
class Navigation
{
	public $CI;
	public $html;

	function __construct()
	{
		$this->CI =& get_instance(); //mengakses diluar dari Controller, Models, dan Views, dan get_instans() tersebut biasanya digunakan pada helper, plugin ataupun library-library.
	}

	public function generateMenuAdmin($privilage = array(), $active_menu = '', $active_sub_menu = '', $active_sub_menu2 = '', $active_sub_menu3 = '')
	{
		$treeNav = array();
		$this->CI->general_model->generateTreeNavigationAdmin($treeNav, 0);
		$this->_print_menu_admin($treeNav, $privilage, $active_menu, $active_sub_menu, $active_sub_menu2, $active_sub_menu3);
		return $this->html;
	}

	function _print_menu_admin($arrOut, $privilage = array(), $active_menu = '', $active_sub_menu = '', $active_sub_menu2 = '', $active_sub_menu3 = '')
	{
		if($arrOut[0]['data']['menu_parent_id'] != 0)
			$this->html .= '<ul class="nav nav-treeview">'.PHP_EOL;
			
		foreach($arrOut as $key => $value)
		{
			// echo $value['data']['id'] ;
			if(!in_array($value['data']['id'], $privilage))
				continue;
			if(count($value['child']) > 0 )
			{
				if($value['data']['menu_parent_id'] == 0)
				{
					$classActiveA = ($value['data']['menu_active_sub'] == $active_menu) ? 'class="nav-link active"' : 'class="nav-link"';
					$classActive = ($value['data']['menu_active_sub'] == $active_menu) ? 'class="nav-item menu-open"' : 'class="nav-item"';
					$this->html .= '<li '.$classActive.'><a href="'.base_url().$value['data']['menu_url'].'" '.$classActiveA.'><i class="'.$value['data']['menu_icon'].'"></i><p>'.ucwords($value['data']['menu_name']).'<i class="fas fa-angle-left right"></i></p></a>';
				}else{
					$classActiveA = ($value['data']['menu_active_sub'] == $active_sub_menu) ? 'class="nav-link active"' : 'class="nav-link"';
					$classActive = ($value['data']['menu_active_sub'] == $active_sub_menu || $value['data']['menu_active_sub'] == $active_sub_menu2 || $value['data']['menu_active_sub'] == $active_sub_menu3) ? 'class="nav-item menu-open"' : 'class="nav-item"';
					$this->html .= '<li '.$classActive.'><a href="'.base_url().$value['data']['menu_url'].'" '.$classActiveA.'><i class="'.$value['data']['menu_icon'].'"></i><p>'.ucwords($value['data']['menu_name']).'</p></a>';
				}
				
			}
			else{
				$classActiveA = ($value['data']['menu_active_sub'] == $active_sub_menu) ? 'class="nav-link active"' : 'class="nav-link"';
				$classActive = ($value['data']['menu_active_sub']==$active_sub_menu || $value['data']['menu_active_sub']==$active_sub_menu2 || $value['data']['menu_active_sub']==$active_sub_menu3) ? 'class="nav-item menu-open"' : 'class="nav-item"';
				$this->html .= '<li '.$classActive.'><a href="'.base_url().$value['data']['menu_url'].'" '.$classActiveA.'><i class="'.$value['data']['menu_icon'].'"></i><p>'.ucwords($value['data']['menu_name']).'</p></a>';
			}

			if(count($value['child']) > 0){
				@$this->_print_menu_admin($value['child'], $privilage, $active_menu, $active_sub_menu, $active_sub_menu2, $active_sub_menu3);
			}
			$this->html .=  '</li>'.PHP_EOL;
		} 
		if($arrOut[0]['data']['menu_parent_id'] != 0)
			$this->html .=  '</ul>'.PHP_EOL;
	}
}
?>