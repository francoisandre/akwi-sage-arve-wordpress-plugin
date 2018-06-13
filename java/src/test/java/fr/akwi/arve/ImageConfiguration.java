package fr.akwi.arve;

public class ImageConfiguration {

	private String sourceFileName;
	private String targetFileName;
	private String text;
	private int height;
	private int  width;
	
	public ImageConfiguration(String sourceFileName, String targetFileName, String text, int height, int width) {
		super();
		this.sourceFileName = sourceFileName;
		this.targetFileName = targetFileName;
		this.text = text;
		this.height = height;
		this.width = width;
	}
	public String getText() {
		return text;
	}
	public void setText(String text) {
		this.text = text;
	}
	public int getHeight() {
		return height;
	}
	public void setHeight(int height) {
		this.height = height;
	}
	public int getWidth() {
		return width;
	}
	public void setWidth(int width) {
		this.width = width;
	}
	public String getSourceFileName() {
		return sourceFileName;
	}
	public void setSourceFileName(String sourceFileName) {
		this.sourceFileName = sourceFileName;
	}
	public String getTargetFileName() {
		return targetFileName;
	}
	public void setTargetFileName(String targetFileName) {
		this.targetFileName = targetFileName;
	}

}
