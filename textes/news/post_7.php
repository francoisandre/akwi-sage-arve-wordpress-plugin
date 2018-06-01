<?php
function akwi_sage_arve_addPost7(){
$my_post = array(
'post_title'    => wp_strip_all_tags("Validation du projet de SAGE"),
'post_content'    => "<div class='singleBloc'>   <div class='dateSingle'>   Le 1 juillet 2016  </div>   <h3>Validation du projet de SAGE</h3>   <div class='texteSingle'>   <p><em>30 juin 2016, une eau pure du Mont-Blanc à Genève&nbsp;!</em></p>   <p>Et voilà, après 7 années de diagnostic, d’études techniques et de concertations visant systématiquement le consensus le plus large sur l’ensemble des sujets traitant de l’eau sur le bassin versant de l’Arve entre le Mont-Blanc et Genève, la Commission Locale de l’Eau (CLE) vote le projet de Schéma d’Aménagement et de Gestion des Eaux (SAGE).</p>   <p>Etape capitale où les acteurs du territoire (élus, acteurs économiques et associatifs) et les acteurs institutionnels (Etat et ses services, Agence de l’Eau) arrêtent le projet sur lequel ils se sont mis collectivement d’accord.</p>   <div id='attachment_375' style='width: 310px' class='wp-caption aligncenter'>    <img class='wp-image-375 size-medium' src='http://www.sage-arve.fr/wp-content/uploads/2017/03/IMG_4058-300x225.jpg' alt='IMG_4058' width='300' height='225' srcset='http://www.sage-arve.fr/wp-content/uploads/2017/03/IMG_4058-300x225.jpg 300w, http://www.sage-arve.fr/wp-content/uploads/2017/03/IMG_4058-768x576.jpg 768w, http://www.sage-arve.fr/wp-content/uploads/2017/03/IMG_4058-1024x768.jpg 1024w, http://www.sage-arve.fr/wp-content/uploads/2017/03/IMG_4058-600x450.jpg 600w' sizes='(max-width: 300px) 100vw, 300px'>    <p class='wp-caption-text'>La CLE du SAGE de l’Arve, le 30 juin 2016</p>   </div>  </div>   <div class='both'></div>  </div>",
'post_status'   => 'publish',
'post_date'    => '2016-07-01'
);
wp_insert_post( $my_post, true );
}
?>
