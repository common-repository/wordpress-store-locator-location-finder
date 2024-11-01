<?php

class sl_update {

 	//var $version = "";
 	
 	/** Max numbers of chars in auto-generated description */
 	var $maximum_description_length = 160;
 	
 	/** Minimum number of chars an excerpt should be so that it can be used
 	 * as description. Touch only if you know what you're doing
 	 */
 	var $minimum_description_length = 1;
 	
 	var $ob_start_detected = false;
 	
 	var $title_start = -1;
 	
 	var $title_end = -1;
 	
 	/** The title before rewriting */
 	var $orig_title = '';
 	
 	/** Temp filename for the latest version. */
 	var $upgrade_filename = 'temp.zip';
 	
 	/** Where to extract the downloaded newest version. */
 	var $upgrade_folder;
 	
 	/** Any error in upgrading. */
 	var $upgrade_error;
 	
 	/** Which zip to download in order to upgrade .*/
 	var $upgrade_url = 'http://downloads.wordpress.org/plugin/store-locator.zip';
 	
 	/** Filename of log file. */
 	var $log_file;
 	
 	/** Flag whether there should be logging. */
 	var $do_log;
 	
 	var $wp_version;
	
	
function sl_update() {
		global $wp_version;
		$this->wp_version = $wp_version;
		
		$this->log_file = dirname(__FILE__) . '/store-locator.log';
		if (1==2) { //set to 1==1 if you want log to be generated
			$this->do_log = true;
		} else {
			$this->do_log = false;
		}

		$this->upgrade_filename = dirname(__FILE__) . '/' . $this->upgrade_filename;
		$this->upgrade_folder = dirname(__FILE__);
	}
	
function get_url($url)	{
		if (function_exists('file_get_contents')) {
			$file = file_get_contents($url);
		} else {
	        $curl = curl_init($url);
	        curl_setopt($curl, CURLOPT_HEADER, 0);
	        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	        $file = curl_exec($curl);
	        curl_close($curl);
	    }
	    return $file;
	}
	
function log($message) {
		if ($this->do_log) {
			error_log(date('Y-m-d H:i:s') . " " . $message . "\n", 3, $this->log_file);
		}
	}
	
function download_newest_version() {
		$success = true;
	    $file_content = $this->get_url($this->upgrade_url);
	    if ($file_content === false) {
	    	$this->upgrade_error = sprintf(__("Could not download distribution (%s)"), $this->upgrade_url);
			$success = false;
	    } else if (strlen($file_content) < 100) {
	    	$this->upgrade_error = sprintf(__("Could not download distribution (%s): %s"), $this->upgrade_url, $file_content);
			$success = false;
	    } else {
	    	$this->log(sprintf("filesize of download ZIP: %d", strlen($file_content)));
		    $fh = @fopen($this->upgrade_filename, 'w');
		    $this->log("fh is $fh");
		    if (!$fh) {
		    	$this->upgrade_error = sprintf(__("Could not open %s for writing"), $this->upgrade_filename);
		    	$this->upgrade_error .= "<br />";
		    	$this->upgrade_error .= sprintf(__("Please make sure %s is writable"), $this->upgrade_folder);
		    	$success = false;
		    } else {
		    	$bytes_written = @fwrite($fh, $file_content);
			    $this->log("wrote $bytes_written bytes");
		    	if (!$bytes_written) {
			    	$this->upgrade_error = sprintf(__("Could not write to %s"), $this->upgrade_filename);
			    	$success = false;
		    	}
		    }
		    if ($success) {
		    	fclose($fh);
		    }
	    }
	    return $success;
	}

	function install_newest_version() {
		$success = $this->download_newest_version();
	    if ($success) {
		    $success = $this->extract_plugin();
		    unlink($this->upgrade_filename);
	    }
	    return $success;
	}

	function extract_plugin() {
	    if (!class_exists('PclZip')) {
	        require_once ('pclzip.lib.php');
	    }
		global $sl_path;
	    $archive = new PclZip($this->upgrade_filename);
	    //$files = $archive->extract(PCLZIP_OPT_STOP_ON_ERROR, PCLZIP_OPT_REPLACE_NEWER, "", "", $this->upgrade_folder);
		$files = $archive->extract(str_replace("\\", "/",$sl_path), "store-locator/");
		//$files = $archive->extract();
	    $this->log("files is $files");
	    if (is_array($files)) {
	    	$num_extracted = sizeof($files);
		    $this->log("extracted $num_extracted files to $this->upgrade_folder");
		    $this->log(print_r($files, true));
	    	return true;
	    } else {
	    	$this->upgrade_error = $archive->errorInfo();
	    	return false;
	    }
	}
	
}

$sl_up=new sl_update();

if ($_POST['sl_update'] || ($_GET[_wpnonce] && wp_verify_nonce($_GET[_wpnonce], 'my-nonce') && $_GET[upgrade]==1)) {
			$success = $sl_up->install_newest_version();
			if (!$success) {
				$message = __("Upgrade failed", $text_domain);
				if (isset($sl_up->upgrade_error) && !empty($sl_up->upgrade_error)) {
					$message .= ": " . $sl_up->upgrade_error;
				} else {
					$message .= ".";
				}
			}
			else {
				$message = __("Great, successful upgrade.", $text_domain);
				if ($_GET[_wpnonce] && wp_verify_nonce($_GET[_wpnonce], 'my-nonce') && $_GET[upgrade]==1) {
					$message.=" | <a href='./plugins.php'>".__("Return to Plugins page", $text_domain)."</a>";
				}
				//Call install_table() to make sure database is up to date for this newest version, since activation hook may not be called
				install_table();
				//Call initialize_variables() in order to set the default value of any newly introduced variables 
				initialize_variables();
				//set permissions to 755 for store-locator-js.php
				/*if (file_exists($sl_path."/js/store-locator-js.php")){
					chmod($sl_path."/js/store-locator-js.php", 0755);
				}*/
			}
		}
	
?>
<?php if ($message) : ?>
<div id="message" class="updated fade"><p><?php echo $message; ?></p></div>
<?php endif; ?>
<?php if ($_POST['sl_update']) : ?>
<meta http-equiv="refresh" content="3;url=./admin.php?page=<?php print $sl_dir;?>/news-upgrades.php" />
<?php endif; ?>