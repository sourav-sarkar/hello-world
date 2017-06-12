<?php
include_once("config.php");
$username = $_SESSION["username"];
$page = "step1";
$pagetitle = "SOW automation";
$usr = new Users;
$projid_arr = $usr->getProjectetails();
$hidden = "hidden";
if(!isset($_SESSION['userid'])){
	header('Location:index.php');
}
//session_start(); 
?>
<!DOCTYPE html>
<?php include "template/head.php";?>
	<script>var page="step1"</script>

<body>
    <div class="header">
	
	<div class="row main-nav">
			<a href="land.php">
			<div class="col-md-8">
				<h4><span class="service-header">SOW Automation &mdash; Cloud Platform</span></h4>
			</div>
			</a>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
						<p style="width: 190px;">Welcome <?php print $username;?> | <a href="logout.php">Logout</a> 
						</p>
					</div>
					<div class="col-md-6 logo">
						<img src="assets/images/cts-logo.png" alt="logo" height="50" width="140"  />
					</div>
				</div>
			</div>
			
		</div>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fullwidth">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Rehost ( Lift & Shift )</a>
                </li>
                <li><a href="#">Refractor </a>
                </li>
                <li><a href="#">Revise </a>
                </li>
                <li><a href="#">Rebuild </a>
                </li>
                <li><a href="#">Replace</a>
                </li>
                <li><a href="#">Green filed
</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fullwidth form-1">
	 <?php
 if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 unset($_SESSION['error']);
 }
 ?>

        <form method="post" action="screen_3.php">
            <div class="col-sm-6">
                <div class="scope">
                   <h4>Scope of Work<span><div class="slide-up"><img src="images/close_accordion.png"></div>
        <div class="slide-down"><img src="images/open_accordion.png"></div></span></h4>
		<div class="form-detail">
                 
                            <label>Cloud Platform </label>
                            <select name="cloud">
                                <option value="azure">Azure</option>
                                <option value="aws">AWS</option>
                            </select>
                
                            <label>Support Model </label>
                            <select name="support">
                                <option value="iaas">Iaas</option>
                                <option value="paas">Paas</option>
                                <option value="saaS">SaaS</option>
                            </select>
                
                            <label>CCS scope</label>
                            <select name="ccs">
                                <option value="liftandshift">Lift & Shift</option>
                                <option value="greenfield">Green Field</option>
                                <option value="refactor">Refactor</option>
                                <option value="revise">Revise</option>
                                <option value="rebuild">Rebuild</option>
                                <option value="replace">Replace</option>
                            </select>
              
        </div>
                </div>


                <div class="environment">
                                        <h4>Environment in scope
<span><div class="slide-up"><img src="images/close_accordion.png"></div>
        <div class="slide-down"><img src="images/open_accordion.png"></div></span></h4>
		
                    <div class="form-detail">
					<span><b>No of environments</b></span>
                       
                            
                            <input type="radio" name="n_environ" value="cntwithprod">
							<label>Count with Prod
</label>
                        
                  
                            
                            <input type="radio" name="n_environ" value="cntwithnonprod">
							<label>Count with Non Prod				
                             </label>
			

                      
                            
                            <input type="radio" name="n_environ" value="disasterrecovery">
							<label>Disaster Recovery

</label>
                       
	<div class="non_prod_detail">					
						
											<span><b>Details for</b></span>
                      
                            
                            <input type="radio" name="nonprod" value="dev">
							<label>DEV
</label>
                      
                       
                            
                            <input type="radio" name="nonprod" value="qa">
							<label>QA	
                             </label>
							 
                        

                      
                            
                            <input type="radio" name="nonprod" value="uat">
							<label>UAT

</label>
</div>
                </div>       
                </div>
                <div class="volumetric">
                                       <h4>Volumetric<span><div class="slide-up"><img src="images/close_accordion.png"></div>
        <div class="slide-down"><img src="images/open_accordion.png"></div></span></h4>
                    <div class="form-detail">
                    							 
												  <span><b> Workloads</b></span>
                      
  <input type="radio" name="workloads" value="linux"><label>Linux</label>
  <input type="radio" name="workloads"  value="windows">Windows
  
                    <span><b>Provisioning type</b></span>
                      
  <input type="radio" name="provision" value="automated"><label>Automated </label>
  <input type="radio" name="provision"  value="manual"><label>Manaul</label><br>
  
                           <label>No of servers at prod</label>
                            <select name="serverprod">
                                <option value="os">OS</option>
                                <option value="db">DB</option>
                                <option value="middleware">Middleware</option>
								<option value="queues">Queues</option>
								<option value="applications">Applications</option>
                                
                            </select>
                     
                             <label>No of servers at non prod</label>
                             <select name="servernonprod">
                                <option value="os">OS</option>
                                <option value="db">DB</option>
                                <option value="middleware">Middleware</option>
								<option value="queues">Queues</option>
								<option value="applications">Applications</option>
                            </select>
							<br>
							<label>Storage size in Prod</label></span><input type ="text" name="storageprod"><br>
							 <label>Storage size in Non Prod</label></span><input type ="text" name="storagenonprod">
             
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="bck_strat">
                                      <h4>Backup Strategy
<span><div class="slide-up"><img src="images/close_accordion.png"></div>
        <div class="slide-down"><img src="images/open_accordion.png"></div></span></h4>
                     <div class="form-detail">
                    							 
												  <span><b> Storage for VM, DB</b></span>
                      
  <input type="radio" name="storagevm" value="gb"><label>Size in GB</label>
  <input type="radio" name="storagevm"  value="tb">Size in TB
  
                    <span><b>Backup Region</b></span>
                      
  <input type="radio" name="bregion" value="same"><label>Same </label>
  <input type="radio" name="bregion"  value="different">Different
   <span><b>Backup</b></span>
                      
  <input type="radio" name="backup" value="yes"><label>Yes</label>
  <input type="radio" name="backup"  value="no"><label>No</label><br>
  
                            <label>Storage Type</label>
                            <select name="storagetype">
                                <option value="blobs">Blobs</option>
                                <option value="files">Files</option>
                                <option value="disks">Disks</option>
								<option value="tables">Tables</option>
								<option value="queues">Queues</option>
                            </select>
                     
                             <label>Data redundancy option</label>
                             <select name="redundancy">
                                <option value="lrs">LRS</option>
                                <option value="zrs">ZRS</option>
                                <option value="grs">GRS</option>
								<option value="ragrs">RA-GRS</option>
                            </select>
							
							 <label>Backup Level</label>
                             <select name="bckuplevel">
                                <option value="filesystem">File system</option>
                                <option value="db">DB</option>
                                <option value="middleware">Middleware</option>
								<option value="applications">Applications</option>
								<option value="others">Others</option>
                            </select>
							
							<label>Log backup</label>
                             <select name="logbckup">
                                <option value="transitionallog">Transitional logs</option>
                            </select>
							
								 <label>Types  of backups</label>
                             <select name="backuptypes">
                                <option value="full">Full</option>
                                <option value="incremental">Incremental</option>
                                <option value="both">Both</option>
                            </select>
							
								<label>Full backup Frequency</label>
                             <select name="backupfrequency">
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="biweekly">Biweekly</option>
								<option value="monthly">Monthly</option>
                                <option value="custom">Custom</option>
                            </select>
							
							 <label>Backup Retention period</label>
                             <select name="retentionperiod">
                                <option value="30">30</option>
                                <option value="60">60</option>
                                <option value="90">90</option>
								<option value="custom">Custom</option>
                            </select>
							
                    </div>
                </div>


                <div class="landscape">
                                        <h4>Technology Landscape
<span><div class="slide-up"><img src="images/close_accordion.png"></div>
        <div class="slide-down"><img src="images/open_accordion.png"></div></span></h4>
                  <div class="form-detail">
                           <label>Technology details</label>
                            <select name="techdetails">
                                <option value="blobs">Blobs</option>
                                <option value="files">Files</option>
                            </select>
							  <label>AD Setup scope </label>
                      
  <input type="radio" name="ad_setup" value="yes"><label>Yes </label>
  <input type="radio" name="ad_setup"  value="no"><label>No</label>

                     
							
                    </div>
                </div>
                <div class="sec_products">
                                       <h4>Proposed Security Products
<span><div class="slide-up"><img src="images/close_accordion.png"></div>
        <div class="slide-down"><img src="images/open_accordion.png"></div></span></h4>
                    <div class="form-detail">
                            <label>Security Products  </label>
                            <select name="products">
                                <option value="palo">Palo Alto Firewall (VM-300)</option>
                                <option value="waf">Barracuda WAF (Level 15)</option>
								<option value="splunk">Splunk Cloud</option>
								<option value="nessus">Nessus Vulnerability Scans – Internal Ips</option>
								<option value="kiwi">Kiwi Syslog’s</option>
								<option value="custom">Custom</option>
                            </select>
                      </div>
                </div>
            </div>
			<div class="col-sm-12 add_quest">
                              <h4>Additional Questions
<span><div class="slide-up"><img src="images/close_accordion.png"></div>
        <div class="slide-down"><img src="images/open_accordion.png"></div></span></h4>
<div class="form-detail">
		<div class="col-sm-4">
		<h5>Scope</h5>
		<span><b>Bare metal provisioning</b></span>
          <textarea name="metal" rows="5" cols="40"></textarea><br>
		 <label>OS provisioning</label>
                      
  <input type="radio" name="osprov" value="ars">ARS
  <input type="radio" name="osprov"  value="c360">C360<br>
 
 <label>OS IMAGE</label>
                      
  <input type="radio" name="osimg" value="ami">AMI
  <input type="radio" name="osimg"  value="goldenimage">Golden Image

		</div>
		<div class="col-sm-4">
	<h5>Out of scope</h5>
	
	  <textarea name="outofscope" rows="5" cols="40"></textarea><br>
	  <input type="checkbox" name="standard" value="out_std">Include standard template
	</div>
		<div class="col-sm-4">
		<h5>Pre-requisities</h5>
		 <textarea name="prerequisit" rows="5" cols="40"></textarea><br>
	  <input type="checkbox" name="standard" value="out_std">Include standard template
		</div>
</div>
		</div>
	</div>

<input type="button" name="reset" id="reset" value="Reset">
<input type="submit" name="Save" value="Save">
<input type="submit" name="next" id="next" value="Next" >


    </form>

</div>
</body>
