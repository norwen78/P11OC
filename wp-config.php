<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'nathaliemota' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '8;UTejM3^xx=[!;R$0Y9(gL[/ {{]]/H4;g9KK# ]mTQQjpOfl3}$)98&$pFA-rd' );
define( 'SECURE_AUTH_KEY',  '&J>,?LS:`~Jc*=Y5O>R+{KV?]QQrx!;N?3Yy60ewrS3UC m5&G!l>bONdaKSN3?g' );
define( 'LOGGED_IN_KEY',    'z}u;#{|IMy7S}-hXlymh-R3qa({8gOO[pwpVSP/UO~xTYn|T%%n`E.6P/k@DeZlA' );
define( 'NONCE_KEY',        'AV`_F|7@%Y6)CCKKKoP>p(29#!RraLMRM9c(|q])e+2D!_-TRPq?DQ4>>whbL?64' );
define( 'AUTH_SALT',        'Nj$D5kN0=Nzr=)$T&9#e ywaA!}t6=so%/@,Az|~cdt+?WHP/Io]D?[`(~).G3_6' );
define( 'SECURE_AUTH_SALT', '<Qbav_WKZv_@sP|r-MJ3P&d;vQBe[[U/Q[l0phfJ8?D`FY6rxxo}N:fAVVKQI?[j' );
define( 'LOGGED_IN_SALT',   'PV;Pbik_luZTz_v?m+2+XXW^QpgL@$<+S[Wb;d6-GV;Ac[#AZZXaut3f{]T)oKT,' );
define( 'NONCE_SALT',       '$fdL[}l8++Fspi=z#7/rOubNiVA;OGyC5 %{O%i=wlN_ed6u(op>F06K$$!=a/R*' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
