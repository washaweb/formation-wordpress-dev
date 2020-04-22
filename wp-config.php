<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress-dev' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'wordpress-dev' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'mpolkiujhy' );

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
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ':I~/gj7h@%/ekYr}IWi_muSZN,aJdYlq/R&0r(^3a?`QedS#[[S^I~y/q5q>aZvH' );
define( 'SECURE_AUTH_KEY',  '5+D8kj:+ h*uj0>FkN=lzud76pX++_3Vw,Kp_Z@2CKU1JPe>Rcg;!hb2x*o7<n^Y' );
define( 'LOGGED_IN_KEY',    'M `w,nk`Zc%Q&2?q$^~$#:{r/Y s~y<.kZb;3^P;n:weUbZ|O ODhJ@5)Ncz>IcW' );
define( 'NONCE_KEY',        'Fl}ZCm8$StN iP7J: :4IS[erFLVef1 vh]t$8<sOL3bfQ(POc+2f.{L5wN[!G>$' );
define( 'AUTH_SALT',        'ZSsy]9S>@B6,Q>bK*Kgdrfrj%59 }Tse;8i27#mFC t@~Mt`VahHZ rmPkbxpT8[' );
define( 'SECURE_AUTH_SALT', 'o[YFNS|ZA._}s KO~+!Qyv9;M QZm Us`[lx_gR)GL#D`54L)(svVQBu+V~df[h-' );
define( 'LOGGED_IN_SALT',   'CE0Wb!1]9M9BjO=}tW>li,Gr[SYU<du#s&k[?@UAFSeR_wp+k#v<l`1A`D]G9ccX' );
define( 'NONCE_SALT',       ';bwEJkWdUw])!5Par`*sbX1S[_4tq/E5<Vqg]COlLj0Vu<%,(&7^s9KIq@~B}y($' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'dev7_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
