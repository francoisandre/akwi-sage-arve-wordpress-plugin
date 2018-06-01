<?php
function akwi_sage_arve_addPost1(){
$my_post = array(
'post_title'    => wp_strip_all_tags("Venez assister à la prochaine réunion publique !"),
'post_content'    => "<div class='singleBloc'>   <div class='dateSingle'>   Le 24 novembre 2017  </div>   <h3>Venez assister à la prochaine réunion publique !</h3>   <div class='texteSingle'>   <p>Dans le cadre de l’enquête publique du SAGE de l’Arve, une série de 13 réunions publiques seront menées entre le 20 novembre et le 22 décembre 2017 sur tout le territoire du SAGE. La prochaine réunion publique se déroulera le</p>   <h4 style='text-align: center;'><strong>Jeudi 21 décembre à 20h au Grand-Bornand<br></strong></h4>   <p style='text-align: center;'><strong>Espace Grand Bo, Salle Soli, 243 route du Bornes, Grand-Bornand</strong></p>   <p style='text-align: center;'><em><strong><br></strong></em></p>   <p>Nous vous attendons nombreux pour assister à la présentation du projet de SAGE de l’Arve !</p>   <p style='text-align: center;'><a href='http://www.sage-arve.fr/wp-content/uploads/2017/11/SAGE-Arve-Reunions-pub-Programmation-à-communiquer.pdf'>Retrouvez le programme complet des réunions publiques ICI</a></p>   <p style='text-align: center;'><img class='alignnone size-medium wp-image-670' src='http://www.sage-arve.fr/wp-content/uploads/2017/11/RP-Bonneville-18122017-300x225.jpg' alt='RP Bonneville 18122017' width='300' height='225' srcset='http://www.sage-arve.fr/wp-content/uploads/2017/11/RP-Bonneville-18122017-300x225.jpg 300w, http://www.sage-arve.fr/wp-content/uploads/2017/11/RP-Bonneville-18122017-768x576.jpg 768w, http://www.sage-arve.fr/wp-content/uploads/2017/11/RP-Bonneville-18122017-1024x768.jpg 1024w, http://www.sage-arve.fr/wp-content/uploads/2017/11/RP-Bonneville-18122017-600x450.jpg 600w' sizes='(max-width: 300px) 100vw, 300px'></p>   <p style='text-align: center;'>Réunion publique à Bonneville</p>  </div>   <div class='both'></div>  </div>",
'post_status'   => 'publish',
'post_date'    => '2017-11-24'
);
wp_insert_post( $my_post, true );
}
?>
