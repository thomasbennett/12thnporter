<?php
        date_default_timezone_set('America/Chicago');
	$XML_CALENDAR_FEED = 'http://www.ticketweb.com/snl/EventAPI.action?version=1&method=xml&key=JnuDjlMLm1u8gpmhnZ5E&venueId=25638';
	$XML_CACHE_TIMEOUT = '2 hours';  // This can be almost any plain english expression accepted by PHP's strtotime function


		/** is_saveable()
	 * Retuns true if we should be able to create or edit the file
	 */
	function is_saveable($filename) {
		return ( is_writeable($filename) || (!file_exists($filename) && is_writeable(dirname($filename))));
	}

	/** cacheable()
	 * Attempts to cache a remote file
	 * returns the local file name on success
	 * returns remote filename on failure to create a local cache
	 **/
	function cacheable($remoteFile, $timeLimit) {
		$localFile = dirname(__FILE__).'/'.sha1($remoteFile).'.cache';
		if (file_exists($localFile) && time() < strtotime("now + {$timeLimit}", filemtime($localFile))) {
			// Young cached file
			return $localFile;
		} else {
			// Check if we should bother getting the remote file
			if (is_saveable($localFile)) {
				// We need to get the remote file
				$remoteContent = file_get_contents($remoteFile);
				if ($remoteContent) {
					// We can read the remote file
					$wroteCache = file_put_contents($localFile, $remoteContent);
					if ($wroteCache) {
						// Successfully updated cache
						return $localFile;
					} else {
						// Can't write to cache, fallback to non-caching
						return $remoteFile;
					}
				} else {
					// Remote file can't be read
					return false;
				}
			} else {
				// Can't save to local cache, fallback to non-caching
				return $remoteFile;
			}
		}
	}

	$xml = simplexml_load_file(cacheable($XML_CALENDAR_FEED, $XML_CACHE_TIMEOUT));

	// Create event instances
	foreach($xml->events->event as $xmlEvent) {
		$event = new Event($xmlEvent);
		$DateEventArray
			[ (int) $event->getYear()  ]
			[ (int) $event->getMonth() ]
			[ (int) $event->getDay()   ]
			[                          ] = $event;
		$firstEvent = (empty($firstEvent)) ? $event : $firstEvent;
	}

// 	print_r($DateEventArray);

	class Attraction {
		public $id;
		public $name;
		public function __construct($id, $name) {
			$this->id   = $id;
			$this->name = $name;
		}
	}


	class Event {
		public $id;
		public $name;
		public $url;
		public $additionalListings;
		public $status;
		public $dates = array();
		public $venue;
		public $imageURL;
		public $priceLow;
		public $priceHigh;
		public $attractions;
		
		static function constructDateArray($xmlDates) {
			$returnMe = array();
			$returnMe['start'] = strtotime("{$xmlDates->startdate} {$xmlDates->timezone}");
			$returnMe['end']   = strtotime("{$xmlDates->enddate} {$xmlDates->timezone}");
			$returnMe['doors'] = strtotime("{$xmlDates->doorsdate} {$xmlDates->timezone}");
			$returnMe['start_r'] = date('r', $returnMe['start']);
			$returnMe['end_r']   = date('r', $returnMe['end']);
			$returnMe['doors_r'] = date('r', $returnMe['doors']);
			return $returnMe;
		}
		
		static function constructAttractionArray($xmlAttractions) {
			$returnMe = array();
			foreach ($xmlAttractions as $attraction) {
				$returnMe[(int) $attraction->sequence] = new Attraction(
					(int)    $attraction->artistid,
					(string) $attraction->artist
				);
			}
			return $returnMe;
		}
		
		public function getYear()  { return (int) date('Y', $this->dates['start']); }
		public function getMonth() { return (int) date('n', $this->dates['start']); }
		public function getDay()   { return (int) date('j', $this->dates['start']); }
		
		public function __construct($xml) {
			$this->id          = (int)    $xml->eventid;
			$this->name        = (string) $xml->eventname;
			$this->description = (string) $xml->description;
			$this->url         = (string) $xml->eventurl;
			$this->status      = (string) $xml->status;
			$this->dates       = Event::constructDateArray($xml->dates);
			$this->venue       = $xml->venue;
			$this->imageURL    = (string) $xml->eventimages->large;
			$this->thumbURL    = (string) $xml->eventimages->small;
			$this->priceLow    = (string) $xml->prices->pricelow;
			$this->priceHigh   = (string) $xml->prices->pricehigh;
			$this->attractions = Event::constructAttractionArray($xml->attractionList->attractions);
		}
	}




	if (!empty($_GET['event_cal_month']) && !empty($_GET['event_cal_year'])) {
		$targetMonth = $_GET['event_cal_month'];
		$targetYear  = $_GET['event_cal_year'];
	} else {
		$targetMonth = date('m');
		$targetYear  = date('Y');
	}
	$calMonth = strtotime("{$targetYear}-{$targetMonth}-01");   // Wake up, wake up, wake up. It's the first of the month . . .
	

	// Create request arrays to be used in the template for "Prev" and "next" month links
	$prevRequest = $nextRequest = $_GET;
	$nextCalMonth = strtotime('now + 1 month', $calMonth);
	$prevCalMonth = strtotime('now - 1 month', $calMonth);
	$nextRequest['event_cal_month'] = date('m', $nextCalMonth);
	$nextRequest['event_cal_year']  = date('Y', $nextCalMonth);
	$prevRequest['event_cal_month'] = date('m', $prevCalMonth);
	$prevRequest['event_cal_year']  = date('Y', $prevCalMonth);

?>


	<div id="calendar_holder">
	<table id="calendar">
		<tr class="header">
			<th colspan="2" class="social_media">
<a href="http://twitter.com/12th_and_Porter"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" width="29" height="29" /></a>
<a href="http://www.facebook.com/#!/12thandPorter"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" width="24" height="29" /></a>
<a href="http://www.myspace.com/12thandporter"><img src="<?php bloginfo('template_directory'); ?>/images/myspace.png" width="34" height="29" /></a>
<a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" width="29" height="29" /></a>
</th>
			<th colspan="3" class="month">
				 <?php echo date('F', $calMonth); if (date('Y') != date('Y', $calMonth)) { echo " " . date('Y', $calMonth); } ?> 
			</th>
			<th colspan="2" class="month prevnext">
				<a href="?<?php echo http_build_query($prevRequest) ?>">&lt;last month</a> | <a href="?<?php echo http_build_query($nextRequest) ?>">next month&gt;</a>
			</th>
		</tr>
		<tr class="daysofweek">
			<th>sunday</th>
			<th>monday</th>
			<th>tuesday</th>
			<th>wednesday</th>
			<th>thursday</th>
			<th>friday</th>
			<th>saturday</th>
		</tr>
		<tr>
			<?php if (date('w', $calMonth)) : ?>
			<td colspan="<?php echo date('w', $calMonth) ?>" class="spacer"></td>
			<?php endif ?>
			<?php for ($day=0 ; $day < date('t', $calMonth) ; $day++) : $date = strtotime("now + {$day} days", $calMonth) ?>
			<td class="day dow_<?php echo date('w', $date) ?>">
				<label class="number"><?php echo date('d', $date) ?> </label>
				<?php
					$dea = $DateEventArray;    // Drill into the array step by step to avoid undefined warnings
					$dea = (isset($dea[(int)date('Y', $date)])) ? $dea[(int)date('Y', $date)] : array();
					$dea = (isset($dea[(int)date('m', $date)])) ? $dea[(int)date('m', $date)] : array();
					$dea = (isset($dea[(int)date('d', $date)])) ? $dea[(int)date('d', $date)] : array();
					if (count($dea)) : 
				?>
				<ul class="events">
					<?php foreach($dea as $event) : ?>
					<li>
						<a class="eventPopup" href="#event_<?php echo $event->id ?>_full" title="<?php echo $event->name ?>">
<!-- 							<img src="<?php echo $event->thumbURL ?>" alt="<?php echo substr($event->name, 0, 40) ?>"> -->
							<?php echo substr($event->name, 0, 30) ?>
						</a>
					</li>
					<?php endforeach ?>
				</ul>
				<?php endif ?>
			</td>
			
			<?php if ( ((date('w', $calMonth) + $day) % 7) == 6 ) : ?>
		</tr>
		<tr>
				<?php endif ?>
				
			<?php endfor ?>
		</tr>
	</table>
	
	<?php foreach ($DateEventArray[(int)$targetYear][(int)$targetMonth] as $day) : foreach ($day as $event) : ?>
	<div id="event_<?php echo $event->id ?>_full" class="event_full event">
		<div class="date">
			<?php echo date("l, F d, Y | g:i A", $event->dates['start']) ?> | 18+ | Doors @ <?php echo date("g:i", $event->dates['doors']) ?>
		</div>
		<?php if(strlen($event->imageURL)>10): ?>
		<div class="photo">
			<img src="<?php echo $event->imageURL ?>">
			<label><?php echo $event->attractions[0]->name ?></label>
		</div>
		<?php endif ?>
		<h3><?php echo $event->name?></h3>
		<ul class="facebook_tickets">
<!-- 			<li class="facebook"><a href=""><img src="" alt="Facebook | Attend"></a></li> -->
			<li class="tickets">
				<a href="<?php echo $event->url ?>&pl=12porter">
					Get Tickets
				</a>
			</li>
		</ul>
		<div class="description">
			<?php echo $event->description ?>
		</div>
	</div>

	<?php endforeach; endforeach; ?>

	</div>

	<script>
		var currentPopup = null;
		var currentCallback = function(){};
		var popupCallback = function(popup, callback){
			if (popup != currentPopup) {
				currentCallback();
				currentCallback = callback;
				currentPopup = popup;
			}
		};

		var makePopupable = function(){
			var $this  = $(this);
			var myID   = $this.attr('id');
			var myLink = $('a[href=#'+myID+']');
			var hideMe = function(e){ $this.slideUp();   }
			var showMe = function(e){ $this.slideDown(); popupCallback($this, hideMe); }
			myLink.click(showMe);
			$('<label class="close">Close</label>').appendTo($this).click(hideMe);
		}
	
		$('.event_full')
			.parent()
				.css({position: 'relative'})
			.end()
			.css({position: 'absolute', top:'15%', left:'10%', width:'80%'})
			.hide()
			.each(makePopupable)
	</script>
