import java.util.ArrayList;
import java.util.List;

/**
 * Currently, it's structured as one Picture
 * has multiple tags.
 * 
 * 
 * @author Judy
 *
 */


public class Tag {
	
	String tag;
	List<Integer> ratings;
	double average;
	boolean goodTag;
	
	public Tag(String tag) {
		this.tag = tag;
		ratings = new ArrayList<Integer>();
		average = 0;
	}
	
	/**
	 * @param rate
	 * Takes in a rate and stores it into the list
	 * of ratings
	 */
	public void addRating(int rate) {
		ratings.add(rate);
	}
	
	/**
	 * sets the average 
	 */
	private void setAverage() {
		int sum, count;
		sum = count = 0;
		
		for(Integer i : ratings) {
			count++;
			sum += i;
		}
		this.average = ((double) sum) / count;
	}
	
	public double getAverage() {
		setAverage();
		return average;
	}
	
	public List<Integer> getRatings() {
		return this.ratings;
	}
	
	public boolean isGoodTag() {
		this.goodTag = (average >= 5.0);
		return goodTag;
	}
	
	public String getTag() {
		return this.tag;
	}
	
	@Override
	public boolean equals(Object that) {
		Tag thatTag = null;
		if(!(that instanceof Tag)) {
			return false;
		} else {
			thatTag = (Tag) that;
		}		
		return tag.equals(thatTag.getTag());
	}
}
