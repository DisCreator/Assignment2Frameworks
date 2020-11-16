<?php
use Quwius\Framework\Observable_Model;



class IndexModel extends Observable_Model{
	use Quwius\Framework\Insert_Trait;

	public function findAll(): array
	{
		$conn = $this->makeConnection();
		//Get the courses data
		$sql1 = "SELECT * FROM courses ORDER BY course_recommendation_count DESC";
		$sql2 = "SELECT * FROM courses ORDER BY course_access_count DESC";
		$recquery = mysqli_query($conn,$sql1);
		$popquery = mysqli_query($conn,$sql2);

		if(mysqli_num_rows($recquery)>0){
			while($recrow = mysqli_fetch_array($recquery,MYSQLI_ASSOC)){
				$recommended[]=array($recrow['course_name'],$recrow['course_image']);
			}
		}else{
			echo "0 results";
		}

		if(mysqli_num_rows($popquery)>0){
			while($poprow = mysqli_fetch_array($popquery,MYSQLI_ASSOC)){
				$popular[]=array($poprow['course_name'],$poprow['course_image']);
			}
		}else{
			echo "0 results";
		}

		
		//take only the top 8 of the list to display
		$recommended = array_slice($recommended, 0,8);
		$popular =array_slice($popular,0,8);

		//associative array to hold course title with corresponding instructor
		$sql3 = "SELECT courses.course_name,instructors.instructor_name FROM courses,instructors,course_instructor WHERE 
		instructors.instructor_id = course_instructor.instructor_id AND courses.course_id = course_instructor.course_id";
		$insquery = mysqli_query($conn, $sql3);
		if(mysqli_num_rows($insquery)>0){
			while($insrow = mysqli_fetch_array($insquery,MYSQLI_ASSOC)){
				$instructors[$insrow['course_name']]=$insrow['instructor_name'];
			}
		}else{
			echo "0 results";
		}
		
		//return multidimensional array of popular and recommended courses and their corresponding instructors
		return ['popular' => $popular, 'recommended' => $recommended, 'instructors'=>$instructors];

		
	}
	public function findRecord(string $id): array
	{
		return [];
	}

	public function insert(array $values){

	}
	/*array(16) { 
		[0]=> array(2) { [0]=> string(19) "Networks & Security" [1]=> string(19) "networksecurity.jpg" } 
		[1]=> array(2) { [0]=> string(21) "Computational Physics" [1]=> string(11) "physics.jpg" } 
		[2]=> array(2) { [0]=> string(27) "Introduction to Electronics" [1]=> string(15) "electronics.jpg" } 
		[3]=> array(2) { [0]=> string(24) "Introduction to Genetics" [1]=> string(12) "genetics.jpg" } 
		[4]=> array(2) { [0]=> string(27) "Object-Oriented Programming" [1]=> string(7) "oop.jpg" } 
		[5]=> array(2) { [0]=> string(23) "Artificial Intelligence" [1]=> string(6) "ai.jpg" } 
		[6]=> array(2) { [0]=> string(29) "Biochemistry of Human Disease" [1]=> string(16) "humandisease.jpg" } 
		[7]=> array(2) { [0]=> string(17) "Basic Mathematics" [1]=> string(15) "mathematics.jpg" } */
}
