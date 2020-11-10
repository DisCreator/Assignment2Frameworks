<?php
use Quwius\Framework\Observable_Model;



class IndexModel extends Observable_Model{
	use Quwius\Framework\Insert_Trait;

	public function findAll(): array
	{
		//Get the courses data
		$coursedata = $this->loadData(DATA_DIR. '/courses.json');

		//Get course instructors
		$instructorName = $this->loadData(DATA_DIR. '/instructors.json');
		$instructorByCourse = $this->loadData(DATA_DIR. '/course_instructor.json');

		//Get the popular and recommended columns from the data
		$pop_col = array_column($coursedata['courses'], 3);
		$rec_col = array_column($coursedata['courses'], 2);
		$courses = $coursedata['courses']; //copy of the array to do 2 different sorts
		$courses2 = $coursedata['courses']; //copy of the array to compare for displaying instructors

		//sort arrays by recommended and popular
		array_multisort($pop_col, SORT_DESC, $coursedata['courses']);
		array_multisort($rec_col, SORT_DESC, $courses);

		//take only the top 8 of the list to display
		$recommended = array_slice($courses, 0,8);
		$popular =array_slice($coursedata['courses'],0,8);

		//associative array to hold course title with corresponding instructor
		$instructors = [];

		//loop through the courses
		foreach ($courses2 as $keys => $val) {		
			//loop to find instructors based on course as key
			foreach($instructorByCourse['course_instructor'] as $k => $v){
				//course match with course instructor identifier
				if($keys==$k){
					//populate associative array
					$instructors[$val[0]]=$instructorName['instructors'][$v];
				}
			}
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
}
