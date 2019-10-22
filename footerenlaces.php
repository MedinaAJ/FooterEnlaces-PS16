<?php 
/*
* minicskeleton - a module template for Prestashop v1.5+
* Copyright (C) 2013 S.C. Minic Studio S.R.L.
* 
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if (!defined('_PS_VERSION_'))
  exit;
 
class FooterEnlaces extends Module
{
	// DB file
	const INSTALL_SQL_FILE = 'install.sql';

	public function __construct()
	{
		$this->name = 'footerenlaces';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'Alejandro Medina';
		$this->need_instance = 0;
		$this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.7'); 
		// $this->dependencies = array('blockcart');

		parent::__construct();

		$this->displayName = $this->l('Footer Enlaces');
		$this->description = $this->l('Mejora los backlinks de la pagina');

		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
	}

	/**
 	 * install
	 */
	public function install()
	{
		return parent::install() && $this->registerHook('displayFooter');
	}

	/**
 	 * uninstall
	 */
	public function uninstall()
	{
		if (!parent::uninstall())
			return false;
		return true;
	}

	/**
 	 * admin page
	 */	
	public function getContent()
	{
		return $this->display(__FILE__, 'views/templates/admin/backoffice.tpl');
	}
	
	public function hookDisplayFooter($params){	
	
		$id_product = (int) Tools::getValue('id_product');
		$id_category = (int) Tools::getValue('id_category');
		
		$sql = 'Select links from ' . _DB_PREFIX_ . 'footerenlaces Where id_product ='.$id_product.' and id_category='.$id_category.';';
		$links = Db::getInstance()->getValue($sql);
		
		// Recuperamos un String con 5 enlaces x 4 columnas, 20 enlaces en total. Para recuperarlos, splitea por ;; y recuperas las columnas, y despues por , para recuperar las filas
		
		/*echo '<script>';
		echo 'console.log("Links: '.$links.'");';
		echo '</script>';*/
		
		$c1f1 = ''; $c2f1 = ''; $c3f1 = ''; $c4f1 = ''; 
		$c1f2 = ''; $c2f2 = ''; $c3f2 = ''; $c4f2 = ''; 
		$c1f3 = ''; $c2f3 = ''; $c3f3 = ''; $c4f3 = ''; 
		$c1f4 = ''; $c2f4 = ''; $c3f4 = ''; $c4f4 = ''; 
		$c1f5 = ''; $c2f5 = ''; $c3f5 = ''; $c4f5 = ''; 
		
		
	
		if(isset($links)){
			
			$c = explode(';;', $links);
			$seguir = false;
			
			if(count($c) == 4){
				$c1 = explode(',', $c[0]);
				$c2 = explode(',', $c[1]);
				$c3 = explode(',', $c[2]);
				$c4 = explode(',', $c[3]);
				
				$seguir = true;
			}
			
			$mostrar = null;
			
			if($seguir && count($c1) == 5 && (count($c2) == 5) && (count($c3) == 5) && (count($c4) == 5) ){
				$c1f1 = $c1[0]; $c2f1 = $c2[0]; $c3f1 = $c3[0]; $c4f1 = $c4[0]; 
				$c1f2 = $c1[1]; $c2f2 = $c2[1]; $c3f2 = $c3[1]; $c4f2 = $c4[1]; 
				$c1f3 = $c1[2]; $c2f3 = $c2[2]; $c3f3 = $c3[2]; $c4f3 = $c4[2]; 
				$c1f4 = $c1[3]; $c2f4 = $c2[3]; $c3f4 = $c3[3]; $c4f4 = $c4[3]; 
				$c1f5 = $c1[4]; $c2f5 = $c2[4]; $c3f5 = $c3[4]; $c4f5 = $c4[4]; 
				
				$mostrar = true;
			}else{
				$mostrar = false;
			}
			
			$this->smarty->assign('mostrar', $mostrar);
		
			$this->smarty->assign('c1f1', $c1f1);
			$this->smarty->assign('c1f2', $c1f2);
			$this->smarty->assign('c1f3', $c1f3);
			$this->smarty->assign('c1f4', $c1f4);
			$this->smarty->assign('c1f5', $c1f5);
			
			$this->smarty->assign('c2f1', $c2f1);
			$this->smarty->assign('c2f2', $c2f2);
			$this->smarty->assign('c2f3', $c2f3);
			$this->smarty->assign('c2f4', $c2f4);
			$this->smarty->assign('c2f5', $c2f5);
			
			$this->smarty->assign('c3f1', $c3f1);
			$this->smarty->assign('c3f2', $c3f2);
			$this->smarty->assign('c3f3', $c3f3);
			$this->smarty->assign('c3f4', $c3f4);
			$this->smarty->assign('c3f5', $c3f5);
			
			$this->smarty->assign('c4f1', $c4f1);
			$this->smarty->assign('c4f2', $c4f2);
			$this->smarty->assign('c4f3', $c4f3);
			$this->smarty->assign('c4f4', $c4f4);
			$this->smarty->assign('c4f5', $c4f5);
		}
	    return $this->display(__FILE__, 'views/templates/front/_display.tpl'); 
	}
}

?>
