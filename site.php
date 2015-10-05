<?php
if (file_exists('./singleseat.conf.php')){
	unset ($_GET['site']);
	require_once('getconfig.php');
	$_GET['ruehcram']=getconfig('singleseat');
	include('./index.php');	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>ruehcram. Road, walks, travel diaries, tools, gear and software
	</title>
	<meta name="description" value="Discover new rides, build your gear, walk connected"/>
</head>
<body style="margin-left:8%;margin-right:8%;font-family:Sans;padding-left:2%;">
	<h1>ruehcram</h1>	
<div style="float:left;width:24%;">
<h6>ruehcrams</h6>
<?php
$ruehcrams=scandir('./');
foreach ($ruehcrams as $ruehcram)
{
	if ($ruehcram[0]!=='.' && is_dir($ruehcram)&& file_exists($ruehcram.'/meta/title.txt')){
		
	
		echo '<a href="?ruehcram='.urlencode($ruehcram).'">'.htmlentities($ruehcram).'</a><br/>';
		
		
		}
	}


?>



</div>
<div>
	<h3><em><strong><a href="?site=site">Home</a> <a href="?what=what">What</a> <a href="?who=who">Who</a> <a href="?gear=gear">Gear</a> <a href="?software=software">Software</a> <a href="?shop=shop">Shop</a></strong></em></h3>
<div>



</div>
<?php
if (isset($_GET ['site'])){?>
		<div>
			ruehcram is a place for riders. ruehcram is <em>marcheur</em> reversed, which just means "walker". You will find walk diaries, with text, maps, pictures, GPS traces and audio notes, due to our fellow ruehcrams, but also software to build your own connected walker suit, and gear, juste explore...
		</div>
		<?php
		
		
		}
if (isset($_GET ['what'])){
		?>
		<div>
			<h2>Instant publishing</h2>
			ruehcram allows people wearing a ruehcram walking suit to publish rich multimedia content about their rides, travels and walks. The download and publishing process is mostly automated, and you will never have to sit in front of your computer again to post your walk diaries. 
			<h2>Comprehensive and free tool suite</h2>
			With the ruehcram software, power your walking gear, build your own system and start publishing your diary. Run your own website with the full software powering ruehcram available for you to make your own install on any, even cheap, PHP hosting. Discover our gear specifications to get inspired. 
			<h2>Gear and shop</h2>
			Let us build together your personnal ruehcram suit, assembled and configured in our workshop in south-east France, to perfectly fullfill your needs. Get a lifetime acces to our publishing platform, look cool, enjoy unlimited support, and be sure we will work hard whatever your needs are, to build the system that you really want. 
		</div>
		<?php
		
		}
if (isset($_GET ['who'])){
		?>
		<div>
			Ruehcram le Marcheur, with uppercase, is an addictive walker from Nord-Is&egrave;re, in France. After many, many hours spent walking, he started to share his walks, maps, picture, GPS trace and so on using various publishing plateforms since 2011. Actually unsatisfied by their lake of integration with existing technologies that have the potential to cut the time spent publishing travel diairies, he launched with the help of the Crem Road Studio internet and media organisation this very website, ruehcram (in lowercase), aiming to be a haven for connected walk, ride and travel lovers</div>
		<?php
		
		}

if (isset($_GET ['gear'])){
		?>
		<div>Ruehcram can take care of specific software developpement and hardware setup to build for you an unique walking gear used to be worn when you want to record an episode for your diary. <br/><br/>
				Typical walking gear include :
				<br/>-a photo picture camera, along with a 64gb SD Card, an optical zoom and video capabilities, to take high quality, short to long range pictures for a nice and top quality diary, along with its usb adaptor, to be plugged at any time to have the diary updated magically. In this example of setup we are using a proven robust Nikon Coolpix S2600. Totally plug and play, the central processing unit will retrieve data and upload them upon cord plugin. 
				<br/>-a cell phone, to take care of the GPS trace recording, voice memo recording, and quick photo picture taking. No SIM card is needed unless you need to phone. In this example we use using OSMTracker alongside an HTC Hero, a phone that is very robust and last quite long with a new battery, which became widely available, and for which spares are still available. Alongside with its USB adaptor, to be plugged in the core computing unit for battery charging or for trace and media transfer. Each time the device got plugged, available files are published automatically.  
				<br/>-a gilet to cary everything around, with a rear pocket and 9 front pockets, to keep things handy
				<br/>-a pair of military grade walking shoes. In this example, a pair of Solovair with 10 holes and built-in strap, toe shield, and orthopedic air cushion sole. 
				<br/>-a pair of polarizing sunglasses. Ours, here, are third category Orao Caparica. 
				<br/>-a headphone/microphone set, to be plug on the phone, especially useful to record voice memo. In this case a Marshall one.  
				<br/>-a cap (our caps are very rare caps, produced on-demand. Here, a Wumzle Radio cap)
				<br/>-army trousers, of military grade, to be easy and for a long time. Here, a UK model. In any case with two revolver pockets, one for the keys and one for easy storage of anything you'll need later, and the two leg pockets for the ID cards and so on and for a 50 to 75 cls water bottle. 
				<br/>-a central computing unit with data link. Here, a refurbished eeepc 901 with its 3G+ built in data modem, 2x4gb of SSD and a 32gb SD Card. Used especially to live stream and to publish on the go. 
				<br/>-an USB cable to link the unit to the shoulder hub
				<br/>-a 4-ports USB hub to distribute power and data link along the devices. Located at the top of the chest. 
				<br/>-a FullHD capable webcam with a built-in microphone, used for live streaming and audio/video recording. Just plug the camera in the hub unit to start recording and streaming, unplug to cease. We'll use a Logitech one here. 
				<br/>
				<br/>such a gear, fully configured and ready for the action, would be sold nearby 2000 euros, depending on which special steps are required to tailor the customer's need. Please note that some features mentionned here are still under developpement and will require software update of your gear when released. Donc panic about this, all our customers get unlimited email and internet meeting support, to be sure they drive their gear the right way. Please go to the shop for more information.   
		</div>
		<?php
		
		
		}
if (isset($_GET ['software'])){
		?>
		<a href="./?reference=reference">Commands and web scripts reference</a>
		<div>
			Our software suite covers all the needs of modern travelers. 
			<br/>
			Both gear software and website server side software are GPL Affero licenses and can be downloaded and used without restriction. The ruehcram utility is used to keep your installation up-to-date and to interact with your ruehcram system. <br/>
			To get started, download <a href="?software-get=ruehcram">the ruehcram shell script</a> and <a href="?software-get=ruehcram.php">ruehcram.php</a>. Make sure you have php installed. 
			Then run the command <br/><code>./ruehcram</code><br/> in a terminal to set the target server. This will create a ~/.ruehcram directory in your home folder to host your local installation and update it<br/> 
			<div>
			System requirement : Unix or BSD style OS (no support for windows) with utf-8 character encoding enabled, PHP>5.5, CURL php extension<br/>
			Optional dependencies : avconv for 3gpp to ogg conversion, xdg-open for debriefing writing<br/>
			Web server requirement : PHP and GD library<br/>
			<h3>The basis</h3>
			On the web server, you got folders like this (root of install)/username<br/>
			and then this subdirs<br/>
			username/meta<br/>
			username/data<br/>
			In the username/meta dir, there is title.txt, shortdescription.txt and longdescription.txt that are used to describe the whole diary.<br/>
			In the data/ dir, you have one directory per episode, of the form of a timestamp of the diary. <br/>
			In this directory you got the text and media elements, each one with its filename starting with a timestamp.<br/>
			<em>The ruehcram timestamp format is YYYY-MM-DD_HH-MM-SS</em><br/>
			In this directory you also have a meta/title.txt file, that contains the title of the episode. <br/>
			<h3>The workflow</h3>
			<h4>Setting up an account on a public server</h4>
			run <code>./ruehcram server &lt;server&gt;</code> if you which to set a different server from the one from which your pulled the software for your software update. <br/>
			run <code>./ruehcram publishserver &lt;publishserver&gt;</code> to set your publishing server, as an example http://ruehcram.cremroadstudio.com. <br/>
			run <code>./ruehcram setusername &lt;username&gt;</code> to set your username. 
			Then ultimately run <code>./ruehcram createaccount</code> to create your account. You will be prompet for a password, unless you ran <code>./ruehcram setpassword</code> to store it locally.
			<h4>The ride</h4>
			<em>Before you start, make sure your camera and your phone have their clock accurately synchronised</em><br/>
			<h4>Once at home</h4>
			First, create a new episode with <br/>
			<code>./ruehcram new</code><br/>
			It will create a ~/.ruehcram/data/&lt;current timestamp&gt; subdirectory where your episode will be hosted
			<h4>GPS data, vocal memos and phone pictures</h4>
			It is recommanded to use OSMTracker to record the .gpx trace on the phone and to record vocal memos. OSMTracker's filenames are timestamped the same way than ruehcram's file are. So you only have to export, once at home, the data from OSMTracker, it will create them on your sdcard. <br/>
			<strong>then copy the OSMTracker data to your <code>(home)/.ruehcram/data/&lt;newest episode&gt;</code> directory</strong><br/>
			<h4>Camera pictures and videos</h4>
			To timestamp your photo picture and/or videos, you'll need to import them from your camera to your computer's datapre dir <em>in archive mode, with modification time of the file preserved</em><br/>
			as an example this can be achevied this way on most Linux systems : <br/>
			<code>cp -a /media/shangril/NIKON/DSCN100/* ~/.ruehcram/datapre</code><br/>
			<h4>Camera medias timestamping</h4>
			then apply the timestamps with the command<br/>
			<code>./ruehcram settimestamp</code><br/>
			this will process the datapre/ directory ; once renamed with the correct timestamp, the files will be moved to data/<br/>
			<h4>3gpp conversion</h4>
			If you recorded 3gpp (the default OSMTracker format for memos) vocal memos, you'll need to run <code>./ruehcram convert3gpp2ogg</code> to have them encoded in a more widely reconized by web browsers format. <br/>
			<h4>Writing</h4>
			Then it will be time to write down your diary debriefing. <br/>
			You can first take a look at your local data/ directory. It contains a subdirectory which is named in the timestamp format, at the date you ran settimestamp. <br/>
			<h5>Title</h5>
			In this subdir, create the dir and file data/(timestamp)/meta/title.txt containing the title of your episode. <small>todo : create a ruehcram command to do this</small><br/>
			<h5>Text</h5>
			Run the interactive command <br/>
			<code>./ruehcram write-debriefing &lt;newest episode timestamp&gt;</code><br/>
			It will open any non-text element one by one with your prefered default system application. Then you can enter text or html content that will be inserted before the element in the timeline. Enter a blank line if you don't want to add text before an element. 
			<h5>Direction icon for photo pictures</h5>
			Run the interactive command <br/>
			<code>./ruehcram write-debriefing &lt;newest episode timestamp&gt;</code><br/>
			It will open any jpeg one by one with your prefered default system application. Then you can set a direction icon than will be aside the picture. Enter a blank line if you don't want to add one. 
			<h5>Uploading</h5>
			<code>./ruehcram publish</code>
			</div>
			
		</div>
		<?php }
if (isset($_GET ['shop'])){
		?>
		<div>
			<em>Non-european customers</em> please check import taxes in your country before anything else. Import taxes are due to be paid by the buyer according to our sale agreement.<div>
			<h3>Quote enquiry is sold &euro;21</h3>
			Included up to ten messages or one week of email discussion to define your needs, and a single, up to half an hour text chat. You'll get a quote within the following three weeks. 
			</div>
			<div>
			<form style="display:inline;" name="_xclick" action="https://www.paypal.com/fr/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="business" value="shg-l@hotmail.fr">
			<input type="hidden" name="item_name" value="Quote enquiry - ruehcram">
			<input type="hidden" name="currency_code" value="EUR">
			<input type="hidden" name="amount" value="21.00" />
			<input type="submit" value="ask for a quote"/>
			</form>
			
			
			</div>
			
			</div>
		<?php }


?>



</div>
&copy; 2012-2015 Ruehcram le Marcheur



</body>
</html>
