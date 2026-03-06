<?php
//Ajout avec config des privileges

function btn_add_action($smenu_code)
{
	$this2= get_instance();
	$tab_smrole = $this2->session->smenu_roles;
	
	if(isset($tab_smrole[$smenu_code]['d_add']))
	{
		echo '<div class="row">
				<div class="col-sm-12" style="margin-bottom: 30px">
					<button type="button" id="btn_add" class="btn btn-primary">Ajouter <span lass="m-l-5"><i
								class="fa fa-plus-square"></i></span></button>
				</div>
			</div>';
	}
}


//Ajout sans config des privileges
function btn_add()
{
	echo '<div class="row">
			<div class="col-sm-12" style="margin-bottom: 30px">
				<button type="button" id="btn_add" class="btn btn-primary">Ajouter <span lass="m-l-5"><i
							class="fa fa-plus-square"></i></span></button>
			</div>
		</div>';
}


//Edit avec config des privileges
function btn_edit_action($id, $smenu_code)
{
	$this2= get_instance();
	$tab_smrole = $this2->session->smenu_roles;
	if(isset($tab_smrole[$smenu_code]['d_upd']))
	{
		echo '<a href="#" class="on-default btn_edit"
		id="'.$id.'"><i class="fa fa-pencil"></i></a>&nbsp;';
	}
}

//Edit sans config des privileges
function btn_edit($id)
{
	echo '<a href="#" class="on-default btn_edit"
	id="'.$id.'"><i class="fa fa-pencil"></i></a>&nbsp;';
}



//Delete avec config des privileges
function btn_delete_action($id, $smenu_code)
{
	$this2= get_instance();
	$tab_smrole = $this2->session->smenu_roles;
	if(isset($tab_smrole[$smenu_code]['d_del']))
	{
		echo '<a href="#" class="on-default btn_delete"
		id="'.$id.'"><i class="fa fa-trash-o" style="color:red"></i></a>&nbsp;';
	}
}



//Delete sans config des privileges
function btn_delete($id)
{
	echo '<a href="#" class="on-default btn_delete"
	id="'.$id.'"><i class="fa fa-trash-o" style="color:red"></i></a>&nbsp;';
}





function btn_show_action($id, $smenu_code)
{
	$this2= get_instance();
	$tab_smrole = $this2->session->smenu_roles;
	if(isset($tab_smrole[$smenu_code]['d_read']))
	{
		echo '<a href="#" class="on-default btn_edit"
		id="'.$id.'"><i class="fa fa-eye" style="color:#CCCCCC"></i></a>';
	}
}


function format_date($value)
{

	if($value == NULL)
		return '';
	else
		return date('d/m/Y', strtotime($value));

}

//Transforme une date mysql en H:M
function time_hm($heure)
{
	//13:05:00
	$h = substr($heure, 0, 2);
	$m = substr($heure, 3, 2);

	return $h.':'.$m;
}

//Recupère une valeur d'un tableau matrice
/*
* @$table: 		Tableau dans lequel on fait la recherche
* @$to_find: 	Parametre de recherche
* @$colonne:  	Colonne sur le sous tableaux
* @$cle:		La colonne du tableau associatif
*/

function multi_array_search($tableau, $valeurConnue, $colonneValeurConnue, $colonneValeurRecherchee)
{
	if(!empty($tableau))
	{
		$tableau = json_decode(json_encode($tableau), true);
		//return array_search($valeurConnue, array_column($tableau, $colonneValeurConnue));
		if(array_search($valeurConnue, array_column($tableau, $colonneValeurConnue)) !== false)
		{
			$val = $tableau[array_search($valeurConnue, array_column($tableau, $colonneValeurConnue))][$colonneValeurRecherchee];
			return $val;
		}else
		{
			return false;
		}
	}else
	{
		return false;
	}
}


//Trie un tableau matrice
function multi_array_sort($array, $on, $order=SORT_ASC)
{
	$new_array = array();
	$sortable_array = array();

	if (count($array) > 0)
	{
		foreach ($array as $k => $v)
		{
			if (is_array($v))
			{
				foreach ($v as $k2 => $v2)
				{
					if ($k2 == $on)
					{
						$sortable_array[$k] = $v2;
					}
				}
			}else
			{
				$sortable_array[$k] = $v;
			}
		}

		switch ($order)
		{
			case SORT_ASC:
				asort($sortable_array);
			break;
			case SORT_DESC:
				arsort($sortable_array);
			break;
		}

		foreach ($sortable_array as $k => $v)
		{
			$new_array[$k] = $array[$k];
		}
	}

	return $new_array;
}


///Supprime les dublons d'un tableau matrice sur une seule colonne

function multi_array_unique($tableau, $colonne)
{ 
	$tableau = json_decode(json_encode($tableau), true);
	$temp_array = array(); 
	$t_colonnes = array();
	
	$i = 0; 

	foreach($tableau as $val)
	{ 
		if (!in_array($val[$colonne], $t_colonnes))
		{ 
			$t_colonnes[$i] = $val[$colonne]; 
			$temp_array[$i] = $val; 
		} 
		$i++; 
	}
	
	return $temp_array; 
} 


//Supprime les dublons d'un tableau matrice sur plusieurs colonnes
function multi_colonne_unique($tableau, $colonnes = array())
{ 
	$tableau = json_decode(json_encode($tableau), true);
	$temp_array = array(); 
	$t_colonnes = array();
	
	$i = 0; 

	foreach($tableau as $val)
	{ 
		$chaine = '';
		foreach($colonnes as $col)  //Parcours de colonnes de tri
		{
			$chaine .= $val[$col].'-+-';
		}

		$chaine = substr($chaine, 0, -3);  //Suppression des séparateurs supplémentaires

		if (!in_array($chaine, $t_colonnes))
		{ 
			$t_colonnes[$i] = $chaine; 
			$temp_array[$i] = $val; 
		} 
		$i++; 
	}
	
	return $temp_array; 
} 


function multi_array_values($tableau, $colonne)
{
	$tableau = json_decode(json_encode($tableau), true);
	$tab = array();
	foreach($tableau as $val)
	{
		$tab[] = $val[$colonne];
	}
		
	return $tab;
}


function utf8_converter($array)
{
	array_walk_recursive($array, function(&$item, $key)
	{
		if(!mb_detect_encoding($item, 'utf-8', true))
		{
				$item = utf8_encode($item);
		}
	});

	return $array;
}


//Suppresion des accents
function del_accent($str, $encoding='utf-8')
{
	$str = htmlentities($str, ENT_NOQUOTES, $encoding);
	$str = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $str);

	$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
	// Supprimer tout le reste
	$str = preg_replace('#&[^;]+;#', '', $str);
	return $str;
}

function ve($var, $var2=NULL, $var3=NULL, $var4=NULL)
{
	if($var2 == NULL)
	{
		var_dump($var); 
	}
	elseif($var2 != NULL && $var3 == NULL)
	{
		var_dump($var, $var2);
	}
	elseif($var3 != NULL && $var4 == NULL)
	{
		var_dump($var, $var2, $var3);
	}
	elseif($var4 != NULL)
	{
		var_dump($var, $var2, $var3, $var4);
	}
	
	exit;
}

function vex($var, $var2=NULL, $var3=NULL, $var4=NULL)
{
	if($var2 == NULL)
	{
		var_export($var); 
	}
	elseif($var2 != NULL && $var3 == NULL)
	{
		var_export($var, $var2);
	}
	elseif($var3 != NULL && $var4 == NULL)
	{
		var_export($var, $var2, $var3);
	}
	elseif($var4 != NULL)
	{
		var_export($var, $var2, $var3, $var4);
	}
	
	exit;
}

function type_contenu($type)
{
	switch($type)
	{
		case 'pdf':
			return '<i class="fa fa-file-pdf-o"></i>';
		break;
			
		case 'image':
			return '<i class="fa fa-image"></i>';
		break;
			
		case 'video':
			return '<i class="fa fa-youtube-play"></i>';
		break;
			
		case 'audio':
			return '<i class="fa fa-file-audio-o"></i>';
		break;
	}
}

function type_contenu_liaison($type)
{
	switch($type)
	{
		case 'pdf':
			return '<i class="fa fa-file-pdf-o fa-lg" style="color:#F00; font-size: 30px;"></i>';
		break;
			
		case 'image':
			return '<i class="fa fa-image fa-lg" style="color:#06F; font-size: 30px;"></i>';
		break;
			
		case 'video':
			return '<i class="fa fa-youtube-play fa-2x" style="color:#F00; font-size: 30px;"></i>';
		break;
			
		case 'audio':
			return '<i class="fa fa-file-audio-o fa-lg" style="color:#06F; font-size: 30px;"></i>';
		break;
	}
}

function id_youtube($lien)
{
// Here is a sample of the URLs this regex matches: (there can be more content after the given URL that will be ignored)


// http://youtu.be/dQw4w9WgXcQ
// http://www.youtube.com/embed/dQw4w9WgXcQ
// http://www.youtube.com/watch?v=dQw4w9WgXcQ
// http://www.youtube.com/?v=dQw4w9WgXcQ
// http://www.youtube.com/v/dQw4w9WgXcQ
// http://www.youtube.com/e/dQw4w9WgXcQ
// http://www.youtube.com/user/username#p/u/11/dQw4w9WgXcQ
// http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/0/dQw4w9WgXcQ
// http://www.youtube.com/watch?feature=player_embedded&v=dQw4w9WgXcQ
// http://www.youtube.com/?feature=player_embedded&v=dQw4w9WgXcQ


// It also works on the youtube-nocookie.com URL with the same above options.
// It will also pull the ID from the URL in an embed code (both iframe and object tags)


	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $lien, $match);
	$youtube_id = $match[1];
	return $youtube_id;
}

function lien_contenu($lien, $type, $url_rsc='')
{
	if($type == 'video')
	{
		$new_lien = 'https://www.youtube.com/embed/'.id_youtube($lien);
		return $new_lien;
	}
	else
	{
		return $url_rsc.$lien;
	}
}


function avatar($ien)
{
	$arrContextOptions=array("ssl"=>array( "verify_peer"=>false,"verify_peer_name"=>false));
	$photo = file_get_contents("https://apps.education.sn/C_personnel_api/get_pic_src/".$ien, false, stream_context_create($arrContextOptions));
	
	return $photo;
}

function swap_array($data, $key_name, $desc_name)
{
	$result = array();

	$array_key =  explode('|', $key_name);
	$array_desc =  explode('|', $desc_name);


	if(count($array_key) == 1 && count($array_desc) == 1 ){
		//standard
		foreach($data as $row){
			$result[$row->$key_name] =  $row->$desc_name;
		}
	}
	else if(count($array_key) >= 1 && count($array_desc) >= 1 ){
		//avancé (avec comme séparation permis l'espace( ), le tiret de 6 (-), le tiret de 8( _ )
		$sep_array = array('',' ','-','_');

		foreach($data as $row){

			$custom_key = '';
			$custom_desc = '';

			//key
			foreach($array_key as $key){
				if(in_array(trim($key),$sep_array)) 
					$custom_key .= $key;
				else
					$custom_key .= $row->$key;
			}

			//desc
			foreach($array_desc as $desc){
				if(in_array(trim($desc),$sep_array))
					$custom_desc .= $desc;
				else
					$custom_desc .= $row->$desc;
			}

			$result[$custom_key] =  $custom_desc;
		}
	}

	return $result;
}

function option_eleve($ans_cours, $id_eleve, $code_classe)
{
	$this2 = get_instance();
	$this2->load->model('M_evaluation', 'eval');

	$options = $this2->eval->option_eleve($ans_cours, $id_eleve, $code_classe);

	$swap_option = array();
	foreach($options as $opt)
	{
		$swap_option['id'.$opt->id_discipline] = $opt->code_option;
	}

	return $swap_option;
}

/* 
* @ str : la chaine de caractère
* @ strict : Supprime tous les espaces
*/ 
function my_trim($str, $strict = NULL)
{
    $str = trim($str);

    if($strict == 'strict')
    {
        $str = preg_replace('/\s+/', '', $str);
    }
    else
    {
        $str = preg_replace('/\s\s+/', ' ', $str);
    }

    return $str;
}


