
<?php if(sizeof($tenA)>0) { ?>
	
    	<h1><small>UNMA010A Report</small></h1>
    
	<pre class="tenA"><?php
		for($i=0; $i < sizeof($tenA); $i++) {
			echo $tenA[$i] . "\n";
		} ?>
	</pre>
<?php } //end if ?>
				
<?php if(sizeof($thirtyA)>0) { ?>
	
    	<h1><small>UNMA030A Report</small></h1>
  
	<pre class="thirtyA"><?php
		for($i=0; $i < sizeof($thirtyA); $i++) {
			echo $thirtyA[$i] . "\n";
		} ?>
	</pre>
<?php } //end if ?>