<?php
function akwi_sage_arve_addPost4(){
$my_post = array(
'post_title'    => wp_strip_all_tags("Résultats de la consultation du SAGE"),
'post_content'    => "<div class='singleBloc'>   <div class='dateSingle'>   Le 8 mars 2017  </div>   <h3>Résultats de la consultation du SAGE</h3>   <div class='texteSingle'>   <p><em>15 janvier 2017, la période de consultation du projet de SAGE touche à sa fin !</em></p>   <p>Après l’arrêté par la CLE du projet de SAGE <a href='http://www.sage-arve.fr/2016/07/validation-du-sage/'>le 30 juin 2016</a>, les collectivités, les chambres consulaires, le conseil régional Auvergne Rhône-Alpes et le conseil départemental de Haute-Savoie ont été consultés entre le 15 juillet et le 15 novembre.</p>   <p>Après l’arrêté par la CLE du&nbsp;rapport environnemental et du projet de SAGE modifié <a href='http://www.sage-arve.fr/2016/09/validation-du-rapport-environnemental/'>le 29 septembre 2016</a>, les services de l’Etat ont été consultés entre le 15 octobre 2016 et le 15 janvier 2017.</p>   <p>&nbsp;</p>   <blockquote>    <p><strong>Résultats</strong> :<strong> l’ensemble des avis sont largement favorables au projet de SAGE ! </strong></p>   </blockquote>   <p>Sur les 59 avis reçus, une quinzaine d’avis ont formulé des remarques&nbsp;sur les documents du SAGE et ses modalités de mise en oeuvre. <a href='http://www.sage-arve.fr/wp-content/uploads/2017/03/SAGE-Arve-Synth%C3%A8se-des-consultations-institutionnelles-version-finale-03032017.pdf'>Une note de synthèse</a> présente de manière exhaustive toutes les remarques issues de ces deux périodes de consultation. Pour la consulter, rdv dans l’espace «&nbsp;Documentation&nbsp;» du site !</p>   <p>&nbsp;</p>   <blockquote>    <p><strong>Et après ?</strong></p>   </blockquote>   <ul>    <li>La CLE se réunira dans les 2 prochains mois afin d’étudier la prise en compte des avis reçus et pour modifier le projet de SAGE en conséquence ;</li>    <li>Le projet de SAGE (éventuellement modifié) sera soumis à l’enquête publique ;</li>    <li>La CLE se réunira de nouveau pour étudier le rapport d’enquête publique et pour modifier le projet de SAGE en conséquence ;</li>    <li>Le projet de SAGE (éventuellement modifié) sera remis au Préfet de Haute-Savoie pour approbation définitive.</li>   </ul>  </div>   <div class='both'></div>  </div>",
'post_status'   => 'publish',
'post_date'    => '2017-03-08'
);
wp_insert_post( $my_post, true );
}
?>