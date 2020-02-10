<?php

/*
	Template name: Dev old
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
				
				$block_types = WP_Block_Type_Registry::get_instance()->get_all_registered();
				echo '<pre>';
					var_dump($block_types);
				echo '</pre>';
			?>
<?php
/*
	
	$strings = array("https://open.spotify.com/album/3WvQpufOsPzkZvcSuynCf3?nd=1 ","https://open.spotify.com/album/6pk7Ov4ts49vheVQHWmUlp","https://www.deezer.com/fr/album/1663857","https://open.spotify.com/album/3rX1canXFRWqevE2XG6rTw ","https://open.spotify.com/album/0GNDdLfBY9hHJK4x4BU6Ck?autoplay=true&v=L","https://alaclairensemble.bandcamp.com/album/499","https://www.analekta.com/albums/aux-frontieres-de-nos-reves-alain-lefevre-orchestre-centre-national-arts/","https://alarmwillsound.bandcamp.com/album/alarm-will-sound-presents-modernists","https://open.spotify.com/album/1bHFgyItmSogZKb5fWOefI?autoplay=true&v=L ","https://www.deezer.com/en/album/43233291","https://sandy.bandcamp.com/album/beach-music","https://alexzhanghungtai.bandcamp.com/album/divine-weight-2 ","https://open.spotify.com/album/2a9xVKjYN5XqfqWmZyJGm0","https://www.deezer.com/fr/album/40733531","https://www.deezer.com/fr/album/75025922","https://www.deezer.com/fr/album/961521","https://open.spotify.com/album/4VFG1DOuTeDMBjBLZT7hCK?nd=1 ","https://andyshauf.bandcamp.com/album/the-party","https://gutfeelingisanguish.bandcamp.com/album/anguish","https://open.spotify.com/album/5087akA4HbLY0aO2skpjsd  ","https://antoinecorriveau.bandcamp.com/album/cette-chose-qui-cognait-au-creux-de-sa-poitrine-sans-vouloir-sarr-ter","https://open.spotify.com/album/5weEWI9SQVlfthayoNDu2b","https://anothertimbre.bandcamp.com/album/chamber-works","https://open.spotify.com/album/1MQO4j8QExVgmnplbIodEU ","https://open.spotify.com/album/3DrgM5X3yX1JP1liNLAOHI?autoplay=true&v=L","https://archspire.bandcamp.com/","https://www.deezer.com/en/album/94378202","https://www.deezer.com/us/album/11416130","https://www.deezer.com/fr/album/455140","https://atakak.bandcamp.com/album/obaa-sima","https://www.deezer.com/fr/album/69323082","https://avecpasdcasque.bandcamp.com/album/astronomie","https://open.spotify.com/album/58gf6kYIJs1vM9mQMz8Roh?si=abge5gA6Rxmk8UtI9k40XQ","https://baroness.bandcamp.com/     ","https://open.spotify.com/album/4sYpTER2iT2Y7Kf4VsfUne?autoplay=true&v=L","https://redshiftmusicsociety.bandcamp.com/album/katana-of-choice","https://www.deezer.com/en/album/92679722","https://bernardadamus.bandcamp.com/album/n-2-3","https://www.deezer.com/fr/album/77809622 ","https://www.deezer.com/en/album/40497141","https://open.spotify.com/album/02ryxjBXuwxly7d0aWi5Gk?autoplay=true&v=L","https://open.spotify.com/album/1bsLkHcWAGUao6Z1dHOEIB?autoplay=true&v=L","https://open.spotify.com/album/159ORixBSSemxiualv1Woj?si=i58axfFTRlecZ0B_Nm-45g","https://open.spotify.com/album/1JlvIsP2f6ckoa62aN7kLn?autoplay=true&v=L ","https://www.deezer.com/us/artist/160978","https://boyharsher.bandcamp.com/album/yr-body-is-nothing","https://www.deezer.com/en/album/54263162","https://open.spotify.com/album/2s5WYOg1fezE42u6X0GqJc","https://open.spotify.com/artist/6PkSULcbxFKkxdgrmPGAvn","https://charlesbradley.bandcamp.com/album/no-time-for-dreaming","https://open.spotify.com/album/6n4cr9Q90zI9Dn2BgvWwAh","https://charli-xcx.bandcamp.com/album/true-romance-explicit","https://open.spotify.com/album/4rpm9Ez8nfVsQvNmHDbgyp?autoplay=true&v=L","https://open.spotify.com/album/6tINg5BLOrRkEpvx7rvINA?si=V8VyECi2QCeWPAEQJ45l_A","https://open.spotify.com/album/3hvhEy9W9oygay1GpqRkOt?si=avOmJbarQxWgYvYHwiTRdQ","https://open.spotify.com/album/1w71axmi9UJfsKCdEqGdNm ","https://semanticarecords.bandcamp.com/album/all-in-all-semantica-73cd","https://open.spotify.com/album/7Lnfvco5xEeqoqwZdRhGJb?si=4Kxy9tF6SXex4yb3WMrvog","https://open.spotify.com/album/4WMd6CHBI1xqYjD8svvoES?si=3gtNyQw8RAezZKJxxGP5XQ","https://open.spotify.com/album/5Hfbag0SsHxafx1SySFSX6?si=l7G8t5h5RlWCCNLyIXg9Qg","https://dalekipecac.bandcamp.com/album/endangered-philosophies","https://open.spotify.com/album/3e7vtKJ3m1zVh38VGq2g3H","https://davidbinney.bandcamp.com/album/graylen-epicenter","https://www.deezer.com/us/album/12118252","https://www.deezer.com/pl/album/109487872  ","https://open.spotify.com/album/7ltRG1oLVFSKSlU28S0VNW?nd=1 ","https://open.spotify.com/album/4m7nXsEBOnFJrxr5A21zlg?si=6-3ewHZlQueeo-UlD42g8g","https://open.spotify.com/album/1HUMjB15ARg96KIypcGzYY?si=bRFzCR9ARt2-wMCpWaTkLg","https://denguefever.bandcamp.com/album/the-deepest-lake","https://www.deezer.com/en/album/7637868  ","https://open.spotify.com/album/2j0GggDDCSeY6vpccGLIq1?autoplay=true&v=L","https://www.deezer.com/fr/album/1246233","https://open.spotify.com/album/1in9OlbNsLoJ8obUGhktxa?si=M-2arEUNRRKXrhsmpqI0tQ","https://open.spotify.com/album/16OZIxz9M25yFnORO5TCi5?autoplay=true&v=L","https://www.deezer.com/fr/album/102958812","https://imprec.bandcamp.com/album/feel-free","https://duchesssays.bandcamp.com/album/sciences-nouvelles","https://www.deezer.com/us/album/6825654","https://open.spotify.com/track/4LJLNwuT8Bzk4FpkaHyZBl?autoplay=true&v=T","https://open.spotify.com/album/4thL3jIVt8oFNZgvnHslkU?autoplay=true&v=L","https://open.spotify.com/album/5TSoZQqcOfWznk4ttT8kM2?si=lWvVYbkbTsSN0zz7GyFPRA","https://open.spotify.com/album/2hnquPCPDsr3Srk64rdeVS","https://www.deezer.com/fr/album/7240950","https://open.spotify.com/album/1BOfOlZo9Nzx7SmYAucY9t?si=Omo7yOtiRtm0BR0rngMJVw","https://www.deezer.com/en/album/60690442","https://open.spotify.com/album/7lrBYSO9Rqnq7XPEHMNRtQ","https://open.spotify.com/album/7uccppFArLf9dNOwDftOZa","https://paneuropeanrecording.bandcamp.com/album/l-viathan","https://open.spotify.com/album/0xtTojp4zfartyGtbFKN3v?autoplay=true&v=L","https://open.spotify.com/album/29luvT98TnqHjVDYSRbbrj ","https://open.spotify.com/album/6XoxeeeyZgzqUMzUBUSDG9","https://open.spotify.com/album/3mH6qwIy9crq0I9YQbOuDf ","https://open.spotify.com/album/392p3shh2jkxUxY2VHvlH8?nd=1 ","https://www.deezer.com/fr/album/6688278","https://open.spotify.com/album/7exqkn1MEoUhfDRMjwCOgm?nd=1 ","https://open.spotify.com/album/1S5FP0ZGG6XGOIdL8OsrZB ","https://open.spotify.com/album/30bTXMxsMsYn7QbwmDW3rj?autoplay=true&v=L","https://open.spotify.com/album/3UMyU8kPAgXMspBufRjmIl","https://gorguts.bandcamp.com/album/colored-sands","https://open.spotify.com/album/2dIGnmEIy1WZIcZCFSj6i8?autoplay=true&v=L","https://obliqsound.bandcamp.com/album/the-lost-and-found ","https://www.deezer.com/en/album/7873493","https://grouper.bandcamp.com/album/a-i-a-dream-loss","https://helenahauff.bandcamp.com/album/discreet-desires","https://open.spotify.com/album/3qzmmmRmVBiOuMvrerfW4z?autoplay=true&v=L ","https://hyperculteband.bandcamp.com/album/hyperculte","https://www.deezer.com/en/album/7316063","https://www.deezer.com/fr/album/62099182","https://open.spotify.com/album/2JLMlrYV74wjlOqgsm2hfX?si=fSEx5QCzSoambMADW0_jzQ","https://www.hyperion-records.co.uk/dc.asp?dc=D_CDA67924","https://grupoife.bandcamp.com/album/iiii-iiii-full-album","https://www.deezer.com/en/album/76736102","https://open.spotify.com/album/6Gk0nFXMulJtAle3W4vXF1 ","https://intlanthem.bandcamp.com/album/fly-or-die","https://www.deezer.com/fr/album/1648602","https://open.spotify.com/album/0AVPusXNzK1jWwefBiPJ5I?si=DJCDkHC0QAqNlQvclNbqeQ","https://open.spotify.com/album/1Lci4bx7JIuCC8pnBNX7ds?autoplay=true&v=L","https://jeanleloup.bandcamp.com/album/paradis-city","https://www.deezer.com/fr/album/12867362","https://shiningskullstudio.bandcamp.com/album/songs-of-forgiveness","https://open.spotify.com/album/2msK7Z3XhU7cIL42PWW8qG?autoplay=true&v=L","https://open.spotify.com/album/568Hw1PX6K12BdqyFSBj1E?autoplay=true&v=L","https://jeromeminiere.bandcamp.com/","https://jimmyhunt.bandcamp.com/album/jimmy-hunt","https://jkflesh.bandcamp.com/album/posthuman  ","https://jlin.bandcamp.com/album/black-origami ","https://open.spotify.com/album/3hWO2ISsixF1ezfQFGDM9V?si=G9iAJsNJQG6KfNr3_AJv0w","https://www.deezer.com/en/album/71694732","https://www.deezer.com/en/album/87375622","https://jonhassell.bandcamp.com/album/listening-to-pictures-pentimento-volume-one","https://jonhopkins.bandcamp.com/album/immunity","https://open.spotify.com/album/7fvNUuHA96nH77MKlVo9Uc","https://juliaholter.bandcamp.com/","https://www.deezer.com/en/album/63530192","https://heyjuniore.bandcamp.com/album/ouh-l-l","https://kamasiwashington.bandcamp.com/album/the-epic-1 ","https://open.spotify.com/album/20r762YmB5HeofjMCiPMLv ","https://open.spotify.com/album/20r762YmB5HeofjMCiPMLv?nd=1 ","https://umorrex.bandcamp.com/album/sirens","https://www.deezer.com/fr/album/7453314","https://open.spotify.com/album/1dZZh7PvVgce1DDsDPzy8Z?nd=1 ","https://kelelafade.bandcamp.com/album/cut-4-me ","https://keluar.bandcamp.com/album/keluar","https://open.spotify.com/album/6w7lqIsvDPgTChMrPw5oIL?autoplay=true&v=L","https://open.spotify.com/album/4WgO7FEa9fzcyOIabUIbQR","https://open.spotify.com/album/6Ulu31dfRTpIAud08ZIhXd","https://klopelgag.bandcamp.com/","https://kokokomusic.bandcamp.com/album/fongola","https://www.deezer.com/en/album/47234402","https://open.spotify.com/album/2uRTsStAmo7Z2UwCIvuwMv?si=TjJS_LMhSPOtcGR6SZsctw","https://open.spotify.com/album/284CrOYQvoB5GQAcmx5Xkx?autoplay=true&v=L","https://www.deezer.com/fr/album/7511186","https://open.spotify.com/album/5XpEKORZ4y6OrCZSKsi46A","https://laurelhalo.bandcamp.com/album/dust","https://open.spotify.com/album/4svLfrPPk2npPVuI4kXPYg?nd=1 ","https://open.spotify.com/album/3jeTB3j3QmUs8SPIVleHtU","https://leslouanges.bandcamp.com/album/la-nuit-est-une-panth-re","https://lilandy.bandcamp.com/album/all-who-thirst-come-to-the-waters","https://open.spotify.com/album/3rX1canXFRWqevE2XG6rTw","https://limpwrist.bandcamp.com/album/facades","https://lineaaspera.bandcamp.com/album/linea-aspera-lp","https://linguaignota.bandcamp.com/album/caligula","https://lordecho.bandcamp.com/album/harmonies-3rd-album","https://lustforyouth.bandcamp.com/album/compassion","https://lydiakepinski.bandcamp.com/album/premier-juin","https://open.spotify.com/album/2D7n3im1n6of8bdRPHK0TR?si=iwIlsO3AThK3KcCcoKUKug","https://intlanthem.bandcamp.com/album/universal-beings","https://mariedavidson.bandcamp.com/album/working-class-woman","https://www.deezer.com/en/album/75915792","https://open.spotify.com/album/5ei4IUW3UMNR2fhunw6x9n","https://maryhalvorson.bandcamp.com/album/away-with-you","https://www.deezer.com/en/album/75684362","https://matiasaguayo.bandcamp.com/album/the-visitor-c-meme-lp-03","https://open.spotify.com/album/2zIUNZYP37cvfZI7JJ3kL2","https://meridianbrothers.bandcamp.com/album/desesperanza","https://open.spotify.com/album/716fnrS2qXChPC3J2X73pK?si=bzG3C8rrRHWAdgVog4ONPA","https://open.spotify.com/album/1leybBQ30xxGOJEwsRCyKg?si=6Zm6JiC1RdWYTJjdkK2Otw","https://open.spotify.com/album/2tJF2pIy9E28Jv8tfYAkWn","https://open.spotify.com/album/653wRjqO0GOZPQPcXpeAXD?autoplay=true&v=L","https://open.spotify.com/album/46sews77v3EoXe6PzYmYdD?si=2UWNmcEsTNmJplqGMfAKog","https://open.spotify.com/album/0mcy7rGwHhNsPQTaNbvaac?autoplay=true&v=L","https://www.deezer.com/fr/album/11611654","https://neobliviscarissom.bandcamp.com/album/citadel","https://www.deezer.com/en/track/131661710","https://open.spotify.com/album/56h39h6SBSUkj9ez7sXZBN ","https://fperecs.bandcamp.com/album/mandorla-awakening-ii-emerging-worlds","https://www.deezer.com/fr/album/86017202","https://ninosdubrasil.bandcamp.com/album/vida-eterna ","https://nonameraps.bandcamp.com/album/room-25","https://nxworries.bandcamp.com/","https://obialechef.bandcamp.com/album/soufflette","https://www.deezer.com/fr/album/49458742","https://open.spotify.com/album/198JgCiP5oHBycAKedKHRm?si=IPvkQrnnRmi0vzRV8jgO0g","https://peineperdue.bandcamp.com/album/nuit-blanche","https://pharmakon.bandcamp.com/album/abandon","https://philippeb.bandcamp.com/album/variations-fant-mes ","https://philippebrach.bandcamp.com/album/le-silence-des-troupeaux","https://phronesistrio.bandcamp.com/album/life-to-everything","https://open.spotify.com/album/3XKw0rNmzEiDXC3Dg7eTPc","https://open.spotify.com/album/0eT3LEaBjGYxLrodHdw5SR","https://www.deezer.com/fr/album/751052","https://open.spotify.com/album/0VI3ERMY6YzfZrgivHPr4E?si=BozorWnGTvWVPpitKVSQZw","https://actuellecd.com/fr/album/5318/Quatuor_Bozzini/John_Cage_Four","https://www.deezer.com/en/album/13860964","https://radian.bandcamp.com/album/on-dark-silent-off","https://open.spotify.com/album/6vuykQgDLUCiZ7YggIpLM9","https://open.spotify.com/album/1NC1JxgjI6JFc3YR9JstXb","https://open.spotify.com/album/1YVRLpBcaPU6fefQdiOHYe?si=4pSMRzqpRKGdrv8Uf5obEw","https://open.spotify.com/album/1yqUCdbw73DpnHBVDwNa3X","https://open.spotify.com/album/5gCev1aMAHiG6qmS32mfzj?autoplay=true&v=L","https://open.spotify.com/album/4ujHWUmBMvOfZ96BZkMrkg?si=hUFGhKnIRCeRPWDHRSvnNg","https://www.deezer.com/en/album/6337932","https://open.spotify.com/album/3RLBT6Do3B4ZbX5eJBdCH0?autoplay=true&v=L ","https://open.spotify.com/album/7wolGPrDkhcznLNfyFH5sk?si=jNC27FmfSE-R4w59uo9yJw","https://open.spotify.com/album/2gUSWVHCOerKhJHZRwhVtN?nd=1 ","https://open.spotify.com/album/0aMC5DDAF86GvYNPaivEKd./","https://www.deezer.com/fr/album/8887817","https://open.spotify.com/album/0F1pMhF8Vy74nKkQeLBfrd?autoplay=true&v=L ","https://shepastawayofficial.bandcamp.com/album/belirdi-gece-2","https://open.spotify.com/album/72SxevUVnLylywqCLdtlS2","https://open.spotify.com/album/2yegc4SUhhXxUXUavLHUqL ","https://www.deezer.com/en/album/52754392","https://www.deezer.com/en/album/9858444","https://open.spotify.com/album/3Yko2SxDk4hc6fncIBQlcM?autoplay=true&v=L","https://solids.bandcamp.com/album/blame-confusion","https://open.spotify.com/album/3jCAbl4K4iquJyhzvSJEov","https://sonlux.bandcamp.com/album/we-are-rising","https://sonsofkemet.bandcamp.com/album/lest-we-forget-what-we-came-here-to-do","https://open.spotify.com/album/1Lci4bx7JIuCC8pnBNX7ds?autoplay=true&v=L","https://open.spotify.com/album/1cmsDWzQMLhffPHxxK8AP6","https://www.deezer.com/fr/album/6851659 ","https://open.spotify.com/album/5U7GN7wM8nZKYeeOoYhPjC?autoplay=true&v=L ","https://open.spotify.com/album/4KnFXX4nObGw6rq9aQmSyf","https://open.spotify.com/album/2KnkXRKacNfNhC65PCoCTm","https://sylviepaquette.bandcamp.com/album/terre-originelle","https://open.spotify.com/album/76290XdXVF9rPzGdNRWdCh","https://open.spotify.com/album/79dL7FLiJFOO0EoehUHQBv?si=KXvmq2WlR1ibNplG09BqCw","https://open.spotify.com/album/2MiUUnuUmi24pJKJ1xjeHz?autoplay=true&v=L","https://teebs.bandcamp.com/album/ardour ","https://open.spotify.com/album/2kkinh3XS3WiGESgpExNOh?autoplay=true&v=L","https://open.spotify.com/album/1ylO9L4yH3HK9ZZ0XjefWw?autoplay=true&v=L","https://thebudosband.bandcamp.com/album/the-budos-band-iii","https://thecometiscoming.bandcamp.com/album/channel-the-spirits","https://open.spotify.com/album/5M3Cx38HT8sD8ulnrSZsXi?si=KQwZ_40IRFmQMUd6ILRN-Q     ","https://open.spotify.com/album/25sYZjutddzUpXNbeQ7bEC?nd=1 ","https://open.spotify.com/album/0rxG3s3bC5OD2ANhNhgQr9?si=_cCf-6prTYibmRatTgJrZg","https://matchlessrecordings.com/music/music-piano-and-strings-morton-feldman-vol-1","https://open.spotify.com/album/14xxjLlbGy8ACm4MorBjD5","https://open.spotify.com/album/5KDMu6ty7UnbdmtrVtyGys","https://timhecker.bandcamp.com/album/ravedeath-1972","https://timbertimbrefth.bandcamp.com/album/hot-dreams","https://tysegall.bandcamp.com/album/melted","https://open.spotify.com/album/2nkto6YNI4rUYTLqEwWJ3o","https://www.deezer.com/en/album/41934431  ","https://open.spotify.com/album/3NaBTnzFcmFsjEfluKhJ1Y ","https://www.deezer.com/fr/album/69960482","https://vickychow.bandcamp.com/album/michael-gordon-sonatra","https://www.deezer.com/sv/album/8078212","https://open.spotify.com/album/4WMVFHCPiUEurlsWDF1Deq?autoplay=true&v=L","https://open.spotify.com/album/5h3WJG0aZjNOrayFu3MhCS","https://violettpi.bandcamp.com/album/ev ","https://open.spotify.com/album/097DmmcskEDBUEgFJaIbvG?autoplay=true&v=L","https://www.deezer.com/sv/album/6231366","https://open.spotify.com/album/1ylO9L4yH3HK9ZZ0XjefWw?si=js67dcryQcmQUHJDo6FyTw ","https://open.spotify.com/album/4q2ewX890o1tPVENGOczug?si=GV26QPZRReWZZjSKePOh8A","https://ytst-pbr.bandcamp.com/album/dirt","https://open.spotify.com/album/6j2QLaUubF2uT21toqdEXe?si=yUwxjys2RIefZRJIP2Oycg");
	 
function lecteur_audio($string){
		
		$embed = "";
		
		preg_match('/deezer/',$string, $deezer);
		preg_match('/spotify/',$string, $spotify); 

		if( !empty($deezer) ){
			 
			$toto = explode('/', $string);
			$id = end($toto);
			
			$embed = ' <!-- wp:html -->
			 <iframe scrolling="no" frameborder="0" allowTransparency="true" src="https://www.deezer.com/plugins/player?format=classic&autoplay=false&playlist=true&width=700&height=350&color=5BC6E8&layout=&size=medium&type=album&id='.$id.'&app_id=1" width="100%" height="350"></iframe>
			 <!-- /wp:html -->';
		 }
		 
		 if(  !empty($spotify) ){
			 
			 $toto = explode('/', $string);
			 $id = end($toto);
			 
			$embed = '<!-- wp:core-embed/spotify {"url":"<?php echo $string;?>","type":"rich","providerNameSlug":"spotify","align":"left","className":"wp-embed-aspect-9-16 wp-has-aspect-ratio"} -->
<figure class="wp-block-embed-spotify alignleft wp-block-embed is-type-rich is-provider-spotify wp-embed-aspect-9-16 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
'.$string.'
</div></figure>
<!-- /wp:core-embed/spotify -->';
			 
		 }
		 
		 return $embed;
		 

}
*/
?>			
			<?php
				
/*
				$rags = array(
					'post_type' => 'artiste',
					'posts_per_page' => -1,
					'post_status' => 'any'
				);
				
				$que_ry = new WP_Query($rags);
				
				while($que_ry->have_posts()){
					
					$que_ry->the_post();
					
					$pid = get_the_id();
					$top_250_id = get_field('id_import_top_200',$pid);
					
					$po = get_posts(
						array(
							'post_type' => 'records',
							'meta_key' => 'id_import_top_200',
							'meta_value' => $top_250_id
						)
					);
					foreach( $po as $p ){
						//update_field('field_5de03e5a998bf',$p->ID, $pid);

					}
					
				}
*/
			?>


			<?php
/*
				
				$rags = array(
					'post_type' => 'records',
					'posts_per_page' => -1,
					'post_status' => 'any'
				);
				
				$que_ry = new WP_Query($rags);
				
				while($que_ry->have_posts()){
					
					$que_ry->the_post();
					
					$pid = get_the_id();
					$top_250_id = get_field('id_import_top_200',$pid);
					
					$po = get_posts(
						array(
							'post_type' => 'artiste',
							'meta_key' => 'id_import_top_200',
							'meta_value' => $top_250_id
						)
					);
					foreach( $po as $p ){
						//update_field('field_5dd70557f5639',$p->ID, $pid);

					}
					
				}
*/
			?>
			
			
			<?php
/*
				//update_user_meta( int $user_id, string $meta_key, mixed $meta_value, mixed $prev_value = '' )
				$args = array(
					'role' => 'author'
				);
				$wp_user_query = new WP_User_Query($args);
				$authors = $wp_user_query->get_results();
				
				foreach( $authors as $author ){
					$current_display_name = $author->display_name;
					$current_display_name_a = explode(' ', $current_display_name);
					$new_display_name = implode(' ', array_reverse($current_display_name_a));
					echo '<pre>';
						var_dump($author);
					echo '</pre>';
					//update_user_meta( $author->ID,'display_name', $new_display_name, $current_display_name );
					 //wp_update_user( array( 'ID' => $author->ID, 'display_name' => $new_display_name ) );
				}
*/
				
				
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	

<?php
get_footer();
