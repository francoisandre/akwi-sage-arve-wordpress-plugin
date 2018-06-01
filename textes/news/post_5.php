<?php
function akwi_sage_arve_addPost5(){
$my_post = array(
'post_title'    => wp_strip_all_tags("Avis du comité d’agrément"),
'post_content'    => "<div class='singleBloc'>   <div class='dateSingle'>   Le 3 décembre 2016  </div>   <h3>Avis du comité d’agrément</h3>   <div class='texteSingle'>   <p><em>02 décembre 2016, le comité d’agrément émet un avis favorable !</em></p>   <p>Dans le cadre de la consultation par les services de l’Etat, la commission permanente du comité de bassin Rhône Méditerranée chargée de donner un avis sur les projets de SAGE a émis un avis favorable au projet de SAGE.&nbsp;Cette présentation marque une nouvelle étape vers l’approbation finale du SAGE de l’Arve prévue en 2017.</p>   <p><span class='text_exposed_show'>Le comité a félicité la CLE pour la qualité technique des documents, la cohérence d’ensemble et l’important travail de concertation qui ont été réalisés depuis plus de 7 ans !</span></p>   <div id='attachment_385' style='width: 310px' class='wp-caption aligncenter'>    <img class='wp-image-385 size-medium' src='http://www.sage-arve.fr/wp-content/uploads/2017/03/IMG_0174-1-300x225.jpg' alt='IMG_0174' width='300' height='225' srcset='http://www.sage-arve.fr/wp-content/uploads/2017/03/IMG_0174-1-300x225.jpg 300w, http://www.sage-arve.fr/wp-content/uploads/2017/03/IMG_0174-1-768x576.jpg 768w, http://www.sage-arve.fr/wp-content/uploads/2017/03/IMG_0174-1-1024x768.jpg 1024w, http://www.sage-arve.fr/wp-content/uploads/2017/03/IMG_0174-1-600x450.jpg 600w, http://www.sage-arve.fr/wp-content/uploads/2017/03/IMG_0174-1.jpg 1600w' sizes='(max-width: 300px) 100vw, 300px'>    <p class='wp-caption-text'>Présentation du projet de SAGE au comité d’agrément, le 2 décembre 2016</p>   </div>   <div class='text_exposed_show'></div>  </div>   <div class='both'></div>  </div>",
'post_status'   => 'publish',
'post_date'    => '2016-12-03'
);
wp_insert_post( $my_post, true );
}
?>
