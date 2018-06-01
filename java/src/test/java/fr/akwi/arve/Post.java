package fr.akwi.arve;

public class Post {
	
	private String title;
	private String content;
	private String date;
	private String link;
	
	public String getTitle() {
		return title;
	}
	public void setTitle(String title) {
		String aux = title;
		aux = aux.toLowerCase();
		aux = aux.replaceAll("sage", "SAGE");
		aux = aux.replaceAll("arve", "Arve");
		aux = aux.substring(0, 1).toUpperCase() + aux.substring(1);
		this.title = aux;
	}
	public String getContent() {
		return content;
	}
	public void setContent(String content) {
		String aux = content;
		aux = aux.replace('"', '\'');
		this.content = aux;
	}
	public String getDate() {
		return date;
	}
	public void setDate(String date) {
		this.date = date;
	}
	public String getLink() {
		return link;
	}
	public void setLink(String link) {
		this.link = link;
	}

}
