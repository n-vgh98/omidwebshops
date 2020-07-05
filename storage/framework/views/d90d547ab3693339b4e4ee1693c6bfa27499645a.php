
<html>

<body>
	<h1>Hello <?php echo e($name); ?></h1>
    <!--  escape htmlspecial character function -->
  <h2>  Hello, <?php echo $name; ?>. </h2>
     <h1>   Hello {{$name}}</h1>
     <p>
     	
		    <div class="container">
		        Hello, {{ name }}.
		    </div>
		
     </p>


<?php

	for($i =1;$i<10;$i++)
		echo $i;
?>
</body>
</html><?php /**PATH F:\xampp\htdocs\L\laravel-6\resources\views/greething.blade.php ENDPATH**/ ?>