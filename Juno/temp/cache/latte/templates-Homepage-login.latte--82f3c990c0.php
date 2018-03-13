<?php
// source: C:\MAMP\htdocs\Juno\app\AdminModule\Modules\HomepageModule/templates/Homepage/login.latte

use Latte\Runtime as LR;

class Template82f3c990c0 extends Latte\Runtime\Template
{
	public $blocks = [
		'_flashMessages' => 'blockFlashMessages',
		'_lostpasswordsnippet' => 'blockLostpasswordsnippet',
	];

	public $blockTypes = [
		'_flashMessages' => 'xhtml',
		'_lostpasswordsnippet' => 'xhtml',
	];

	public $contentType = 'xhtml';


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
        <meta name="robots" content="noindex, nofollow" />
	
	<meta name="author" content="DENEVY Slovakia, s.r.o." />
        <meta name="language" content="sk" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<title>JUNO - Functional reporting and testing system</title>

	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 14 */ ?>/css/admin/style.css" />
	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 15 */ ?>/css/bs/bootstrap.min.css" />
	
	<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 17 */ ?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 18 */ ?>/js/netteForms.min.js"></script>
	<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 19 */ ?>/js/nette.ajax.js"></script>
	<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 20 */ ?>/js/admin/main.js"></script>
	<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 21 */ ?>/js/bs/bootstrap.min.js"></script>
	
	<link rel="shortcut icon" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 23 */ ?>/images/admin/favicon.png" />
	<meta name="viewport" content="width=device-width" />
</head>

<body style="display: block;">

    <style>
        .loginBackground {
            width: 100%; 
            height: 100%;
            display: table;
        }
        
        .loginFrameCell {
            display: table-cell;
            vertical-align: middle;
        }

        #loginFrame {
            max-width: 300px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, .85);
        }
        
        #loginFrame .top {
            text-align: center;
            padding: 20px 20px 20px 20px;
            border-bottom: 2px solid #FFF;
        }
        
        #loginFrame .bottom {
            padding: 20px;
        }
        
        #loginFrame h4 {
            text-align: center;
        }
        
        #loginFrame .loginForm {
            margin: 0px -35px -45px -35px;
            text-align: center;
        }
        
        #loginFrame .loginForm input[type=submit], #loginFrame .lostPasswordForm input[type=submit] {
            width: 60%;
            background-color: #58caee;
            color: #FFF;
        }
        
        #loginFrame .loginForm input[type=submit]:hover {
            background-color: #53bada;
        }
        
        .loginVersion {
            position: absolute;
            bottom: 0px;
            left: 0px;
            right: 0px;
            width: 100%;
        }
        
        .loginVersion p {
            display: block;
            background-color: rgba(255, 255, 255, .85);
            max-width: 300px;
            padding: 4px;
            margin: 0 auto;
            text-align: center;
        }
        
        #loginFrame .lostPasswordForm {
            margin: 0px -35px -45px -35px;
            text-align: center;
        }
        
    </style>
    
<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('flashMessages')) ?>"><?php
		$this->renderBlock('_flashMessages', $this->params) ?></div>    
<div class="loginBackground" style="background: url(<?php echo $basePath /* line 108 */ ?>/<?php echo $multimedia->getPath() /* line 108 */ ?>) no-repeat center center; 
    background-size: cover;">
    <div class="loginFrameCell">
        <div id="loginFrame" style="display: none;">
            <div class="top">
                <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 113 */ ?>/images/admin/juno_logo.png" style="max-width: 100%;" />
            </div>
            <div class="bottom">
                <h4 style="margin-bottom: 30px;">
                    <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, "is.login.informationSystem")) ?><br />
                    <strong><?php echo LR\Filters::escapeHtmlText($client->getName()) /* line 118 */ ?></strong>
                </h4>
                <div class="loginForm" >
                    <?php
		/* line 121 */
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $this->global->formsStack[] = $this->global->uiControl["loginForm"], []);
?>

<?php
		if ($form->hasErrors()) {
?>                        <ul class="errors list-unstyled" style="padding: 15px;">
<?php
			$iterations = 0;
			foreach ($form->errors as $error) {
				?>                            <li class="alert alert-danger" style="padding: 5px; margin-bottom: 0px;"><?php
				echo call_user_func($this->filters->translate, $error) ?></li>
<?php
				$iterations++;
			}
?>
                        </ul>
<?php
		}
?>
                        <div class="form-group" style="margin: 0px;">
                            <?php echo end($this->global->formsStack)["e_mail"]->getControl()->addAttributes(['class' => "form-control", 'style' => "border-width: 0px; border-bottom: 1px solid #ccc; border-radius: 4px 4px 0px 0px;"]) /* line 126 */ ?>

                        </div>
                        <div class="form-group">
                            <?php echo end($this->global->formsStack)["password"]->getControl()->addAttributes(['class' => "form-control", 'style' => "border-width: 0px; border-radius: 0px 0px 4px 4px;"]) /* line 129 */ ?>

                        </div>
                        <div class='form-group'>
                            <a href='#' class='showlostpassword' ><span class='glyphicon glyphicon-wrench'></span> <strong>Strata hesla</strong></a>
                        </div>
                        <div class="checkbox">
                            <?php echo end($this->global->formsStack)["remember"]->getControl() /* line 135 */ ?>

                        </div>
                        <div class="form-group">
                            <?php echo end($this->global->formsStack)["submit"]->getControl()->addAttributes(['class'=> "btn text-uppercase transition015slinear"]) /* line 138 */ ?>

                        </div>
                    <?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
?>

                </div>
                <div class='lostPasswordForm' style='display: none;'>
                    <?php
		/* line 143 */
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $this->global->formsStack[] = $this->global->uiControl["lostPasswordForm"], []);
?>

                        <div class='form-group' style='padding: 0px 40px;'>
                            <p>Zadajte váš e-mail a bude vám vygenerované nové heslo.</p>
                        </div>
<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('lostpasswordsnippet')) ?>"><?php
		$this->renderBlock('_lostpasswordsnippet', $this->params) ?></div>                        <div class="form-group" style="margin: 0px;">
                            <?php echo end($this->global->formsStack)["mail"]->getControl()->addAttributes(['class' => "form-control", 'style' => "border-width: 0px; border-bottom: 1px solid #ccc; border-radius: 4px 4px 0px 0px;"]) /* line 153 */ ?>

                        </div>
                        <div class='form-group'>
                            <a href='#' class='showloginform' style='margin-top: 10px; display: inline-block;'><span class='glyphicon glyphicon-chevron-left'></span> <strong>Naspäť</strong></a>
                        </div>
                        <div class="form-group">
                            <?php echo end($this->global->formsStack)["submit"]->getControl()->addAttributes(['class'=> "btn text-uppercase ajax transition015slinear"]) /* line 159 */ ?>

                        </div>
                    <?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
?>

                </div>
            </div>
        </div>
    </div>
    <div class="loginVersion">
        <p><strong>v 0.9</strong> | <a href="https://www.denevy.eu" class="normal-link">www.denevy.eu</a></p>
    </div>
</div>
      
<script type="text/javascript">
    $(window).load(function(){
        
        $("#loginFrame").fadeIn(1000);
        
    });
    
    $(function() {
    
        $(".showlostpassword").click(function() {
            $(".loginForm").hide();
            $(".lostPasswordForm").fadeIn();
        });
    
        $(".showloginform").click(function() {
            $(".lostPasswordForm").hide();
            $(".loginForm").fadeIn();
        });
    
        $(document).on("click", ".close", function() {
            
            $(this).parent().fadeOut();
            
        });
    
    });
    
</script>

</body><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 102');
		if (isset($this->params['error'])) trigger_error('Variable $error overwritten in foreach on line 123, 149');
		$this->parentName = FALSE;
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockFlashMessages($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("flashMessages", "static");
?>
<div class="flash-messages">
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>    <div  class="flash alert alert-<?php echo LR\Filters::escapeHtmlAttr($flash->type) /* line 102 */ ?> alert-dismissible text-center padd-10 border-1-sol-e6e6e6">
        <button type="button" class="close" ><span>&times;</span></button> <?php echo call_user_func($this->filters->translate, $flash->message) ?>

    </div>
<?php
			$iterations++;
		}
?>
</div>
<?php
		$this->global->snippetDriver->leave();
		
	}


	function blockLostpasswordsnippet($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("lostpasswordsnippet", "static");
		if ($form->hasErrors()) {
?>                        <ul class="errors list-unstyled"  style="padding: 15px;">
<?php
			$iterations = 0;
			foreach ($form->errors as $error) {
				?>                            <li class="alert alert-danger" style="padding: 5px; margin-bottom: 0px;"><?php
				echo call_user_func($this->filters->translate, $error) ?></li>
<?php
				$iterations++;
			}
?>
                        </ul>
<?php
		}
		$this->global->snippetDriver->leave();
		
	}

}
