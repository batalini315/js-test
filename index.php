<!doctype html>
<html lang="en">
<head>

<title>Тестовые задачи</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<style type="text/css">
.image img{
	width :170px;
	margin : 30px;
}
</style type>

</head>
<body>

<a href="mysql.php">mysql</a><br><br>
<a href="archive.php">скачивание файлa archive</a><br>
    <br><br>
<h2>BE/FE Theory</h2><br>

редирект в PHP <br>
header( 'Location: http://test.zzz/mysql.php', true, 301 );<br>
header( 'Location: /article/page.htm', true, 303 ); // с помощью 303 редиректа переадресовать на внутреннюю страницу сайта.<br><br>
редирект в htaccess <br>
RewriteEngine On<br>

    Redirect 301 /hello.html http://test.zzz/index.php <br><br>
	
RewriteCond %{REQUEST_URI} !^/public_html/.*$<br>
RewriteCond %{REQUEST_URI} !^/docs/.*$<br>
RewriteRule ^(.*)$ /public_html/$1 [QSA,L]<br><br>
RewriteCond %{HTTP_HOST} !^domain\.ru$ [NC]<br>
RewriteRule ^(.*)$ http://domain.ru/$1 [L,R=301]<br>
или <br>
RewriteCond %{HTTP_HOST} !^www\.domain\.ru$ [NC]<br>
RewriteRule ^(.*)$ http://www.domain.ru/$1 [L,R=301]<br> <br>
 <br>
<h2>PHP/JS</h2>
<div class="image">
php
<a href ="image/fi.jpg"><img src="image/fi.jpg" alt="image"></a>
js<div>
<img  id="jsid" src="image/Version-HI.jpg" alt="image">
</div>
<script>	
		$(document).ready(function(){
   $("#jsid").click(function(event){
	  window.location.href = $('#jsid').attr('src');
   });

});
</script>
</div>
<h2>Joomla Theory</h2>
Расширения Joomla : компоненты, модули, плагины, шаблоны, языки.<br>
<h2>Joomla Native Code</h2>
	обратиться к методу getStats() класса ComponetModelItem из класса ComponentViewItem;<br>
	$this->item = $this->getStats();<br>

	обратиться к методу getStats() класса ComponetModelItem из класса ComponentControllerItem;<br>
	$this->item = $this->getStats();<br>

	сделать запрос к базе данных и получить массив объектов в котором ключом будет поле `id`<br>
		SELECT `a`.* FROM `#__articles` AS `a` WHERE `a`.`id` IN ('1','5','6') ORDER BY `a`.`title` LIMIT 0,1<br>		
	максимально нативными методами Joomla, для соблюдения непривязанности кода к типу базы данных;<br><br>
	
	$query = JFactory::getDbo()<br>
    ->getQuery(true)<br>
    $query->select('a.*');<br>
	$query->from($db->quoteName('#__articles', 'a'));<br>
    ->where($db->quoteName('id') . "IN ('1','5','6')");<br>
	$query->setLimit(0, 1);<br>
	$query->order($db->quoteName('a.title') . ' ASC');<br><br>
	
	сделать редирект, находясь в классе ComponetModelItem;<br>
	$this->setRedirect(JRoute::_('index.php', false));
	сделать редирект, находясь в классе ComponentControllerItem;<br><br>
	$app = JFactory::getApplication();
	$app->redirect(JRoute::_(JURI::root().'index.php'));
	$db->setQuery($query);
	$row = $db->loadObjectlist();
	<br>
	
	// Предустановленная переадресация
    $this->setRedirect(JRoute::_('index.php?option=com_mycomponents&view=mycomponents' . $this->getRedirectToListAppend(), false));
 
 
 
	в находитесь в компоненте com_test подключите с возможностью переопределения в шаблоне layout расположеный в `/components/com_test/layouts/wrap/entry`<br>
</body>
</html>