<?php
/**
 * Petsbot. Generate answers to kicked-out spammers
 * User: petskratt
 * Date: 05/10/2017
 * Time: 10:40
 */


$jutulind = [
	'get_me_the_boss' => [
		'reason'   => 'Kes te üldse selline olete? tahan rääkida kellegi kompetentsega!',
		'response' => 'Kolleeg edastas mulle Teie soovi suhelda kellegi pädevana. Mina olen võrgus aastast \'89 ning
kuna ühtki teist nii pika pädevusega isikut võtta ei olnud, siis loodan, et lepite.',
	],
	'why_end'         => [
		'reason'   => 'Miks te teenuse lõpetate ja ettevõtlusvabadust piirate?',
		'response' => 'Kuna iga selline juhtum tähendab lisaks eetilisele probleemile meie jaoks ka otsest kulu - spämmiraporti tõttu peame suhtlema spamcop\'i vms teenusega, tehnikud peavad päästma IP blacklistist, kannatab seaduskuulekate ja head tava austavate klientide e-posti deliverability, klienditugi ja mina raiskame ajsa selgitustööle mis enamasti rikkuja meelemuutuseni ei vii - siis juba puhtalt majanduslikul kaalutlusel peame ainuvõimalikuks äriline suhe lõpetada. Eetilisest vaatest edastama selliste juhtumite kohta info ka teistele teenusepakkujatale.',
	],
	'why_spam'        => [
		'reason'   => 'See ei ole spämm vaid kasulikud pakkumised!',
		'response' => 'Selliseid pakkumisi ei tohi saata, sest internetikogukond on seisukohal, et masspostitusega peab olema vabatahtlikult ja täie teadmisega liitunud ning muul moel kogutud - ja eriti ostetud - aadressidele saatmine ei ole absoluutselt aktsepteeritav (listi müümine on eriti probleemne). Vt nt https://kb.mailchimp.com/lists/growth/requirements-and-best-practices-for-lists',
	],
	'others'          => [
		'reason'   => 'Aga teised teevad kah!',
		'response' => 'Mistahes vallas tegutsema hakkamisel on juba puhtalt äririski maandamiseks oluline, et ettevõtja ennast vastava valdkonna seaduste ja hea tavaga kurssi viiks. Kellegi teise poolt seaduste või tavade rikkumine ei saa olla sellise tegevuse õigustuseks. Vajalikud lugemis-soovitused leiab https://www.zone.ee/blogi/no-spam-deklaratsioon/',
	],
	'purchased'       => [
		'reason'   => 'Mulle kinnitati, et on kõigi õigustega list!',
		'response' => 'Ostetud listid loetakse kõigi turundusliku e-posti saatmise teenuse puhul keelatuks.',
	],
	'private_email'   => [
		'reason'   => 'Eraisikud ise andsid oma epostid!',
		'response' => 'Väidate, et eraisikud on vabatahtlikult oma aadressid andnud ning nõustunud massposti saamisega.
		Enamikul spämmiks kvalifitseeruvatel juhutudel see tegelikult nii ei ole. Vajadusel saame pakkuda nõustamisteenust ja aidata teil
		mõista, miks kasutajatele tundub, et nad ei ole nõustnud. Teenus on tunnitasuline, hinnaga 120€+km/h. Täpne maht selgub esialgse auditi
		järel, selle minimaalne ajakulu on 4h.',
	],
	'business_email'  => [
		'reason'   => 'Aga need on avalikest allikatest pärit ettevõtete aadressid!',
		'response' => 'Vahet pole mis aadressile saadad - kui nad pole seda tellinud, siis on ju tegemist tellimata masspostiga. Kui jalutad mööda mu KÜ aiast ja vaatad, et see vajaks parandamist - siis on loomulikult OK otsida üles mu aadress ja teha mõtestatud pakkumine. Kujuta vahelduseks ette kui Eesti 40k OÜd (või palju neid hetkel ongi täpselt) alustaks päeva sellega, et saadaks kõigile teistele postiga teate OSTA MU KAUP ÄRA, VÄGA HEA KAUP. Me muuga ei saakski ju tegeleda kui postkasti puhastamisega, eksole?',
	],
	'over_and_out'    => [
		'reason'   => 'Kas tuleks igaveseks hüvasti jätta?',
		'response' => 'Mul on kahju, et me suhe sellisel moel karile jooksis.
		Nüüd on aga mõlemal poolel aeg edasi liikuda, mina jätkan seaduskuulekate klientide teenindamist ning edastan
		info uut kodu otsiva domeeni kohta ka teenusepakkujate spämmichatti.',
	],
];

$out = "";

if ( ! empty( $_POST ) ) {

	if ( ! empty( $_POST['to'] ) ) {
		$out .= "<p>Tere, {$_POST['to']}!</p>" . PHP_EOL;
	} else {
		$out .= "<p>Tere!</p>" . PHP_EOL;
	}

	foreach ( $_POST['chk'] as $key => $value ) {
		if ( ! empty( $jutulind[$key]['response'] ) ) {
			$out .= "<p>" . $jutulind[$key]['response'] . "</p>" . PHP_EOL;
		}
	}

	$out .= "<p>-peeter marvet<br>twitter @petskratt</p>" . PHP_EOL;

	$out .= '<a href="./" class="button">Tagasi vormi</a>' . PHP_EOL;

} else {
	foreach ( $jutulind as $key => $value ) {
		$out .= '<div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="chk[' . $key . ']">' . $value['reason'] . '</label></div>' . PHP_EOL;
	}
}


?><!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">

	<div class="row">
		<div class="col">
			<?php if ( empty( $_POST ) ) : ?>
				<h1>Vastusegeneraator</h1>
				<p></p>

				<form method="post">
					<div class="form-group">
						<label for="to">Kellele vastad?</label>
						<input type="text" class="form-control" id="to" name="to" aria-describedby="Addressee" placeholder="Juhan Jurakas">
					</div>
					<?php echo $out; ?>
					<button type="submit" class="btn btn-primary">Genereeri vastus!</button>
				</form>
			<?php else :
				echo $out;
			endif; ?>

		</div>
	</div>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>