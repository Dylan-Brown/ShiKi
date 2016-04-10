import java.util.ArrayList;
import java.util.List;

/**
 * Used as a class to hold all the tags and the url for this
 * recommendation.
 * 
 * @author Judy
 *
 */
public class Recommendation {
	
	String url;
	List<Tag> givenTags;
	List<Tag> goodTags;
	
	public Recommendation (String url) {
		this.url = url;
		givenTags = new ArrayList<Tag>();
		goodTags = new ArrayList<Tag>();
	}
	
	/**
	 * @param tagName
	 * @return boolean
	 * 
	 * Takes in a given tag string and returns whether
	 * the givenTags contains the same kind of tag
	 */
	public boolean containsTag(String tagName) {
		for(Tag t : givenTags) {
			if(t.getTag().equals(tagName)) {
				return true;
			}
		}
		return false;
	}
	
	/**
	 * @param t
	 * 
	 * puts the Tag t in the list of tags.
	 */
	public void addTag (Tag t) {
		givenTags.add(t);
	}
	
	private void checkTags() {
		goodTags.clear();
		for(Tag t : givenTags){
			if(t.isGoodTag()) {
				goodTags.add(t);
			}
		}
	}
	
	public String getURL() {
		return url;
	}
	
	public List<Tag> getGivenTags() {
		return this.givenTags;
	}
	
	public List<Tag> getGoodTags() {
		checkTags();
		return this.goodTags;
	}
}
