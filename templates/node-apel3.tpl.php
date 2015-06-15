<?php

	if (isset($_GET['email']) && isset($_GET['newsletter']) && valid_mail($_GET['email']) && $_GET['newsletter'] == 'true')
	{
		if (isset($welcome_mail_id))
		{
			send_welcome_mail($_GET['email'], $welcome_mail_id);
		}
	}
	
	function validate_emails($emails)
	{
		$mails = explode(',', $emails);
		foreach($mails as $mail)
		{
			if(!valid_mail($mail))
			{
				return false;
			}
			return true;
		}
	}
	
	if (!empty($_POST))
	{
		if (!isset($_POST['mail']) || !isset($_POST['to']) || !isset($_POST['message']))
		{
			echo error_message(t('Please, fill all the fields marqued by the star.'));
		}
		elseif (!valid_mail($_POST['mail']) || !validate_emails($_POST['to']))
		{
			echo error_message(t('Please, enter a valid e-mail adress.'));
		}
		else
		{
			$message = array
			(
				'to' => $_POST['to'],
				'subject' => t('Make fruit fair'),
				'body' => $_POST['message'],
				'headers' => array
				(
					'From' => $_POST['mail'],
					'MIME-Version' => '1.0',
					'Content-Type' => 'text/plain; charset=UTF-8',
					'Content-Transfer-Encoding' => '8Bit',	
					'X-Mailer' => 'Drupal',		
				),
			);

			if (drupal_mail_send($message))
			{
				echo ok_message(t('Thank you!'));
				unset($_POST);
			}
			else
			{
				echo error_message(t('We were not able to deliver your e-mail. Please try again.'));
			}	
		}
	}
?>
    <h1><?= $title ?></h1>
      <div class="intro">
        <p><?= $node->field_intro[0]['safe'] ?></p>        
      </div>
      <?= $node->content['body']['#value'] ?>

      <div class="clr mBot">
		<div class="three">
          <h2><?= t('Follow us!') ?></h2>
          <?php include('_facebook_without_articles.tpl.php');?>
        </div>
        
        <div class="three">
          <h2>&nbsp;</h2>

          <script src="http://widgets.twimg.com/j/2/widget.js"></script>
          <script>
          new TWTR.Widget({
            version: 2,
            type: 'profile',
            rpp: 3,
            interval: 30000,
            width: 280,
            height: 300,
            theme: {
              shell: {
                background: '#333333',
                color: '#ffffff'
              },
              tweets: {
                background: '#000000',
                color: '#ffffff',
                links: '#fecb00'
              }
            },
            features: {
              scrollbar: false,
              loop: false,
              live: false,
              behavior: 'all'
            }
          }).render().setUser('<?php echo $twitter_user ?>').start();
          </script>

        </div>		  
        <div class="three l threex">
	
          <h2><?= t('Tell your friends about this urgent action!') ?></h2>
          <form action="/<?=$node->path?>" method="post">
            <div class="form">
              <div>
                <label for="apel1"><?= t('Your email address') ?> <span class="form-required">*</span></label>
                <input type="text" name="mail" id="apel1" class="text required" value="<?= isset($_POST['mail']) ? $_POST['mail'] : ((isset($_GET['email'])) ? $_GET['email'] : '') ?>" />
              </div>
              <div>
                <label for="apel3b"><?= t('The email addresses of your friends (seperated by commas)') ?> <span class="form-required">*</span></label>
                <input type="text" name="to" id="apel3b" class="text required" value="<?= isset($_POST['to']) ? $_POST['to'] : '' ?>"/>
              </div>
              <div>
                <label for="apel1a"><?= t('Your message') ?> <span class="form-required">*</span></label>
                <textarea id="apel1a" name="message"><?= isset($_POST['message']) ? $_POST['message'] : $node->field_message[0]['safe'] ?></textarea>
              </div>
              <div>
                <input type="submit" value="<?= t('Send message') ?>" class="sub" />
              </div>
            </div>
          </form>

        </div>		  
      </div>

	<div>
	        <h2><?=t('Subscribe to the newsletter')?></h2>

          <div class="search search2">
          <?= $subscription_form ?>
          </div>
          <h3><?=t('What does the newsletter contain?')?></h3>
          <ul class="plus">
            <?= $node->field_newsletter[0]['safe']?>
          </ul>
		  
    </div>
