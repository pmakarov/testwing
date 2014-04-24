<?php
echo $this -> Html -> css('custom-theme/jquery-ui-1.10.0.custom.css');
echo $this -> Html -> css('datepicker.css');
echo $this -> Html -> css('bootstrap-timepicker.css');
echo $this -> Html -> css('select2.css');
echo $this -> Html -> css('timepicker.css');

echo $this -> Html -> script('jquery-ui-1.10.0.custom.min.js');
echo $this -> Html -> script('bootstrap-typeahead.js');
echo $this -> Html -> script('select2.js');
echo $this -> Html -> script('bootstrap-datepicker.js');
echo $this -> Html -> script('bootstrap-timepicker.js');
?>
<style>
.truncate {
  width: 250px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
<div class="reports form">
<div class="wrapper">
<div class="">

  <div class="row-fluid">
    <div class="span12">
      <div class="critterWell" id="formContainer">
        <div id="mainForm"> 
        	<div id="successBox" class="alert alert-success">
        		<button type="button" onclick="javascript:dismissSuccess();" class="close" data-dismiss="alert">&times;</button>
			    <h4>Success!</h4>
			    <div id="successTextContainer"></div>     
			   
			   </div>
              <div id="warnBox" class="alert alert-block">
			    <button type="button" onclick="javascript:dismissWarning();" class="close" data-dismiss="alert">&times;</button>
			    <p>
			    <h4>Warning!</h4>&nbsp;<br/>
			   	</p>
			    <div id="warningTextContainer"></div>
			    <div><a href="javascript:dismissWarning();" class="btn">Dismiss</a></div>      
			  </div>
			   <div id="errorBox" class="alert alert-error">
			    
			    <h4>Error!</h4>
			    <div id="errorTextContainer"></div>     
			   
			   </div>
			  
          <!-- #first_step -->
          <div id="first_step" >
         
            <h3>My Dashboard:</h3>
            <div class="row-fluid">
               <div class="span6">
                <div class="control-group">
                  <label class="control-label">Actions:</label>
                  <div class="controls">
				  	<?php 
				  	
				  		echo $this->Html->link('upload', array('controller' => 'uploads', 'action' => 'add'));
				  	?>
                  </div>
                </div></div>
              <!--/span-->
				<div class="span6 pull-right">
                <div class="control-group pull-right">
                  <label class="control-label">Today's Date:</label>
                  <div class="controls">
                    
                      <?php 
                     		/**
							 * Timezone Test Case 
							 * 
							 * @User.timezone = the user's timezone at the time of login
							 * meant to help offset a users' time issues depending on whhat timezone they are in.
							 */
					  		
                      		$offset = $this->Session->read('User.time_zone');
							//echo $offset ."<br/>";
							//$tz = timezone_name_from_abbr(null, $offset * 3600, true);
							//if($tz === false) $tz = timezone_name_from_abbr(null, $offset * 3600, false);
							//echo $tz . "<br/>";
							$a = getdate();
							//echo $this->Time->format('F jS, Y h:i A', "{$a['hours']}:{$a['minutes']}", null, $offset). "<br/>";
							echo $this->Time->format('F jS, Y', "{$a['hours']}:{$a['minutes']}", null, $offset). "<br/>";
							//echo  "{$a['hours']}:{$a['minutes']} <br/>";
							//printf('%s %d, %d',$a['month'],$a['mday'],$a['year']);
							
							//echo "<br/>" . $this->Form->input('time_zone', array('empty'=>'Choose One', 'required'=>'true', 'type'=>'select', 'style'=>'width:300px','type'=>'select', 'label'=>false, 'options'=> DateTimeZone::listIdentifiers(), 'default' => 'America/New_York'));
                      ?>
                     
                      <!--<span class="add-on"><i class="icon-th"></i></span> </> -->
                  </div>
                </div>
              </div>
            </div>
            <!--/row -->
            
    <div class="row-fluid">
    	 <div class="uploads index">
			   
			<legend><?php echo __('Uploads');
					//debug($uploads);
			 ?></legend>
			<table id="uploadTable" class="table table-striped table-condensed">
			<tr>
					<th><?php echo $this->Paginator->sort('title'); ?></th>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('window'); ?></th>
					<th><?php echo $this->Paginator->sort('customer_id'); ?></th>
					<th><?php echo $this->Paginator->sort('edi_type_id'); ?></th>
					<!-- <th><?php echo $this->Paginator->sort('filepath'); ?></th> -->
					<th><?php echo $this->Paginator->sort('filename'); ?></th>
		
			</tr>
			<?php foreach ($uploads as $upload): ?>
			<tr id="<?php echo $upload['Upload']['id']; ?>" >
				<td><?php echo h($upload['Upload']['title']); ?>&nbsp;</td>
				<td><?php echo h($upload['Upload']['description']); ?>&nbsp;</td>
				<td><?php echo h($upload['Upload']['window']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($upload['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $upload['Customer']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($upload['EdiType']['name'], array('controller' => 'ediTypes', 'action' => 'view', $upload['EdiType']['id'])); ?>
				</td>
				<!-- <td class="" style="width:50px"><?php echo h($upload['Upload']['filepath']); ?>&nbsp;</td> -->
				<td><?php echo h($upload['Upload']['filename']); ?>&nbsp;</td>
			</tr>
		<?php endforeach; ?>
			</table>
			<p>
			<?php
			/*echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));*/
			?>	</p>
			<div class="pagination pagination-right">
			    <ul>
				    <?php
				    echo $this->Paginator->prev( '<<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled', 'tag' => 'li' ) );
				    echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a' ) );
				    echo $this->Paginator->next( '>>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled', 'tag' => 'li' ) );
				    ?>
			    </ul>
		    </div>
			<!-- <div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div> -->
		</div>
	</div>
<div class="row-fluid" id="reportGridRow">
<div class="span12 well" id="reportGridContainer" >
	    <div class="navbar">
              <div class="navbar-inner">
                <div class="container">
                	
                  <a class="brand" data-toggle="dropdown" href="#">Transactions</a>
				 
              	<!--<form class="navbar-search pull-right">
			      		<input type="text" placeholder="Search" class="search-query">
			      	</form> -->
             
                </div>
              </div><!-- /navbar-inner -->
        </div>
	<div class="row-fluid">
		<div id="actionBar" class="nav" >
               <div style="margin: 0;" class="btn-toolbar">
               
              <div id="actionButtons" class="btn-group pull-right">
                <button id="tagBtn" class="btn" data-toggle="tooltip" title="Add Tag"><span class="icon-tag"></span></button>
                <button id="deleteBtn" class="btn" data-toggle="tooltip" title="Delete"><span class="icon-trash"></span></button>
                <button id="printBtn" class="btn" data-toggle="tooltip"  title="Print" formtarget="_blank" ><span class="icon-print"></span></button>
                <button id="emailBtn" class="btn" data-toggle="tooltip"  title="Email"><span class="icon-envelope"></span></button>
              </div>
               <div class="btn-group">
               	<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<span class="icon-check">&nbsp;</span>
					<span class="caret"></span>
				</a>
					<ul class="dropdown-menu">
						<li><a href="javascript:selectAll()">All</a></li>
						<li><a href="javascript:deSelectAll()">None</a></li>
						<li><a href="#">Absent</a></li>
					   	<li><a href="javascript:selectDrafts()">Draft</a></li>
					   	<li><a href="javascript:selectFinalized()">Finalized</a></li>
					   	<li><a href="javascript:selectSent()">Sent</a></li>
					</ul>
              </div>
               <div class="btn-group">
                 <button id="refreshReports" class="btn" data-toggle="tooltip"  title="Refresh"><span class="icon-refresh"></span></button>
              </div>
              
            </div>
		</div>
	</div>
	<div class="row-fluid">
	<table id="transactionTable" cellpadding="0" cellspacing="0" class="table table-striped">
	</table>
	<!-- <div class="row-fluid">
		<div id="actionBar" class="nav" >
               <div style="margin: 0;" class="btn-toolbar">
               
              <div id="actionButtons" class="btn-group pull-right">
                <button id="tagBtn" class="btn" data-toggle="tooltip"><span class="icon-tag"></span></button>
                <button id="absentBtn" class="btn" data-toggle="tooltip"><span class="icon-remove"></span></button>
                <button id="clearBtn" class="btn" data-toggle="tooltip"><span class="icon-minus-sign"></span></button>
                <button id="deleteBtn" class="btn" data-toggle="tooltip"><span class="icon-trash"></span></button>
                <button id="printBtn" class="btn" data-toggle="tooltip"  title="Print" formtarget="_blank" ><span class="icon-print"></span></button>
                <button id="emailBtn" class="btn" data-toggle="tooltip"  title="Email"><span class="icon-envelope"></span></button>
              </div>
	</div>-->
	</div>
</div>
</div>
           </div>
            </div>
          </div>
          </div>
         
        </div><!--/end container Div -->
      </div><!--/end Wrapper Div -->
      <!-- Modal -->
    <div id="myModal" class="modal custom hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Search and Replace Builder</h3>
    </div>
    <div class="modal-body">
    	<div id="modalWarnBox" class="alert alert-error hide">
    		<button type="button" class="close" onclick="javascript:modalDismissWarning();" >&times;</button>
			
    		    <p>
			    <h4>Missing Fields</h4>
			    </p>
			    <div id="modalWarningTextContainer"></div>     
		</div>
		<div class="row-fluid">
			<div class="span6">
				<label class="control-label">Status:</label>
    			<div class="control-group">
    				<?php
					echo '<div id="transaction_status" class="input">' . $this->Form->input('transaction_status_id', array('empty'=>'Choose One', 'required'=>'true', 'type'=>'select', 'style'=>'width:300px','type'=>'select', 'label'=>false, 'options'=> $transaction_statuses)) .
						'</div>';	
					?> 
    			</div>
    			
    			<?php
    					
    					/*echo '<div id="rejection_select" style="display:none">';
    					echo '<label class="control-label">Reason for Rejection:</label>';
    					echo '<div class="control-group">';
    					echo '<div id="transaction_rejection_types" class="input">' . $this->Form->input('transaction_rejection_types_id', array('empty'=>'Choose One', 'required'=>'true', 'type'=>'select', 'style'=>'width:300px','type'=>'select', 'label'=>false, 'options'=> $transaction_rejection_types));
						echo '</div>'; // end of div input
						echo '</div>'; // end of div control group
						echo '</div>'; //end of div span6 
						 */
						
					?>
				<div id="rejection_description" style="display:none;">
			 		<label class="control-label">Justification for Rejection:</label>
			 		<div class="control-group">
			 			<div class="input">
			 				<textarea id="rejection_text" style="width:98%; height:100px; color:#000000;"></textarea>
			 			</div>
			 		</div>
		 		</div>   
			</div>
			<div class="span6">
    			<!-- <div id="transaction_comment">
			 		<label class="control-label">Transaction Comment:</label>
			 		<div class="control-group">
			 			<div class="input">
			 				<textarea id="comment_text"  style="width:98%; height:100px; color:#000000;"></textarea>
			 			</div>
			 		</div> -->
		 		</div>
		 </div><!-- end row -->
		 <div class="row-fliud">
		 	<div class="">
		 		<label class="control-label">Notes</label>
	    		<table id="noteTable" class="table">
	    			<tr>
	    				<td></td>
	    			</tr>
	    		</table>
	    		<div id="two" style="display:none;">
	    			<div class="row-fluid">
	    				<div class="span6">
	    					
	    				</div>
	    				<div class="span6">
	    					<div class="nav" id="actionBar">
	               <div class="btn-toolbar" style="margin: 0;">
	               	<div class="btn-group pull-right" >
	               		<a id="status-toggle" class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="icon-flag">&nbsp;</span>
							<span class="caret"></span>
						</a>
							<ul class="dropdown-menu">
								<li><a href="#">N/A</a></li>
								<li><a href="#">USER</a></li>
								<li><a href="#">MOCAS</a></li>
								<li><a href="#">MAP</a></li>
							   	<li><a href="#">KNOWN ISSUE</a></li>
							   	<li><a href="#">TEST BED</a></li>
							   	<li><a href="#">REPORT</a></li>
							   	<li><a href="#">DATA</a></li>
							</ul>
	               	</div>
		               	<div class="btn-group">
		               		<a href="#" class="btn" id="noteBackBtn"><span class="icon-arrow-left"></span></a>	
		              	</div> 
			        </div>
					</div>
					<div class="row-fluid" id="issueRow" style="display:none">
						<div class="span6 headerDivider">
							<label class="control-label">Type:</label>
			 				<div class="control-group" id="commentTypeLabel">
			 					N/A
			 				</div>
						</div>
						<div class="span6">
							<label class="control-label">Issue:</label>
							<div class="control-group" id="knownIssueLabel">
			 					N/A
			 				</div>
			 				<label class="control-label">Primary:</label>
							<div class="control-group">
			 					<input type="checkbox" name="primary" id="primaryCheckBox" />
			 				</div>
						</div>
					</div>
					<div class="row-fluid">
				  <label class="control-label">Comment:</label>
			 		<div class="control-group">
			 			<div class="input">
			 				<textarea id="note_text"  style="width:98%; height:100px; color:#000000;"></textarea>
			 			</div>
			 		</div>
			 		</div>
			 		<div class="footer pull-right">
				    	<button class="btn btn-primary" id="saveBtn">Save</button>
				    </div>
	    				</div>
	    			</div>
	    			
				 	
		 		</div>
			</div> <!-- end  -->
    		</div><!--end row -->		 		 		
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <!--<button class="btn btn-primary" id="saveBtn">Save</button> -->
    </div>
    </div>
      <div id="spinner" class="spinner" style="display:none;">
		<img id="img-spinner" src="../img/spinner.gif" alt="Loading"/>
		Loading...
	  </div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
//initialize variables from PHPs

var action = "";

var warn = true;
var isValid = false;
var _STATUS = "DRAFT"; //DRAFT / SUBMITTED / SENT
var _REPORT_ID = "";

var _transactions = Array();
var _currentBatch_id;
var currentTransaction;
var currentRejection;
var currentUpload;
var currentNote;
var currentSet; //holds the transaction Root Object that points to Transaction, Upload, and Comment

	$(document).ready(function(){
		
						
					$("#uploadTable td").click(function(evt){
						console.log($(evt.target).parent().get(0).id);
						if($(evt.target).parent().get(0).id!="") {
							var id = $(evt.target).parent().get(0).id;
							_currentBatch_id = id;
							getTransactionsByUploadId(id);
						}
					});
			        	$("#transaction_status_id").select2().select2("val", 0);
			        	$("#transaction_status_id").on('change', function() { 
							//console.log($(this).val());
							
							if(parseInt($(this).val()) === 2) {
								$("#rejection_select").show();
								$("#rejection_select").attr('required', 'true');
							} else {
								$("#rejection_select").attr('required', 'false');
								$("#rejection_select").hide();
								$("#transaction_rejection_types_id").select2("val",0);
								$("#rejection_text").hide();
								$("#rejection_text").val("");
								$("#rejection_description").hide();
							}
							updateTransactionStatusByTransactionId();
						});
						
						$("#transaction_rejection_types_id").select2().select2("val", 0);
			        	/*$("#transaction_rejection_types_id").select2({
						    //formatResult: format,
						    //formatSelection: format,
						    //escapeMarkup: function(m) { return m; }
						    });
			        	*/
   
  
			        	$("#transaction_rejection_types_id").on('change', function(){
			        		//console.log(parseInt($(this).val()));
			        		if($(this).val() !== "") {
			        			$("#rejection_text").attr('required', 'true');
								$("#rejection_text").show();
								$("#rejection_description").show();
								$("#rejection_text").removeAttr('readonly');
							} else {
								$("#rejection_text").attr('required', 'false');
								$("#rejection_text").hide();
								$("#rejection_description").hide();
							}
			        	});
			        	
			        	$("#successBox").hide();
			        	 $("#warnBox").hide();
			        	 $("#errorBox").hide();
			        	// $('#datepicker').datepicker('setValue', d);
			        	var tz = "GMT " + -new Date().getTimezoneOffset()/60;
			        	/*
			        	$("#datetimezone").text(tz);
							console.log("Selected value is: "+ $("#time_zone option:selected").text()); 
							$("#time_zone").select2({ 
			        	   			        		}).select2("val" , 151); 
			        	
			        	*/
			        	$("#tagInputBtn").click(function(){
							//console.log("here?");
							updateTagData();
						});
			        	
			        	
			        	$("#refreshReports").click(function(){
			        		
			        		getReportsByRoom();
			        	});
			        
			        	$("#refreshReports").tooltip({
			        	
			        	});
	
						$("#printBtn").click(function(){
							
							doPrintSelected();
						});
						$("#printBtn").tooltip();
						
						$("#emailBtn").bind('click', doEmailSelected);
							
							
						$("#emailBtn").tooltip();
						
						
						
						$("#tagBtn").click(function(){
							
							doTagSelected();
						});
						$("#tagBtn").tooltip();
						
						
						$("#deleteBtn").click(function(){
							
							doDeleteSelected();
						});
						$("#deleteBtn").tooltip();
	
						$("#saveBtn").click(function(e){
							//commented out form validation for now 8/24/14
    						//validateForm();
    						
    						console.log("note text: " +$("#note_text").val());
    						console.log("issue: " + $("#knownIssueLabel").text());
    						console.log("type: " + $("#commentTypeLabel").text());
    						console.log("current transaction: " + currentTransaction.name);
    						//setCommentDataByTransactionId();
    						
    					});
    					
    					$("#rejection_select").hide();
								$("#transaction_rejection_types_id").select2("val",0);
								$("#rejection_text").hide();
								$("#rejection_text").val("");
								$("#rejection_description").hide();
								
						$("#noteBackBtn").click(function(e){
							$("#noteTable, #two").toggle("slide", 250);
						});
						 
					var num = null;
					$(".btn-group .dropdown-menu li a").on("click", function(){
					    //console.log("Value is " + $(this).text());
					    $("#knownIssueLabel").text($(this).text());
					    if($(this).text()!== "N/A") {
					    	
					    	$("#issueRow").show();
					    	$("#commentTypeLabel").text("ERROR");
					    }
					    else {
					    	$("#issueRow").hide();
					    	$("#commentTypeLabel").text("N/A");
					    }
					});
							
						
	 	
	 	$("#uploadTable tr").not(':first').hover(
			function () {
			
				$(this).addClass("highlight");
			}, 
			function () {
				$(this).removeClass("highlight");
			}
		);
						
						$(".alert").alert();
					
	});
	
function format(state) {
    if (!state.id) return state.text; // optgroup
    return "<div class="+ state.text.toLowerCase() +">&nbsp;&nbsp;&nbsp;</div>" + state.text;
}
function dismissSuccess(){
	//console.log("dismissWarning called");
	$("#successTextContainer").html("");
	$("#successBox").hide();
	warn = false;
}
	
function dismissWarning(){
	//console.log("dismissWarning called");
	$("#warningTextContainer").html("");
	$("#warnBox").hide();
	warn = false;
}
function modalDismissWarning(){
	    console.log("modalDismissWarning called");
	    $("#modalWarningTextContainer").html("");
	    $("#modalWarnBox").hide();
	    warn = false;
	}

/**
 * getTransactionsByUploadId 
 */
function getTransactionsByUploadId(id) {
	
	$("#spinner").show();
	
	var msg = {
		"id" : id
	};
	 $.ajax({
	 	type: "POST",
	 	async: false,
	 	data: JSON.stringify(msg),
	 	dataType: "JSON",
	 	url: '../transactions/get_transactions_by_upload_id',
	 	beforeSend: function(x) {
	 		if (x && x.overrideMimeType) {
	 			x.overrideMimeType("application/j-son;charset=UTF-8");
	 		}
	 	},
	 	success: function(result) {
	 		console.log("Transactions Received! for user: " + result.userId);
	 		_transactions = result.transactions;
	 		buildTransactionGrid(result.transactions)
	 	 	$("#spinner").hide();
		},
		error: function (request, status, error) {
	 		   		alert(status + " : " + error);
					$("#spinner").hide();
	 	}
	 	 
	});

	
}
//  ========== 
//  = Set Room = 
//  ========== 
function setRoom(room){
	//console.log(room);
	var ul = (room != null || room != 'Choose One') ? room : "Blue";
	/*switch(ul)
	{
		case "Blue":
		ul = 1;
		break;
		
		case "Purple":
		ul = 2;
		break;
		
		case "Yellow":
		ul = 3;
		break;
		
		default:
		break;
	}*/
	var msg = {
		"location" : ul
	};
	 $.ajax({
	 	type: "POST",
	 	async: false,
	 	data: JSON.stringify(msg),
	 	dataType: "JSON",
	 	url: '../users/set_location',
	 	beforeSend: function(x) {
	 		if (x && x.overrideMimeType) {
	 			x.overrideMimeType("application/j-son;charset=UTF-8");
	 		}
	 	},
	 	success: function(result) {
	 		//console.log("location: was successfully submitted by: " + result.userId);
			userLocation = room;
			//console.log(userLocation + " after set_location");
			/*$("#room_id").select2({ 
				disabled:true,
				}).select2("disable"); */
			$("#room_id").popover("destroy");	
	 	 	$("#spinner").hide();
			
			//get report list by room filter by today's date
			getReportsByRoom();
		},
		error: function (request, status, error) {
	 		   		alert(status + " : " + error);
					$("#spinner").hide();
	 		    }
	 	    });
}

function getReportsByRoom(date){
	$("#spinner").show();
	
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();
	var hour = d.getHours();
	var minute = d.getMinutes();
	var second = d.getSeconds();
	
	var output = d.getFullYear() + '-' +
	    ((''+month).length<2 ? '0' : '') + month + '-' +
	    ((''+day).length<2 ? '0' : '') + day;
	    
	    /* full date string to match PHP
	    var output = d.getFullYear() + '-' +
	    ((''+month).length<2 ? '0' : '') + month + '-' +
	    ((''+day).length<2 ? '0' : '') + day + ' ' +
	    ((''+hour).length<2 ? '0' :'') + hour + ':' +
	    ((''+minute).length<2 ? '0' :'') + minute + ':' +
	    ((''+second).length<2 ? '0' :'') + second; */
	   //console.log(userLocation);
	    var hack = 0;
	    switch(userLocation){
	    	case "Blue":
	    	hack = 1;
	    	break;
	    	
	    	case "Purple":
	    	hack = 2;
	    	break;
	    	
	    	case "Yellow":
	    	hack = 3;
	    	break;
	    	
	    	default:
	    	break;
	    }
	var ul = (date != null) ? date : output ;
	
	var msg = {
		"date" : ul,
		"room" : hack
	};
	
	// console.log(msg["room"] + " is teh value for room after local conversion");
	 $.ajax({
			  type: "POST",
			  async: false,
			  data: JSON.stringify(msg),
			  dataType: "JSON",
			  url: '../reports/get_reports',
			  beforeSend: function(x) {
				  if (x && x.overrideMimeType) {
					  x.overrideMimeType("application/j-son;charset=UTF-8");
				  }
			  },
			  success: function(result) {
				 // console.log("report list generated: was successfully generated: " + result.success);
				//console.log(result.reports)
				//console.log(result.reports.count);
				 obj = $.parseJSON(result.reports);
				//console.log(obj.length);
				buildReportGrid(obj);
				 $("#spinner").hide();
				
			 },
			 error: function (request, status, error) {
							 alert(status + " : " + error);
						 $("#spinner").hide();
					  }
				  });
		
	 
}

function buildNoteTable(id){
	//console.log("build note table: " + id);
	$("#noteTable").html("");
	$("#noteTable").append("<tr><th></th><td><strong>Type</strong></td><td><strong>Text</strong></td><td><strong class='pull-right'></strong></td><td></td></tr>");
	var reports;
	for(var i=0; i < _transactions.length; i++) {
		if(id == _transactions[i].Transaction.id)
		{
			//console.log(id + " == " + _transactions[i].Transaction.id );
			currentUpload = _transactions[i].Upload;
			currentTransaction  = _transactions[i].Transaction;
			//console.log( _transactions[i]);
			currentRejection = _transactions[i].TransactionRejection;
			reports = _transactions[i].Comment;
			currentSet = _transactions[i];
		}
	}
	
	//console.log(currentRejection);
	var index = currentRejection.length-1;
	if(currentRejection.length>0) {
		//console.log("had a rejection note");
		$("#rejection_text").val(currentRejection[index].text);
		$("#rejection_text").attr('readonly','readonly');
		$("#transaction_rejection_types_id").select2("val",currentRejection[index].transaction_rejection_type_id);
		$("#rejection_select").show();
		$("#rejection_description").show();
		$("#rejection_text").show();
	} else {
		$("#rejection_text").val("");
		$("#rejection_text").removeAttr('readonly');
		$("#transaction_rejection_types_id").select2("val","");
		$("#rejection_select").hide();
		$("#rejection_description").hide();
		$("#rejection_text").hide();
	}
	
	$.each(reports, function(i, item) {
    	//console.log(reports[i].status);
    	$("#noteTable").append(
    		"<tr id="+reports[i].id+"><th width='14'><div style='float:left;margin:0;vertical-align: middle;'>" +
    		"<input  style='margin:0;vertical-align:middle;' type='checkbox' name='"+reports[i].id+"' value=''></div></th>" + 
    		"<td>" + commentType(reports[i].comment_type_id) + "</td><td>" + 
    		handleCommentText(reports[i].text) +"</td><td><div class='pull-right'></div></td><td><span class='icon-chevron-right pull-right'></span></td></tr>");
	});
	
	$("#noteTable td").click(function(evt){
		//console.log($(evt.target).parent().get(0).id);
		if($(evt.target).parent().get(0).id!="") {
			var id = parseInt($(evt.target).parent().get(0).id);
			var index = $(evt.target).parent().index()-1;
			//window.location.href = "../comments/edit/" + $(evt.target).parent().attr("id");
			//window.location.href = "../reports/edit/" + this.id;
			//$("#noteTable").hide("slide", { direction: "left" }, 1000);
			// $("#noteTable").toggle("slide");
			 $("#noteTable, #two").toggle("slide", 250, function(e){
			 	var elem = $(this).attr("id");
			 	if(elem === "noteTable") {
			 		var commentObj = reports[index];
			 		currentNote = reports[index];
			 		var tmp = commentObj.text.split(":");
			 		var textAll = "";
			 		console.log(commentObj.text);
			 		if(tmp[0] === "Reveal reports") {
			 			textAll = "Reveal reports Error: " + tmp[1];
			 			$("#note_text").val(textAll);
			 		}
			 		else {
			 			$("#note_text").val(commentObj.text);
			 		}
			 		
			 		var issue = commentObj.transaction_rejection_id;
			 		var issueText;
			 		
					switch(issue) {
						case "0":
						issueText = "N/A";
						break;
						
						case "1":
						issueText="USER";
						break;
						
						case "2":
						issueText = "MOCAS";
						break;
						
						case "3":
						issueText = "MAP";
						break;
						
						case "4":
						issueText="KNOWN ISSUE";
						break;
						
						case "5":
						issueText = "TEST BED";
						break;
						
						case "6":
						issueText = "REPORT";
						break;
						
						case "7" :
						issueText = "DATA";
						break;
						
						default:
						issueText = "N/A";
						break;
					}
					
						console.log(issueText);
			 		 $("#knownIssueLabel").text(issueText);
					    if(issueText!== "N/A") {
					    	
					    	$("#issueRow").show();
					    	$("#commentTypeLabel").text("ERROR");
					    }
					    else {
					    	$("#issueRow").hide();
					    	$("#commentTypeLabel").text("N/A");
					    }
			 	}
			 	else {
			 		console.log("BANG!");
			 	}
			 	
			 });
			
		}
		
	});
	
	$('#noteTable').find('input:checkbox').click(function(){
		//console.log($(this).val());
		handleActionBar();
	});
	
	$("#noteTable tr").not(':first').hover(
			function () {
				$(this).addClass("highlight");
			}, 
			function () {
				$(this).removeClass("highlight");
			}
		);
		
		//TODO: initialize actionBar buttons, set visible to false. code logic to activate/deactivate accordingly
		//$("#print").parent().addClass('disabled');
		//$("#actionBar li").hide();
		disableAllActions();
	
}

 function buildTransactionGrid(transactions){
	var DS = "<?php echo str_replace(array("\\"), "\\\\", DS) ; ?>";
	//if(DS ==="\\")
	$("#transactionTable").html("");
	$("#transactionTable").append("<tr><th><!-- empty --></th>" +
	"<td><strong>Name</strong></td>" +
	"<td><strong>XML</strong></td>" +
	"<td><strong class=''>EDI</strong></td>"+
	"<td><strong class=''>UDF</strong></td>"+
	"<td><strong class=''>Status</strong></td>"+
	"<td><strong>Notes</strong></td>" +
	"<td></td></tr>");
	
	$.each(transactions, function(i, item) {
    	//console.log(reports[i].status);
    	$("#transactionTable").append("<tr id="+transactions[i].Transaction.id+"><th width='14'><div style='float:left;margin:0;vertical-align: middle;'>" +
    	"<input  style='margin:0;vertical-align:middle;' type='checkbox' name='"+transactions[i].Transaction.id+"' value='"+transactions[i].Transaction.id+"'></div></th>" +
    	"<td>" + transactions[i].Transaction.name + "</td>" +
    	"<td><a href='"+transactions[i].Upload.filepath + DS+ transactions[i].Transaction.xmlfile +"'>xml</a></td>" +
    	"<td><a href='"+transactions[i].Upload.filepath + DS+ transactions[i].Transaction.edifile +"'>edi</a></td>" +
    	"<td><a href='"+transactions[i].Upload.filepath + DS+ transactions[i].Transaction.udffile +"'>udf</a></td>" +
    	"<td style='display:none'>" + transactions[i].Transaction.transaction_status_id + "</td>" + 
    	"<td>"+ transactionStatusSelect(transactions[i].Transaction.transaction_status_id) +"</td>" +
    	"<td>" +transactionCommentNumber(transactions[i].Comment.length) +"</td>"+
    	"<td><span class='icon-chevron-right pull-right'></span></td></tr>");
	});
	$("#transactionTable td").click(function(evt){
		//console.log($(evt.target).parent().get(0).id);
		if($(evt.target).parent().get(0).id!=""){
			var id = parseInt($(evt.target).parent().get(0).id);
			var humanReadable = $(evt.target).parent().find("td").eq(0).text();
			humanReadable = humanReadable.substr(0,6) + "-" + humanReadable.substr(6,2) + "-" + humanReadable.substr(8,1) + "-" + humanReadable.substr(9,4) + "-" + humanReadable.substr(13);
			$("#myModalLabel").text("Edit: " + humanReadable);
			buildNoteTable(id);
			$("#transaction_status_id").select2("val", $(evt.target).parent().find("td").eq(4).text() );
			$("#myModal").modal("show");						
		}
	});
	
	$('#transactionTable').find('input:checkbox').click(function(){
		//console.log($(this).val());
		handleActionBar();
	});
	
	$("#transactionTable tr").not(':first').hover(
			function () {
				$(this).addClass("highlight");
			}, 
			function () {
				$(this).removeClass("highlight");
			}
		);
		
		//TODO: initialize actionBar buttons, set visible to false. code logic to activate/deactivate accordingly
		//$("#print").parent().addClass('disabled');
		//$("#actionBar li").hide();
		//disableAllActions();
	
}
function handleCommentText(text) {
	
	//create hyperlink out of comment text:
	var tmp = text.split(":");
	//console.log(currentTransaction.name);
	//console.log(tmp[1]);
	
	if(tmp[0]==="Reveal reports") {
		//console.log('<a href="javascript:revealReader('+ currentTransaction.name +')" target="_blank">Reveal</a>');
		console.log
		var link = '<a href="/testwing/reveal/view?folder='+ escape(currentUpload.filepath)+'&amp;id='+currentTransaction.name +'" target="_blank">Reveal</a> Error: ';
		return link + tmp[1];
	}
	return text;
	
}
function transactionStatusSelect(id) {
	
	//var tString = $("#transaction_status").clone().html();
	//return tString;
	//console.log(id);
	var statusElem = "";
	
	switch(id) {
		
		case null:
		statusElem = "<span class='label'>N/A</span>";
		break;
		
		case "1":
		statusElem = "<span class='label label-success'>Accepted</span>";
		break;
		
		case "2":
		statusElem = "<span class='label label-important'>Rejected</span>";
		break;
		
		case "3":
		statusElem = "<span class='label label-warning'>Retest</span>";
		break;
		
		default:
		
	}
	
	return statusElem;
	
}

function transactionCommentNumber(num) {
	
	if(parseInt(num)<1){
		return "";
	}
	return "<span class='badge badge-info'>" + num +"</span>";
}
function commentType(num) {
	if(num==="1") {
		return " ";
	}
	else {
		return "Error";
	}
}
function handleActionBar(){
	
	var status = "";
	var check = "";
	var cut = false;
	if($('#transactionTable th input:checked').length == 0)
	{
		disableAllActions();
	}
	else {
		$('#transactionTable').find('input:checkbox').each(function(){
			if($(this).prop("checked")){
				
				status = $(this).val();
				//console.log($(this).prop('name') + " is active");
				if(status == check || check===""){
					//console.log("all the same status");
					check = status;
				}
				else{
					enableAllButPrintEmail();
					cut = true;
					return false;
				}
			}
		});
		
		if(status == check && status != ""){
			if(status === "DRAFT"){
				enableAllButPrintEmail();
			}
			else{
				enableAllActions();
			}
		}
	
	}
	
		//console.log("All selected? " + $('#transactionTable th input:checked').length + " : " + $('#transactionTable th input').length);
		//console.log( $('#transactionTable th input:checked').length  === $('#transactionTable th input').length);
		
	/*if(status == check && status != ""){
		if(status === "DRAFT"){
			enableAllButPrintEmail();
		}
		else{
			enableAllActions();
		}
	}
	else if(cut == true){
		
	}*/
}
function enableAllButPrintEmail(){
	$("#actionButtons button").each(function(){
		//console.log($(this).prop('id') == "printBtn");
		if($(this).prop('id')== "printBtn" ||$(this).prop('id')== "emailBtn" ){
			$(this).addClass('disabled');
		}
		else{
			$(this).removeClass('disabled');
		}
	});
}
function disableAllActions(){
	$("#actionButtons button").each(function(){
		
		$(this).addClass('disabled');
	});
	$("#emailBtn").unbind('click', doEmailSelected);
}
function enableAllActions(){
	$("#actionButtons button").each(function(){
		$(this).removeClass('disabled');
	});
	$("#emailBtn").bind('click', doEmailSelected);
}
function handlePrintClick(){
	
	action = "PRINT";
	$("#actionBar").show();
   $("#transactionTable").find('div').show();
   $('#transactionTable tr').unbind('click');//(function(event){event.preventDefault();return false;});

}
function toggleSelectAll(){
	
	 var status = $('#selectAll').prop("checked") ;
	$('#transactionTable').find('input:checkbox').prop('checked', status);
	
}
function selectAll(){
	$('#transactionTable').find('input:checkbox').prop('checked', 'checked');
	handleActionBar();
}
function deSelectAll(){
	$('#transactionTable').find('input:checkbox').prop('checked', false);
	handleActionBar();	
}

function selectDrafts(){
	$('#transactionTable').find('input:checkbox[value="DRAFT"]').prop('checked', 'checked');
	handleActionBar();	
}
function selectFinalized(){
	$('#transactionTable').find('input:checkbox[value="FINALIZED"]').prop('checked', 'checked');
	handleActionBar();	
}
function selectSent(){
	$('#transactionTable').find('input:checkbox[value="SENT"]').prop('checked', 'checked');
	handleActionBar();	
}

function doPrintSelected(){
   
    var id = new Array();
    $("#transactionTable input:checked").each(function(){
        id.push($(this).prop('name'));
    });
   
    //console.log(id);
   
    var msg = {
        "reports" : id
    };
    var popup = window.open("../reports/print_reports/" + "reports:" + JSON.stringify(id) +"","_blank","toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=yes, width=1024, height=768");
    /*
   
    //console.log(JSON.stringify(msg));
    $.ajax({
              type: "POST",
              async: false,
              data: JSON.stringify(msg),
              dataType: "JSON",
              url: '../reports/print_reports',
              beforeSend: function(x) {
                  if (x && x.overrideMimeType) {
                      x.overrideMimeType("application/j-son;charset=UTF-8");
                  }
              },
              success: function(result) {
                  console.log("report " + id+ " as successfully printed: " + result.success);
           
                 $("#spinner").hide();
           
               
             },
             error: function (request, status, error) {
                             alert(status + " : " + error);
                         $("#spinner").hide();
                      }
                  });
       
        */
}

function doEmailSelected(){
	
	$("#spinner").show();
	var id = new Array();
	$("#transactionTable input:checked").each(function(){
		id.push($(this).prop('name'));
	});
	
	//console.log(id);
	
	var msg = {
		"reports" : id
	};
	//console.log(JSON.stringify(msg));
	$.ajax({
			  type: "POST",
			  async: false,
			  data: JSON.stringify(msg),
			  dataType: "JSON",
			  url: '../reports/email_reports',
			  beforeSend: function(x) {
				  if (x && x.overrideMimeType) {
					  x.overrideMimeType("application/j-son;charset=UTF-8");
				  }
			  },
			  success: function(result) {
				  //console.log("success " + result.success+ " " + result.message);
			
				 $("#spinner").hide();
				getReportsByRoom();
				
			 },
			 error: function (request, status, error) {
							 alert(status + " : " + error);
						 $("#spinner").hide();
					  }
				  });
		
}


function clearReport(id){
	$("#spinner").show();
	
	if(id==null || id === ""){
		return;
	}
	
	
	var msg = {
		"id" : ul
	};
	
	 $.ajax({
			  type: "POST",
			  async: false,
			  data: JSON.stringify(msg),
			  dataType: "JSON",
			  url: '../reports/clear_reports',
			  beforeSend: function(x) {
				  if (x && x.overrideMimeType) {
					  x.overrideMimeType("application/j-son;charset=UTF-8");
				  }
			  },
			  success: function(result) {
				  //console.log("report " + id+ " as successfully cleared: " + result.success);
			
				 $("#spinner").hide();
			
				
			 },
			 error: function (request, status, error) {
							 alert(status + " : " + error);
						 $("#spinner").hide();
					  }
				  });
		
	 
}

//  ========== 
//  = Update Tag Data = 
//  ========== 
function updateTagData(){
	
	//get teachers list from dropdown
	var tl = $("#teachersList option:selected").map(function(){return this.text});	 
	
	//get daily activities items
	var dl = $("#activityCheckboxesOneDiv label input:checked").map(function(){return this.value});
	
	activityString = dl.get().join("|");
	
	if($("#otherActivity").is(':checked')){
		var otherActString = "other::" + $("#otherTextInput").val();
		activityString = (activityString==="") ? otherActString : activityString+ "|"+otherActString;
	}
	
	//console.log($("#notes").val());
	var msg = {
			 "teachers" : tl.get().join("|"),
			 "dailyActivity" : activityString,
		 	 "teacherComments" : $("#notes").val()
		 }
		 
	 $.ajax({
	 	type: "POST",
	 	async: false,
	 	data: JSON.stringify(msg),
	 	dataType: "JSON",
	 	url: '../users/set_tag_data',
	 	beforeSend: function(x) {
	 		if (x && x.overrideMimeType) {
	 			x.overrideMimeType("application/j-son;charset=UTF-8");
	 		}
	 	},
	 	success: function(result) {
	 		//console.log(result.message);
	 	 	$("#spinner").hide();
	 	 	//c.collapse({toggle:true});
	 	 	//$("#templateContainer").collapse({toggle:true});
	 	 	var $collapse = $("#templateContainer").closest('.collapse-group').find('.collapse');
    		$("#templateContainer").collapse('toggle');
			getReportsByRoom();
		},
		error: function (request, status, error) {
	 		alert(status + " : " + error);
			$("#spinner").hide();
	 	}
	 });
}


function doTagSelected(){
	
	$("#spinner").show();
	var id = new Array();
	$("#transactionTable input:checked").each(function(){
		id.push($(this).prop('name'));
	});
	
	//console.log(id);
	
	var msg = {
		"reports" : id
	};
	//console.log(JSON.stringify(msg));
	$.ajax({
			  type: "POST",
			  async: false,
			  data: JSON.stringify(msg),
			  dataType: "JSON",
			  url: '../reports/set_tag_data',
			  beforeSend: function(x) {
				  if (x && x.overrideMimeType) {
					  x.overrideMimeType("application/j-son;charset=UTF-8");
				  }
			  },
			  success: function(result) {
				 // console.log("success " + result.success+ " " + result.message);
			
				 $("#spinner").hide();
				 deSelectAll();
				//getReportsByRoom();
				
			 },
			 error: function (request, status, error) {
							 alert(status + " : " + error);
						 $("#spinner").hide();
					  }
				  });
		
}

function doMarkAbsentSelected(){
	
	$("#spinner").show();
	var id = new Array();
	$("#transactionTable input:checked").each(function(){
		id.push($(this).prop('name'));
	});
	
	//console.log(id);
	
	var msg = {
		"reports" : id
	};
	//console.log(JSON.stringify(mg));
	$.ajax({
			  type: "POST",
			  async: false,
			  data: JSON.stringify(msg),
			  dataType: "JSON",
			  url: '../reports/mark_absent',
			  beforeSend: function(x) {
				  if (x && x.overrideMimeType) {
					  x.overrideMimeType("application/j-son;charset=UTF-8");
				  }
			  },
			  success: function(result) {
				 // console.log("success " + result.success+ " " + result.message);
			
				 $("#spinner").hide();
					getReportsByRoom();
				
			 },
			 error: function (request, status, error) {
							 alert(status + " : " + error);
						 $("#spinner").hide();
					  }
				  });
		
}

function validateItem(){
	    var hasError= false;
	    $('*[required]').each(function(i, el){
	    	//console.log("Tag: " + $(el).get(0).tagName);
	    	
	    switch($(el).get(0).tagName){
	    	case "LABEL":
			break;
			
		    case "SELECT":
			var select = $(el).attr('id');
			var tmp = $("#" + select).select2("data");
			//console.log("select element: " + select + " data= " + tmp.id);
			
			if(select === "transaction_rejection_types_id" && $("#s2id_" + select).is(':visible')==true &&tmp.id==="") {
				
			    var msg = "Error: You did not select a Rejection Type."
			    var p = $('<p>'+msg+'</p>');
			    p.appendTo("#modalWarningTextContainer");  
			    $("#s2id_"+select).css('border', '1px solid #f00');
			    hasError = true;
			      
			} else if(select == "transaction_status_id" && tmp.id ==="") {
			   
			    var msg = "Error: You did not select a Transaction Status."
			    var p = $('<p>'+msg+'</p>');
			    p.appendTo("#modalWarningTextContainer");  
			    $("#s2id_"+select).css('border', '1px solid #f00');
			    hasError = true;
			      
			}
			else{
				$("#s2id_"+select).css('border', 'none');
			}
			break;
			
		    case "TEXTAREA":
		    var select = $(el).attr('id');
				if(select==="comment_text" && $(el).val().trim()==="")
				{
				    var msg = "Error: You did not enter transaction comments."
					var p = $('<p>'+msg+'</p>');
					p.appendTo("#modalWarningTextContainer"); 
					$(el).css('border', '1px solid #f00');
					hasError = true;
				} else if(select === "rejection_text" && $(el).val().trim()==="") {
					var msg = "Error: You did not enter a reason for rejection."
					var p = $('<p>'+msg+'</p>');
					p.appendTo("#modalWarningTextContainer"); 
					$(el).css('border', '1px solid #f00');
					hasError = true;
				}
				else{
				    $(el).css('border', 'none');
				}
			break;
			
		    case "INPUT":
			var input = $(el).attr('id');
			if($(el).val().trim()==="" && input===""){
			    var msg = "Error: You did not enter  comments."
				var p = $('<p>'+msg+'</p>');
				p.appendTo("#modalWarningTextContainer"); 
				$(el).css('border', '1px solid #f00');
				hasError = true;
			}
			else{
			    $(el).css('border', 'none');
			}
		break;
			
		   
		
			default:
		    break
	    }
	    
	    });
	   
	    return hasError;
	}
	function doCheckWarning(){
	  //clear warn/error headers:
		  $("#warningTextContainer").html("");
		  var hasWarning = false;
		
		  if(hasWarning===false)
		  {
		      $("#warningTextContainer").html("");
		      $("#warnBox").hide();
		      warn = false;
		  }
		  else{
		 	$("#warnBox").show();
		  }
	}
	
	function validateForm() {
	   
	/*    if(warn) {
	    	doCheckWarning();
	    }
	  
	  
	   */
	  
	   $("#modalWarningTextContainer").html("");
	   var hasError = false;
	   //hack set warn false - don't feel like coding it right now
	   warn = false;
	   hasError = validateItem();
	  
	   	if(hasError==false){
			$("#modalWarningTextContainer").html("");
			$("#modalWarnBox").hide();
			
			if(!warn){
				//console.log("in here because of warn");
				setTransactionDataById();
			}
		}
	   else{
		 	$("#modalWarnBox").show();
		}
	   	
	   	// $("html, body").animate({ scrollTop: 0 }, "slow");
	 
	}
	function setTransactionDataById() {
	 
	 	$("#spinner").show();
	 	$("#saveBtn").addClass("disabled");
	 	
	 	
	 	 /*console.log("Child: " + $("#child_id option:selected").text());
	 	 console.log("Teachers: " + $("#teachersList option:selected").text());
	 	 console.log($("#teachersList").val());
	 	 console.log("Needed items: " + $("#neededItemsList option:selected").val());
	 	 console.log($("#personalityList").val());
	 	 console.log($("#timepicker1").val());
	 	 console.log($("#timepicker2").val());
	 	 console.log($("#notSleepy").is(':checked'));
	 	 console.log($("#gymActivity").is(':checked'));
		 console.log($("#outsideActivity").is(':checked'));
		 console.log($("#artsActivity").is(':checked'));
		 console.log($("#otherActivity").is(':checked'));
		 console.log($("#otherTextInput").val());
		 console.log($('#slider').slider("option", "value"));
		 console.log($('#slider2').slider("option", "value"));
		 console.log($('#slider3').slider("option", "value"));*/
		
		/*for(var i=0; i < _transactions.length; i++) {
			if(icurrentTransaction.id == _transactions[i].Transaction.id)
			{
				//console.log(currentTransaction.id + " == " + _transactions[i].Transaction.id );
				currentTransaction  = _transactions[i].Transaction;
				currentRejection = _transactions[i].TransactionRejection;
				reports = _transactions[i].Comment;
			}
		} */
		
		var rtype = "";
		var rtext = "";
		if(currentRejection != undefined && currentRejection[currentRejection.length -1]!= undefined) {
			var index = currentRejection.length -1;
			rtype = currentRejection[index].transaction_rejection_type_id == $("#transaction_rejection_types_id option:selected").val() ? "" : $("#transaction_rejection_types_id option:selected").val();
			rtext = currentRejection[index].text == $("#rejection_text").val() ? "" : $("#rejection_text").val();
		}
		else {
			var index = currentRejection.length -1;
			rtype = $("#transaction_rejection_types_id option:selected").val();
			rtext = $("#rejection_text").val();
		}
		console.log("r type: " + rtype + "      wwwww      r text: " + rtext);
		var transactionData = {
		 	 "id" : currentTransaction.id,
			 "transaction_status_id" : $("#transaction_status_id option:selected").val(),
		 	 "comment" : $("#comment_text").val(),
		 	 "rejection_type" : rtype,
		 	 "rejection_text" : rtext
			 
		} 
	 	 $.ajax({
	 	        type: "POST",
	 	        async: false,
	 	        data: JSON.stringify(transactionData),
	 	        dataType: "JSON",
	 	        url: '../transactions/set_transaction_data',
	 	        beforeSend: function(x) {
	 	            if (x && x.overrideMimeType) {
	 	              x.overrideMimeType("application/j-son;charset=UTF-8");
	 	            }
	 	        },
	 	        success: function(result) {
	 	 	   		/*
				var result = {
					"success":true,
					"userId":"3",
					"id":"3",
					"log":{
						"comment_success":true,
						"transaction_rejection_success":false
					},
					"transaction":{
						"id":"3",
						"transaction_status_id":"1",
						"comment":"this is a note, it's a very good note and i like MOCAS",
						"rejection_type":"",
						"rejection_text":""
					},
					"message":"My success message",
					"status":"200"
				} */
	 	 	   		console.log("JSON RESULT : " + result.transaction);
	 	 	   		//updateTransactionTable(result.transaction);
	 	 	   		resetForm(result);
	 	 	   		getTransactionsByUploadId(_currentBatch_id);
	 	 	   		$("#spinner").hide();
	 	          },
	 	       error: function (request, status, error) {
	 		   		//alert(status + " : " + error);
	 		        //alert(request.responseText);
	 	 	   		$("#spinner").hide();
	 		    }
	 	    });
	}
	function resetForm(result) {
		$('#myModal').modal('hide');
		$("#comment_text").val("");
		$("#rejection_text").val("");
		$("#transaction_status_id").select2("val","");
		$("#transaction_rejection_types_id").select2("val","");
		
		$("#saveBtn").removeClass('disabled');
		
		$("#successBox").show();
		$("successTextContainer").html("");
		var msg = "Transaction data successfully updated!";
		var p = $('<p>'+msg+'</p>');
		p.appendTo("#successTextContainer"); 
		
		//scroll to top - so you can see success message
		$("html, body").animate({ scrollTop: 0 }, "slow");
		
	}
	
	function updateTransactionTable(transaction) {
		
		//$("#" + transaction.id).css('border', '3px solid #ffcc00');
		/*"<td>"+ transactionStatusSelect(transactions[i].Transaction.transaction_status_id) +"</td>" +
    	"<td>" +transactionCommentNumber(transactions[i].Comment.length) +"</td>"+*/
    	//Update the transaction list
    	
    	for(var i=0; i< _transactions.length; i++){
    		if(transaction.id === _transactions[i].Transaction.id){
    			//Update the transaction status in list AND add the comment text AND possibly Rejection type and text
    			_transactions[i].Transaction.transaction_status_id = transaction.transaction_status_id;
    			_transactions[i].Comment.push(transaction.comment)
    			$("#" + transaction.id).find("td").eq(5).html(transactionStatusSelect(_transactions[i].Transaction.transaction_status_id));
				$("#" + transaction.id).find("td").eq(6).html(transactionCommentNumber(_transactions[i].Comment.length));
    		}
    	}
		
	}
	function updateTransactionStatusByTransactionId() {
	var transactionData = {
		 	 "id" : currentTransaction.id,
			 "transaction_status_id" : $("#transaction_status_id option:selected").val()
		} 
	 	 $.ajax({
	 	        type: "POST",
	 	        async: false,
	 	        data: JSON.stringify(transactionData),
	 	        dataType: "JSON",
	 	        url: '../transactions/set_transaction_status_by_transaction_id',
	 	        beforeSend: function(x) {
	 	            if (x && x.overrideMimeType) {
	 	              x.overrideMimeType("application/j-son;charset=UTF-8");
	 	            }
	 	        },
	 	        success: function(result) {
					//refresh transaction list:
	 	 	   		getTransactionsByUploadId(_currentBatch_id);
	 	 	   		$("#spinner").hide();
	 	          },
	 	       error: function (request, status, error) {
	 	 	   		$("#spinner").hide();
	 		    }
	 	    });
	}
	
	function setCommentDataByTransactionId() {
	var commentData = {
		 	 "id" : currentTransaction.id,
			 "transaction_status_id" : $("#transaction_status_id option:selected").val()
		} 
	 	 $.ajax({
	 	        type: "POST",
	 	        async: false,
	 	        data: JSON.stringify(commentData),
	 	        dataType: "JSON",
	 	        url: '../comments/set_comment_data_by_transaction_id',
	 	        beforeSend: function(x) {
	 	            if (x && x.overrideMimeType) {
	 	              x.overrideMimeType("application/j-son;charset=UTF-8");
	 	            }
	 	        },
	 	        success: function(result) {
					//refresh transaction list:
	 	 	   		getTransactionsByUploadId(_currentBatch_id);
	 	 	   		$("#spinner").hide();
	 	          },
	 	       error: function (request, status, error) {
	 	 	   		$("#spinner").hide();
	 		    }
	 	    });
	}
	
	</script>
</div>
