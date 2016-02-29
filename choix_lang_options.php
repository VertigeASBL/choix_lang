<?php
/**
 * Options du plugin Page de choix de langue
 *
 * @plugin     Page de choix de langue
 * @copyright  2014
 * @author     Michel @ Vertige ASBL
 * @licence    GNU/GPL
 * @package    SPIP\Choix_lang\Options
 */

if (! defined('_ECRIRE_INC_VERSION')) {
	return;
}

// Lorsqu'il y a un paramètre lang_ok dans l'url, c'est qu'on a fait un choix
if (_request('lang_ok')) {

	setcookie('a_choisi_sa_langue_en_pleine_conscience', 'oui');

} elseif (( ! test_espace_prive())
          and ( ! isset($_COOKIE['a_choisi_sa_langue_en_pleine_conscience']))
          and ( ! _IS_BOT)
          and ( ! in_array(_request('page'), array('choix_lang', 'login')))) {

    include_spip('inc/headers');
    include_spip('inc/utils');

    redirige_par_entete(parametre_url('spip.php', 'page', 'choix_lang'));
}
