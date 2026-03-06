<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/10/2017
 * Time: 12:48
 */

function date_heure_parse_en2fr($date)
{
    if($date == null || $date == '')
        return '';
    else
    {
        $new_date = date('d/m/Y H:i:s',strtotime($date));
        return $new_date;
    }
}

function jr_en_fr($jour)
{
    switch($jour)
    {
        case 'Monday':
        	return 'Lundi';
        break;

        case 'Tuesday':
        	return 'Mardi';
        break;

        case 'Wednesday':
            return 'Mercredi';
        break;

        case 'Thursday':
            return 'Jeudi';
        break;

        case 'Friday':
            return 'Vendredi';
        break;

        case 'Saturday':
            return 'Samedi';
        break;

        case 'Sunday':
            return 'Dimanche';
        break;
    }
}

function mois_en_fr($mois)
{
    switch($mois)
    {
        case 'January':
        	return 'Janvier';
        break;

        case 'February':
        	return 'Février';
        break;

        case 'March':
            return 'Mars';
        break;

        case 'April':
            return 'Avril';
        break;

        case 'May':
            return 'Mai';
        break;

        case 'June':
            return 'Juin';
        break;

        case 'July':
            return 'Juillet';
        break;
		
		case 'August':
            return 'Aout';
        break;
		
		case 'September':
            return 'Septembre';
        break;
		
		case 'October':
            return 'Octobre';
        break;
		
		case 'November':
            return 'Novembre';
        break;
		
		case 'December':
            return 'Décembre';
        break;
    }
}

function en2fr($odldate, $separ='-')
{
  $a= substr($odldate, 0, 4);
  $m= substr($odldate, 5, 2);
  $j= substr($odldate, 8, 2);
  
  $separ_tab = array('-', '/');
  if(in_array($separ, $separ_tab))
  {
	  $date= $j."".$separ."".$m."".$separ."".$a;
  }else //Format par defaut
  {
	  $date= "$j-$m-$a";
  }
  
  return $date;
}

//02-10-2013
function fr2en($odldate, $separ='-')
{
  $j= substr($odldate, 0, 2);
  $m= substr($odldate, 3, 2);
  $a= substr($odldate, 6, 4);
  
  $separ_tab = array('-', '/');
  if(in_array($separ, $separ_tab))
  {
	  $date= $a."".$separ."".$m."".$separ."".$j;
  }else //Format par defaut
  {
	  $date= "$a-$m-$j";
  }
  
  return $date;
}

//07:00:00 => 07:00
function h_m($hr)
{
	return substr($hr, 0, 5);
}


function en2lfr($olddate /*YYYY-mm-dd*/)
{
  $olddate = date("l-F-j-Y", strtotime($olddate));
  $t_date  = explode('-', $olddate);
  
  $jour = jr_en_fr($t_date[0]);
  $mois	= mois_en_fr($t_date[1]);
  $jnum = $t_date[2];
  $an	= $t_date[3];
  
  return $jour.', '.$jnum.' '.strtolower($mois).' '.$an;
}


//2020-03-30 14:41:53
function date2lettre_hr($date)
{
	//2019-10-06
	$jour 	=  substr($date, 8, 2);
	$mois 	=  intval(substr($date, 5, 2));
	$annee 	=  substr($date, 0, 4);
	$hr 	=  substr($date, 11, 5);
	switch($mois)
    {
        case '1':
        return $jour.' janv <br> à '.$hr;
        break;
		
		case '2':
        return $jour.' fev <br> à '.$hr;
        break;
		
		case '3':
        return $jour.' mar <br> à '.$hr;
        break;
		
		case '4':
        return $jour.' avr <br> à '.$hr;
        break;
		
		case '5':
        return $jour.' mai <br> à '.$hr;
        break;
		
		case '6':
        return $jour.'jui <br> à '.$hr;
        break;
		
		case '7':
        return $jour.' jul <br> à '.$hr;
        break;
		
		case '8':
        return $jour.' aou <br> à '.$hr;
        break;
		
		case '9':
        return $jour.' sep <br> à '.$hr;
        break;
		
		case '10':
        return $jour.' oct <br> à '.$hr;
        break;
		
		case '11':
        return $jour.' nov <br> à '.$hr;
        break;
		
		case '12':
        return $jour.' dec <br> à '.$hr;
        break;
	}
}

