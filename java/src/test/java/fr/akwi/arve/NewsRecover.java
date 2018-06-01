package fr.akwi.arve;

import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.StandardCharsets;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Collection;
import java.util.Date;
import java.util.List;

import org.apache.commons.io.FileUtils;
import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;
import org.junit.Test;

public class NewsRecover {

	private final String NEWS_FOLDER_NAME = "C:/Users/François ANDRE/workspaceSageFA/akwi-sage-arve-wordpress-plugin/textes/news";

	@Test
	public void main() throws Exception {
		File folder = new File(NEWS_FOLDER_NAME);
		FileUtils.deleteDirectory(folder);
		folder.mkdirs();
		List<Post> posts = new ArrayList<Post>();

		posts.addAll(getNewsFromMainPage("http://www.sage-arve.fr/actualites/page/1/"));
		posts.addAll(getNewsFromMainPage("http://www.sage-arve.fr/actualites/page/2/"));

		//		String out = new Scanner(new URL(mainPageUrl).openStream(), "UTF-8").useDelimiter("\\A").next();
		int count = 0;
		for (Post post : posts) {
			getNewsContent(post);
			storePostInFile(count, post);
			count++;
		}
		
		if (count >= 0) {
			generateMainFile(count);
		}
		
		System.out.println(posts);
	}
	
	private void generateMainFile(int count) throws Exception {
		List<String> content = new ArrayList<String>();
		content.add("<?php");
		for (int i = 0; i < count; i++) {
			content.add("include_once(dirname(__DIR__).'\\news\\post_"+i+".php');");
		}
		
		content.add("function akwi_sage_arve_addNewsMain() {");
		for (int i = 0; i < count; i++) {
			content.add("akwi_sage_arve_addPost"+i+"();");
		}
		content.add("}");
		
		content.add("?>");
		File folder = new File(NEWS_FOLDER_NAME);
	    File file = new File(folder, "post_main.php");
	    FileUtils.writeLines(file,  StandardCharsets.UTF_8.name(), content);
	}

	private void storePostInFile(int count, Post post) throws Exception {
		File folder = new File(NEWS_FOLDER_NAME);
	    File file = new File(folder, "post_"+count+".php");
	    List<String> content = new ArrayList<String>();
	    content.add("<?php");
	    content.add("function akwi_sage_arve_addPost"+count+"(){");
	    content.add("$my_post = array(");
	    content.add("'post_title'    => wp_strip_all_tags(\""+post.getTitle()+"\"),");
	   // content.add("'post_content'    => \""+post.getContent()+"\",");
	    content.add("'post_content'    => \""+post.getContent()+"\",");
	    content.add("'post_status'   => 'publish',");
	    content.add("'post_date'    => '"+post.getDate()+"'");
	    content.add(");");
	    content.add("wp_insert_post( $my_post, true );");
	    content.add("}");
	    content.add("?>");
	    FileUtils.writeLines(file,  StandardCharsets.UTF_8.name(), content);
	}

	private void getNewsContent(Post post) throws Exception {
		String content = getContentFromUrl(post.getLink());
		Document doc = Jsoup.parse(content);
		Elements date = doc.select(".singleBloc .dateSingle");
		String aux = date.text();
		if (aux.toLowerCase().startsWith("l")) {
			aux = aux.substring(2);
		}
		aux = aux.trim().toLowerCase();
		SimpleDateFormat arveFormatter = new SimpleDateFormat("dd MMMM yyyy");
        Date tmp = arveFormatter.parse(aux);
        SimpleDateFormat wordpressFormatter = new SimpleDateFormat("yyyy-MM-dd");
		aux = wordpressFormatter.format(tmp);
		post.setDate(aux);
		Elements bloc = doc.select(".singleActu");
		post.setContent(bloc.html().replaceAll("\\r\\n|\\r|\\n", " "));
	}




	private Collection<? extends Post> getNewsFromMainPage(String mainPagelink) throws Exception {
		List<Post> result = new ArrayList<Post>();
		String content = getContentFromUrl(mainPagelink);
		Document doc = Jsoup.parse(content);
		Elements links = doc.select("a.lienList");
		
		for (Element link : links) {
			Post  aux = new Post();
			aux.setLink(link.attr("href"));
			Element titre = link.select(".titreList").first();
			aux.setTitle(titre.text());
			result.add(aux);
		}
		return result;
	}

	private String getContentFromUrl(String link) throws Exception {
		URL url = new URL(link);
		HttpURLConnection httpcon = (HttpURLConnection) url.openConnection();
		httpcon.addRequestProperty("User-Agent", "Mozilla/4.0");

		BufferedReader in = new BufferedReader(new InputStreamReader(httpcon.getInputStream(), StandardCharsets.UTF_8));
		StringBuffer sb = new StringBuffer();
		String inputLine;
		while ((inputLine = in.readLine()) != null)
			sb.append(inputLine);
		in.close();
		return sb.toString();
	}


}
