<h3>WP-Migrate Help</h3>


<h4>Database Connection Problems</h4>

<p>If you are having trouble connecting to your database, first check that you are using the correct credentials. Your database hosting provider also may not allow <em>remote connections</em> to the server and would have to add your current server's IP address (<strong><?php echo $_SERVER['SERVER_ADDR']; ?></strong>).</p>

<h4>Possible Migration Issues</h4>

<p>WordPress and some plugins store the path of your files on the server. When you move to a new server that path may change. If a plugin appears to be broken or not working, try disabling it and re-activating it and see if that helps. Since all plugins are different there is the possibility you will have to move this information over manually.</p>

<p>Some hosts allow you to create new databases with the username/password provided. Most likely though if you are on a shared host (such as <a href="http://secure.hostgator.com/~affiliat/cgi-bin/affiliates/clickthru.cgi?id=riddlebros-">Host Gator</a>) you will need to create the target database first, and then run this plugin.</p>


<h4>What do I do after using this plugin?</h4>

<p>You will still need to FTP your WordPress site files to your new server, and set up the new domain/DNS. In the future we hope to have an FTP deployment option as well.</p>

<h4>I love this plugin, how can I show my appreciation?</h4>

<p><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="JMGRBJA2JSVA8">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form></p>