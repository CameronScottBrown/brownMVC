<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<p>This is a custom PHP framework using the MVC design pattern.</p>
<p>Created by Cameron Brown, the framework was inspired and adapted from the <a href="https://github.com/bradtraversy">Brad Traversy's</a> TraversyMVC.</p>

<h3>How To Use:</h3>
<p>Assuming you are viewing this page through an Apache Desktop Server such as XAMPP, here is how to start customizing this framework.</p>

<ol>
  <li>rename main folder for your project (ex. '<span style="color:purple;">MyProject</span>')</li>
  <li>use PHPMyAdmin (through your localhost dashboard) to create a database (ex. <span style="color:red;">db1</span>)</li>
  <li>update the variables in the config file (<strong>'../app/config/config.php'</strong>)</li>
  <ul><li>'DBNAME' will be '<span style="color:red;">db1</span>'</li></li></ul>
  <li>update <strong>Line 4</strong> in the main htaccess file (<strong>../.htaccess'</strong>) to the following:
  <ul><li><code>RewriteBase /<span style="color:purple;">MyProject</span>/public</code></li></li></ul>
  <li>You can now begin customizing and creating your own components</li>
  <ul><li>Check out <strong>'../libraries/Database.php'</strong> for available DB methods</li></ul>
</ol>

<h4>Notes:</h4>
<ul>
  <li>Models should be written in singular form (ex. 'Post.php')</li>
  <li>More information on this particular framework can be found in Brad Traversy's Udemy Course on <a href="https://www.udemy.com/object-oriented-php-mvc/">Object Oriented PHP</a></li>
  <li>For mere presentation purposes, the header and footer (<strong>'../views/inc/'</strong>) files contain external links to the <a href="https://www.bootstrapcdn.com/">Bootstrap 4 CDN</a> CSS and JS</li>
</ul>

<?php require APPROOT . '/views/inc/footer.php'; ?>