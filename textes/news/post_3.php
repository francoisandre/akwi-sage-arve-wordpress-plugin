<?php
function akwi_sage_arve_addPost3(){
$my_post = array(
'post_title'    => wp_strip_all_tags("Modification du projet de SAGE de l’Arve"),
'post_content'    => "<div class='singleBloc'>   <div class='dateSingle'>   Le 12 mai 2017  </div>   <h3>Le projet de SAGE a été modifié par la CLE afin de tenir compte des avis reçus.</h3>   <div class='texteSingle'>   <p>Les communes, les groupements intercommunaux, le département de la Haute-Savoie, la Région Auvergne Rhône-Alpes, les chambres consulaires, les services de l’Etat et assimilés ont tous pu émettre un avis sur le projet de SAGE à l’occasion des consultations institutionnelles.</p>   <p>Suite à cela, la Commission Locale de l’Eau (CLE) s’est réunie le lundi 24 avril 2017 pour traiter l’ensemble des avis reçus. Il en ressort une large majorité d’avis favorables et beaucoup ont salué la qualité du projet. Certains avis ont notamment émis des remarques qui ont été pris en compte entraînant une <a href='http://2017-01 amendement projet de SAGE n°2'>modification du projet de SAGE</a> conformément aux règles de fonctionnement de la CLE.</p>   <p>Le projet de SAGE ainsi modifié sera soumis à <a href='http://www.sage-arve.fr/enquete-publique/'>enquête publique</a> avant son approbation définitive.</p>   <p>&nbsp;</p>   <p>&nbsp;</p>   <p><img class='alignnone size-medium wp-image-509 aligncenter' src='http://www.sage-arve.fr/wp-content/uploads/2017/10/photo-CLE1-300x180.jpg' alt='photo CLE1' width='300' height='180' srcset='http://www.sage-arve.fr/wp-content/uploads/2017/10/photo-CLE1-300x180.jpg 300w, http://www.sage-arve.fr/wp-content/uploads/2017/10/photo-CLE1-768x461.jpg 768w, http://www.sage-arve.fr/wp-content/uploads/2017/10/photo-CLE1-1024x614.jpg 1024w, http://www.sage-arve.fr/wp-content/uploads/2017/10/photo-CLE1-600x360.jpg 600w' sizes='(max-width: 300px) 100vw, 300px'></p>   <blockquote>    <p style='text-align: center;'><em>Réunion de la CLE&nbsp;du 24 avril 2017</em></p>   </blockquote>  </div>   <div class='both'></div>  </div>",
'post_status'   => 'publish',
'post_date'    => '2017-05-12'
);
wp_insert_post( $my_post, true );
}
?>
