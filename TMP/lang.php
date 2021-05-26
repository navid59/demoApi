<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	// include i18n class and initialize it
	require_once '../lib/i18n.class.php';
	$i18n = new i18n('../assets/lang/lang_en.json', '../assets/lang/cache', 'en');
	// Parameters: language file path, cache dir, default language (all optional)

	// init object: load language files, parse them if not cached, and so on.
	$i18n->init();
?>

<!-- get applied language -->
<p>Applied Language: <?php echo $i18n->getAppliedLang(); ?> </p>

<!-- get the cache path -->
<p>Cache path: <?php echo $i18n->getCachePath(); ?></p>

<!-- Get some greetings -->
<p>A greeting: <?php echo L::greeting; ?></p>
<p>Something other: <?php echo L::category_somethingother; ?></p><!-- normally sections in the ini are seperated with an underscore like here. -->