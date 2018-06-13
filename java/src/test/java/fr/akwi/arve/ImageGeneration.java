package fr.akwi.arve;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.Graphics2D;
import java.awt.Rectangle;
import java.awt.geom.Rectangle2D;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import org.apache.poi.sl.usermodel.PictureData;
import org.apache.poi.sl.usermodel.StrokeStyle.LineDash;
import org.apache.poi.sl.usermodel.TextParagraph.TextAlign;
import org.apache.poi.sl.usermodel.TextShape.TextAutofit;
import org.apache.poi.sl.usermodel.VerticalAlignment;
import org.apache.poi.util.IOUtils;
import org.apache.poi.xslf.usermodel.SlideLayout;
import org.apache.poi.xslf.usermodel.XMLSlideShow;
import org.apache.poi.xslf.usermodel.XSLFPictureData;
import org.apache.poi.xslf.usermodel.XSLFPictureShape;
import org.apache.poi.xslf.usermodel.XSLFSlide;
import org.apache.poi.xslf.usermodel.XSLFSlideLayout;
import org.apache.poi.xslf.usermodel.XSLFSlideMaster;
import org.apache.poi.xslf.usermodel.XSLFTextBox;
import org.apache.poi.xslf.usermodel.XSLFTextParagraph;
import org.apache.poi.xslf.usermodel.XSLFTextRun;
import org.junit.Test;
import org.openxmlformats.schemas.presentationml.x2006.main.CTShape;

public class ImageGeneration {

	private static final int HALF_HEIGHT = 490;
	private static final int HALF_WIDTH = 693;
	private static final int TOTAL_HEIGHT = 2*HALF_HEIGHT;
	private static final int TOTAL_WIDTH = 2*HALF_WIDTH;
	private File sourceFolder;
	private File temporaryFolder;
	private File finalFolder;
	
	public ImageGeneration() {

		String sourceFolderName = "C:/Users/François ANDRE/workspaceSageFA/akwi-sage-arve-wordpress-plugin/java/src/test/resources/images";
		sourceFolder = new File(sourceFolderName);

		String finalFolderName = "C:/Users/François ANDRE/workspaceSageFA/akwi-sage-arve-wordpress-plugin/images/bibliotheque";
		finalFolder = new File(finalFolderName);

	}
	
	@Test
	public void generationPPT() throws Exception {
		

		
		if (finalFolder.exists() == false) {
			finalFolder.mkdirs();
		}
		
		if (temporaryFolder.exists() == false) {
			temporaryFolder.mkdirs();
		}
		List<ImageConfiguration> configuration = getConfiguration();
		for (ImageConfiguration imageConfiguration : configuration) {
			String sourceFileName = imageConfiguration.getSourceFileName();
			File file = new File(sourceFolder, sourceFileName);
			if (file.exists()) {
				convert(file, imageConfiguration);
			}
		}
	}
	
	private void convert(File file, ImageConfiguration imageConfiguration) throws Exception {
		XMLSlideShow ppt = new XMLSlideShow();	
		ppt.setPageSize(new Dimension(TOTAL_WIDTH,TOTAL_HEIGHT));
		
		
		XSLFSlideMaster slideMaster = ppt.getSlideMasters().get(0);
		XSLFSlideLayout layout = slideMaster.getLayout(SlideLayout.TITLE_ONLY);

		XSLFSlide slide = ppt.createSlide(layout);

		byte[] pictureData = IOUtils.toByteArray(new FileInputStream(file));

		XSLFPictureData pd = ppt.addPicture(pictureData, PictureData.PictureType.PNG);

		XSLFPictureShape pic = slide.createPicture(pd);

		pic.setAnchor(new Rectangle(0,0,TOTAL_WIDTH,TOTAL_HEIGHT));


		XSLFTextBox shape = slide.createTextBox();
		shape.setTextAutofit(TextAutofit.SHAPE);
		shape.setWordWrap(false);
		shape.setVerticalAlignment(VerticalAlignment.MIDDLE);
		// XSLFTextShape shape = slide.getPlaceholder(0);
		XSLFTextParagraph paragraph = shape.addNewTextParagraph();
		paragraph.setTextAlign(TextAlign.CENTER);

		String text = imageConfiguration.getText();
		XSLFTextRun r = paragraph.addNewTextRun();
		r.setText(text.toUpperCase());
		r.setFontColor(Color.WHITE);
		r.setFontFamily("Bebas Neue");
		r.setFontSize(166D);
		int ratio = 33;
		int halfRectangleWidth = ratio*text.length();
		int halfRectangleHeight = 170;

		shape.setAnchor(new Rectangle(HALF_WIDTH-halfRectangleWidth,HALF_HEIGHT-halfRectangleHeight,2*halfRectangleWidth,2*halfRectangleHeight));
		shape.setLineColor(Color.WHITE);
		shape.setLineDash(LineDash.SOLID);
		shape.setLineWidth(10);
		shape.setFillColor(new Color(0,0,0));

		CTShape cs = (CTShape)shape.getXmlObject();
		cs.getSpPr().getSolidFill().getSrgbClr().addNewAlpha().setVal(30000); 

			
		BufferedImage img = new BufferedImage(
				TOTAL_WIDTH, TOTAL_HEIGHT,BufferedImage.TYPE_INT_RGB);
		Graphics2D graphics = img.createGraphics();
		graphics.setPaint(Color.white);
		graphics.fill(new Rectangle2D.Float(0, 0, TOTAL_WIDTH, TOTAL_HEIGHT));
		slide.draw(graphics);
		File aux = new File(finalFolder, imageConfiguration.getTargetFileName());
		FileOutputStream out2 = new FileOutputStream(aux);
		javax.imageio.ImageIO.write(img, "png", out2);
		ppt.write(out2);
		out2.close();
		
	}
		
	
	private List<ImageConfiguration> getConfiguration() {
		List<ImageConfiguration> result = new ArrayList<>();
			result.add(new ImageConfiguration("conference1.png", "reunion_publique1.png", "Réunion Publique", 0, 0));
			result.add(new ImageConfiguration("conference1.png", "assemblee_generale.png", "Assemblée générale", 0, 0));
			result.add(new ImageConfiguration("conference2.png", "reunion_publique2.png", "Réunion Publique", 0, 0));
		return result;
	}


}
