<?php
	require_once('languages.php');
	if((!empty($_GET['query'])) || (!empty($_GET['trans_query'])) ){
		?>
		
		<!DOCTYPE HTML>
<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/css/navbar-fixed-top.css" rel="stylesheet">
	<link href="dist/css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Transearch - Adding a New Dimension to Search</title>
</head>

<body>
	 <!-- Fixed navbar -->
	 <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/"><img src="dist/trans_alt.png" alt="TranSearch" /></a></li>
          </ul>
		  		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" class="navbar-collapse collapse" >
		  <div class="form-alt">
		  
			<input type="text" placeholder="Search" name="query" id="query" class="form-con" value="<?php echo $_GET['query']; ?>" />
			<div class="dis">
			<label for="your_language"> My Language: </label>
			<select name="your_language" id="your_language">
			<?php
				foreach ($languages as $language => $lang_code) {
					if($_GET['your_language'] == $lang_code){
						echo '<option selected="selected" value="' . $lang_code . '">' . $language . '</option>';
					}
					else{
						echo '<option value="' . $lang_code . '">' . $language . '</option>';
					}
				}
			?>
			</select>
			</div>
			<div class="dis">
			<label for="search_in">Search Websites Written In: </label>
			<select name="search_in" id="search_in">
			<?php
				foreach ($languages as $language => $lang_code) {
					//if statement prevents auto detect from being displayed in search in
					if(!empty($lang_code)){
						if($_GET['search_in'] == $lang_code){
						echo '<option selected="selected" value="' . $lang_code . '">' . $language . '</option>';
						}
					else{
						echo '<option value="' . $lang_code . '">' . $language . '</option>';
					}
					}
				}
			?>
			</select>
			</div>
			<div class="dis">
			<input name="submit" value="Search !!!" type="submit" class="btn btn-success" />
			</div>
		</div>
		</form>

		 </div><!--/.nav-collapse -->
      </div>
    </div>

	</div>
	<div class="container" id="search_results">
		
		<?php
		libxml_disable_entity_loader(false);
		
		//do not perform translation if page number is submited i.e because translation was done before screen where page numbers show
		if(empty($_GET['page']) && empty($_GET['trans_query']) ){
			require_once('translate_query.php');
		}
		else{
			$trans_query = $_GET['trans_query'];	
			$trans_query_yandex = $trans_query;	
		}
		require_once('search.php');
		?>
	</div>
	<p id="pagination">
		<?php
		require_once('pagination.php');
		?>
	</p>
		 <div id="footer">
      <div class="container">
        <p class="text-muted credit">&copy; 2014 Transearch &middot; Powered By <img src="dist/custom_search.gif" alt="Google Custom Search" /> and <img src="dist/google_translate.jpg" alt="Google Translate" />.
		<span class="navbar-right">
		<a href="https://plus.google.com/110722114430930281342" title="+1 Us" target="_blank"><img src="dist/google_plus.jpg" alt="Google Plus" /></a>
		<a href="http://facebook.com/liketransearch" title="Like Us on Facebook" target="_blank"><img src="dist/facebook.jpg" alt="Facebook" /></a>
		</span>
		</p>
      </div>
    </div>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
	}
	else{
?>
<!DOCTYPE HTML>
<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Transearch - Adding a New Dimension to Search</title>
</head>

<body>
	 <!-- Fixed navbar -->
	 <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
		   <ul class="nav navbar-nav navbar-right">
		    <li><a href="about.html"><b>How it Works</b></a></li>
			<?php require_once('login.php'); ?>
          </ul>
		 </div><!--/.nav-collapse -->
      </div>
    </div>
	
	<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
	  <img src="dist/transearch.png" alt="TranSearch"  id="trans_logo"/>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" >
		  <div class="form-group">
			<input type="text" placeholder="Search" name="query" id="query" class="form-control" />
			 <img src="dist/custom_search.gif" alt="Google Custom Search" />
			</div>
		  <div class="form-group">
		   <span id="lang">
			<label for="your_language"> My Language: </label>
			<select name="your_language" id="your_language">
			<?php
				foreach ($languages as $language => $lang_code) {
				if($lang_code == 'en'){
					echo '<option selected="selected" value="' . $lang_code . '">' . $language . '</option>';
					}
					else {
						echo '<option value="' . $lang_code . '">' . $language . '</option>';
					}
				}
			?>
			</select> <img src="dist/arrow.png" />
			<label for="search_in">Search Websites Written In: </label>
			<select name="search_in" id="search_in">
			<?php
				foreach ($languages as $language => $lang_code) {
				if(!empty($lang_code)){
					if($lang_code == 'fr'){
					echo '<option selected="selected" value="' . $lang_code . '">' . $language . '</option>';
					}
					else {
						echo '<option value="' . $lang_code . '">' . $language . '</option>';
					}
				}	
			}
			?>
			</select><br /><br />
			</span></div>
			<input name="submit" value="Search !!!" type="submit" class="btn btn-success" />
		</form>
	</div>
  </div>
    <div id="footer">
      <div class="container">
        <p class="text-muted credit">&copy; 2014 TranSearch &middot; Powered By <img src="dist/custom_search.gif" alt="Google Custom Search" /> and <img src="dist/google_translate.jpg" alt="Google Translate" />
		<span class="navbar-right">
		<a href="https://plus.google.com/110722114430930281342" title="+1 Us" target="_blank"><img src="dist/google_plus.jpg" alt="Google Plus" /></a>
		<a href="http://facebook.com/liketransearch" title="Like Us on Facebook" target="_blank"><img src="dist/facebook.jpg" alt="Facebook" /></a>
		</span>
		</p>
      </div>
    </div>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
			}
			?>
