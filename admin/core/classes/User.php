<?php

/* error_reporting(0);
ini_set('display_errors', 0);    */

class User {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($table, $email,$password)
    {
        $query = "SELECT * FROM $table WHERE email = :email AND password= :password";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function checkInput($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        $data = addslashes(strip_tags($data));

        return $data;
    }
    public function insert($data)
    {

        $query = "INSERT INTO `person`(`generate_code`) VALUES ('$data')";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->rowCount();
    }
    public function get($table)
    {

        $query = "SELECT * FROM $table";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($table, array $fields) {
        $columns = implode(', ', array_keys($fields));
        $values = ':' . implode(', :', array_keys($fields));
        $query = "INSERT INTO {$table} ({$columns}) VALUES ($values);";
        //echo $query; --> success

        if ($stmt = $this->pdo->prepare($query)) {
            foreach ($fields as $keys => $data) {
                $stmt->bindValue(':' . $keys, $data);
            }
            return $stmt->execute();

        } else {
            return false;
        }
    }

    public function getAllHeros(){
        $query = "SELECT champions.id, champions.image, champions.name, c_skills.skill_video FROM champions,c_skills where champions.skillp = c_skills.hero_lv ORDER BY champions.name";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        public function getAllNewsTitles(){
        $query = "SELECT news.id, news.title, news.body, news.image, news.category, news.content_writer, news.date  FROM news";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


        public function getNewsCount(){
        $query = "SELECT COUNT(*) c FROM news";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getNewsTitlesPagination($start_from, $num_per_page){
        $query = "SELECT *  FROM news LIMIT $start_from,$num_per_page";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getLivingStyleNewsPaginationEn($start_from, $num_per_page){
        $query = "SELECT *  FROM news WHERE  news.category = 'LivingStyle' && news.isEng = '1' ORDER BY date desc LIMIT $start_from,$num_per_page";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getLivingStyleNewsCountEn(){
        $query = "SELECT COUNT(*) c  FROM news WHERE news.category = 'LivingStyle' && news.isEng = '1'";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        public function getLivingStyleNewsPaginationMm($start_from, $num_per_page){
        $query = "SELECT *  FROM news WHERE  news.category = 'LivingStyle' && news.isEng = '0' ORDER BY date desc LIMIT $start_from,$num_per_page";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getLivingStyleNewsCountMm(){
        $query = "SELECT COUNT(*) c  FROM news WHERE news.category = 'LivingStyle' && news.isEng = '0'";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        public function getSportsNewsPaginationEn($start_from, $num_per_page){
        $query = "SELECT *  FROM news WHERE  news.category = 'Sports' && news.isEng = '1' ORDER BY date desc LIMIT $start_from,$num_per_page";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getSportsNewsCountEn(){
        $query = "SELECT COUNT(*) c  FROM news WHERE news.category = 'Sports' && news.isEng = '1'";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function getSportsNewsCountMm(){
        $query = "SELECT COUNT(*) c  FROM news WHERE news.category = 'Sports' && news.isEng = '0'";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSportsNewsPaginationMm($start_from, $num_per_page){
        $query = "SELECT *  FROM news WHERE  news.category = 'Sports' && news.isEng = '0' ORDER BY date desc LIMIT $start_from,$num_per_page";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



        public function getCountryNewsPaginationEn($start_from, $num_per_page){
        $query = "SELECT *  FROM news WHERE  news.category = 'Country' && news.isEng = '1' ORDER BY date desc LIMIT $start_from,$num_per_page";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getCountryNewsCountEn(){
        $query = "SELECT COUNT(*) c  FROM news WHERE news.category = 'Country' && news.isEng = '1'";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function getCountryNewsCountMm(){
        $query = "SELECT COUNT(*) c  FROM news WHERE news.category = 'Country' && news.isEng = '0'";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCountryNewsPaginationMm($start_from, $num_per_page){
        $query = "SELECT *  FROM news WHERE  news.category = 'Country' && news.isEng = '0' ORDER BY date desc LIMIT $start_from,$num_per_page";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




        public function getTravelNewsPaginationEn($start_from, $num_per_page){
        $query = "SELECT *  FROM news WHERE  news.category = 'Travel' && news.isEng = '1' ORDER BY date desc LIMIT $start_from,$num_per_page";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getTravelNewsCountEn(){
        $query = "SELECT COUNT(*) c  FROM news WHERE news.category = 'Travel' && news.isEng = '1'";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function getTravelNewsCountMm(){
        $query = "SELECT COUNT(*) c  FROM news WHERE news.category = 'Travel' && news.isEng = '0'";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTravelNewsPaginationMm($start_from, $num_per_page){
        $query = "SELECT *  FROM news WHERE  news.category = 'Travel' && news.isEng = '0' ORDER BY date desc LIMIT $start_from,$num_per_page";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getSinglePost($post){
        $query = "SELECT * FROM courses, instructors WHERE courses.c_id = $post AND instructors.i_id = courses.c_i_id";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCourse($c_title, $c_start, $c_dur, $c_type, $c_instuct, $c_cate, $c_desc, $c_image) {
      echo "testing -> " . "INSERT INTO courses (c_title, c_start, c_dur, c_type, c_i_id, c_ca_id, c_desc, c_image) VALUES
      ('" . $c_title . "', '" . $c_start . "', '" . $c_dur . "', '" . $c_type . "', " . $c_instuct . ", " . $c_cate . ", '" .
        $c_desc . "', '" . $c_image . "')";

      try {
        $stmt = $this->pdo->prepare("INSERT INTO courses (c_title, c_start, c_dur, c_type, c_i_id, c_ca_id, c_desc, c_image) VALUES
        ('" . $c_title . "', '" . $c_start . "', '" . $c_dur . "', '" . $c_type . "', " . $c_instuct . ", " . $c_cate . ", '" .
          $c_desc . "', '" . $c_image . "')");
    		// $stmt->bindParam(':c_title', $c_title);
        // $stmt->bindParam(':c_image', $c_image);
        // $stmt->bindParam(':c_start', $c_start);
        // $stmt->bindParam(':c_dur', $c_dur);
        // $stmt->bindParam(':c_cate', $c_cate, PDO::PARAM_INT);
    		$stmt->execute();
        $id = $this->pdo->lastInsertId();
    		return $id;
      } catch (PDOException $e) {
        return 'error';
      }

  	}

    public function addCurList($curriArrTitle, $curriArrDesc, $courseId) {
      // $conn = new PDO('mysql:host=localhost;dbname=simbolo', "root", "");
      // set the PDO error mode to exception
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // begin the transaction
      $this->pdo->beginTransaction();
      for($i = 0; $i < count($curriArrTitle); $i++) {
        $title = $curriArrTitle[$i];
        $desc = $curriArrDesc[$i];
        echo 'INSERT INTO course_overview (co_title, co_desc, co_cid) VALUES ("' . $title . '", "' . $desc . '", ' . $courseId . ')';
        // $stmt = $this->pdo->prepare("INSERT INTO course_overview (co_title, co_desc)
        // VALUES (:co_title, :co_desc)");
    		// $stmt->bindParam(':co_title', $curriArrTitle[$i]);
        // $stmt->bindParam(':co_desc', $curriArrDesc[$i]);


        $this->pdo->exec('INSERT INTO course_overview (co_title, co_desc, co_cid) VALUES ("' . $title . '", "' . $desc . '", ' . $courseId . ')');
      }
      // commit the transaction
      $this->pdo->commit();
      echo "New records created successfully";
    }

    public function getSinglePostByCategory($category){
        $query = "SELECT * FROM news WHERE news.category = $category";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllMmNews($start_from, $num_per_page){
        $query = "SELECT *  FROM news WHERE  news.isEng = '0' ORDER BY date desc LIMIT $start_from,$num_per_page";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMmNewsCount(){
        $query = "SELECT COUNT(*) c FROM news WHERE news.isEng = '0'";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecentMmNews(){
        $query = "SELECT * from news WHERE news.isEng = '0' order by date desc limit 3";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllCategoriesEn(){
        $query = "SELECT category, COUNT(category) FROM news WHERE news.isEng = '1'  GROUP BY category HAVING COUNT(category) >=1";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllEnNews($start_from, $num_per_page){
        $query = "SELECT *  FROM news WHERE  news.isEng = '1' ORDER BY date desc LIMIT $start_from,$num_per_page";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEngNewsCount(){
        $query = "SELECT COUNT(*) c FROM news WHERE news.isEng = '1'";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecentEnNews(){
        $query = "SELECT * from news WHERE news.isEng = '1' order by date asc limit 3";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	public function createReport($desc) {
		$stmt = $this->pdo->prepare("INSERT INTO reports (rp_desc) VALUES (:desc)");
		$stmt->bindParam(':desc', $desc);
		$stmt->execute();
		return $stmt;
	}

  public function addContact($firstname, $lastname, $email, $phone, $reason, $message) {
		$stmt = $this->pdo->prepare("INSERT INTO contact (firstname, lastname, email, phone, reason, message) VALUES (:firstname, :lastname, :email, :phone, :reason, :message)");
		$stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':reason', $reason);
    $stmt->bindParam(':message', $message);
		$stmt->execute();
		return $stmt;
	}

    public function getAllFighters(){
        $query = "SELECT champions.id, champions.image, champions.name, c_skills.skill_video FROM champions,c_skills where champions.skillp = c_skills.hero_lv and champions.main_role LIKE '%fighter%' ORDER BY champions.name";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllTanks(){
        $query = "SELECT champions.id, champions.image, champions.name, c_skills.skill_video FROM champions,c_skills where champions.skillp = c_skills.hero_lv and champions.main_role LIKE '%tank%' ORDER BY champions.name ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllMages(){
        $query = "SELECT champions.id, champions.image, champions.name, c_skills.skill_video FROM champions,c_skills where champions.skillp = c_skills.hero_lv and champions.main_role LIKE '%mage%' ORDER BY champions.name";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllAssassins(){
        $query = "SELECT champions.id, champions.image, champions.name, c_skills.skill_video FROM champions,c_skills where champions.skillp = c_skills.hero_lv and champions.main_role LIKE '%assassin%' ORDER BY champions.name ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSupports(){
        $query = "SELECT champions.id, champions.image, champions.name, c_skills.skill_video FROM champions,c_skills where champions.skillp = c_skills.hero_lv and champions.main_role LIKE '%support%' ORDER BY champions.name ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllMarksmans(){
        $query = "SELECT champions.id, champions.image, champions.name, c_skills.skill_video FROM champions,c_skills where champions.skillp = c_skills.hero_lv and champions.main_role LIKE '%marksman%' ORDER BY champions.name ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPhysicalItems(){

        $query = "SELECT id,item_type,item_lv,item_name,item_name2,item_price,item_image,item_video FROM items WHERE item_type = 'physical' ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChampPlayStyleCombos($id){

        $query = "SELECT c_playstyle.id,c_playstyle.ps_name,c_playstyle.ps_desc,c_playstyle.ps_desc_en,c_playstyle.ps_skill1,c_playstyle.ps_skill2,c_playstyle.ps_skill3,c_playstyle.ps_skill4,c_playstyle.ps_skill5,c_playstyle.ps_skill6,c_playstyle.ps_skill7,c_playstyle.ps_skill8,c_playstyle.ps_skill9,c_playstyle.ps_skill10,c_playstyle.ps_video  , champions.name as champion_name FROM c_playstyle,champions WHERE c_playstyle.ps_champ = champions.id and ps_champ = $id ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getChampionsItemsByChampionId($table_name, $id){

        $query = "SELECT champions.name as champion_name , items.item_name ,items.item_image,items.item_type,$table_name.name,$table_name.item_id as item_id,items.item_name2,items.item_price,items.item_type,items.item_video   FROM  champions,items, $table_name where $table_name.champion_id = champions.id and $table_name.item_id =  items.id and champions.id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getChampionsRunesByChampionId($table_name,$id){

        $query = "SELECT champions.name as champion_name , runes.rune_name ,runes.rune_image,runes.rune_type,$table_name.name,$table_name.runes_id as runes_id,runes.rune_name2,runes.rune_pros,runes.rune_video   FROM  champions,runes, $table_name where $table_name.champion_id = champions.id and $table_name.runes_id =  runes.id and champions.id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getChampionsSpellsByChampionId($table_name,$id){

        $query = "SELECT champions.name as champion_name , spells.spell_name ,$table_name.name,$table_name.spells_id as spells_id,spells.spell_cooldown ,spells.spell_desc, spells.spell_sugg, spells.spell_image, spells.spell_video  FROM  champions,spells, $table_name where $table_name.champion_id = champions.id and $table_name.spells_id =  spells.id and champions.id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllKeyStoneRunes(){

        $query = "SELECT id,rune_type,rune_name,rune_name2,rune_pros,rune_image,rune_video FROM runes WHERE rune_type = 'keystone' ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSpells(){

        $query = "SELECT id,spell_name,spell_cooldown,spell_sugg,spell_desc, spell_desc_en, spell_image, spell_video FROM spells";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllDominationRunes(){

        $query = "SELECT id,rune_type,rune_name,rune_name2,rune_pros,rune_image,rune_video FROM runes WHERE rune_type = 'domination' ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllResolveRunes(){

        $query = "SELECT id,rune_type,rune_name,rune_name2,rune_pros,rune_image,rune_video FROM runes WHERE rune_type = 'resolve' ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllInspirationRunes(){

        $query = "SELECT id,rune_type,rune_name,rune_name2,rune_pros,rune_image,rune_video FROM runes WHERE rune_type = 'inspiration' ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllDefenseItems(){

        $query = "SELECT id,item_type,item_lv,item_name,item_name2,item_price,item_image,item_video FROM items WHERE item_type = 'defense' ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllMagicItems(){

        $query = "SELECT id,item_type,item_lv,item_name,item_name2,item_price,item_image,item_video FROM items WHERE item_type = 'magic' ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBuildPathByItemId($id){

        $query = "SELECT items.id,item_type,item_lv,item_name,item_name2,item_price,item_image,item_video FROM build_path,items  WHERE build_path.item_id = :id and build_path.link_item_id = items.id  ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCBuildsByChampionId($id){

        $query = "SELECT lane_type.name as lane_type, items.item_image,item_type.name as item_type FROM lane_type,items,item_type,c_builds WHERE c_builds.lane_type_id = lane_type.id and c_builds.item_id 	= items.id AND c_builds.item_type_id = item_type.id and c_builds.champ_id = :id   ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBuildIntoByItemId($id){

        $query = "SELECT items.id,item_type,item_lv,item_name,item_name2,item_price,item_image,item_video FROM build_into,items  WHERE build_into.item_id = :id and build_into.link_item_id = items.id  ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllBootsItems(){

        $query = "SELECT id,item_type,item_lv,item_name,item_name2,item_price,item_image,item_video FROM items WHERE item_type = 'boots' ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getItemDescriptionById($id){

        $query = "SELECT  item_desc, item_desc_en, item_pros, item_video  FROM items WHERE id = :id ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	public function getNewsByPage($page){
		$page = ($page * 10) - 10;

        $query = "SELECT n_id, n_desc, n_desc2  FROM news LIMIT " . $page . ",10";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCoursesOverviewByCourseId($id){

        $query = "SELECT co_id, co_title, co_info, co_desc FROM course_overview WHERE co_cid = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategories(){

        $query = "SELECT ca_id, ca_name, ca_type FROM categories";
        $stmt = $this->pdo->prepare($query);
        // $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInstructors(){

        $query = "SELECT * FROM instructors ORDER BY i_popular ASC LIMIT 4";
        $stmt = $this->pdo->prepare($query);
        // $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCourses(){

        $query = "SELECT c_id, c_title, c_type, c_image, c_date, c_start, c_dur, c_ca_id, i_id, i_name, i_image FROM courses, instructors WHERE courses.c_i_id = instructors.i_id";
        $stmt = $this->pdo->prepare($query);
        // $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCmts(){

        $query = "SELECT cm_id, cm_name, cm_info, cm_desc, cm_image FROM comments";
        $stmt = $this->pdo->prepare($query);
        // $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllEvents(){

        $query = "SELECT e_id, e_title, e_desc, e_image, s_id, s_name, e_s_id FROM events, speakers WHERE events.e_s_id = speakers.s_id";
        $stmt = $this->pdo->prepare($query);
        // $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWeaksById($id){

        $query = "SELECT champions.id, champions.name, champions.image, c_skills.skill_video FROM c_weaks, champions, c_skills WHERE c_weaks.other_c_id = champions.id AND c_skills.hero_lv = champions.skillp AND c_weaks.main_c_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getStrongsById($id){

        $query = "SELECT champions.id, champions.name, champions.image, c_skills.skill_video FROM c_strongs, champions, c_skills WHERE c_strongs.other_c_id = champions.id AND c_skills.hero_lv = champions.skillp AND c_strongs.main_c_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMatesById($id){

        $query = "SELECT champions.id, champions.name, champions.image, c_skills.skill_video FROM c_mates, champions, c_skills WHERE c_mates.other_c_id = champions.id AND c_skills.hero_lv = champions.skillp AND c_mates.main_c_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getRuneDescriptionById($id){

        $query = "SELECT  rune_desc, rune_desc_en FROM runes WHERE id = :id ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHeroDetailsById($id){
        $query = "SELECT champions.blue_motes, champions.wild_cores, champions.main_role,  champions.main_lane, champions.ps_ml, champions.utility,champions.toughness, champions.damage, champions.difficulty, champions.skill_order FROM champions where id = :id  ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


	public function getPlaystyleTipsById($id){
		$query = "SELECT champions.playstyle, champions.playstyle_en FROM champions where id = :id  ";
		$stmt = $this->pdo->prepare($query);
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


	public function getItemDetailsByName($name){

		$query = "SELECT items.id, items.item_name, items.item_image, items.item_video, items.item_type, items.item_price, items.item_name2 FROM items where items.item_name = :name";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);

        $stmt->execute();
		//return $query;
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	public function getSpellDetailsByName($name){

		$query = "SELECT spells.id, spells.spell_name, spells.spell_image, spells.spell_video, spells.spell_sugg, spells.spell_cooldown FROM spells where spells.spell_name = :name";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);

        $stmt->execute();
		//return $query;
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	public function getRuneDetailsByName($name){

		$query = "SELECT runes.id, runes.rune_name, runes.rune_image, runes.rune_video, runes.rune_pros, runes.rune_name2 FROM runes where runes.rune_name = :name";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);

        $stmt->execute();
		//return $query;
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	public function getSpellDetailsById($id){
		$query = "SELECT spells.desc2, spells.desc2_en FROM spells where id = :id  ";
		$stmt = $this->pdo->prepare($query);
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

    public function getSkillDetailsByChampion($id){
        $query = "SELECT c_skills.* FROM c_skills,champions where (c_skills.hero_lv = champions.skillp or c_skills.hero_lv = champions.skill1 or c_skills.hero_lv = champions.skill2 or c_skills.hero_lv = champions.skill3 or c_skills.hero_lv = champions.skill4) and champions.id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

    public function create_get_last_id($table, array $fields) {
        $columns = implode(', ', array_keys($fields));
        $values = ':' . implode(', :', array_keys($fields));
        $query = "INSERT INTO {$table} ({$columns}) VALUES ($values);";

        //echo $query; --> success

        if ($stmt = $this->pdo->prepare($query)) {
            foreach ($fields as $keys => $data) {
                $stmt->bindValue(':' . $keys, $data);
            }
            $stmt->execute();
            return $this->pdo->lastInsertId();

        } else {
            return false;
        }
    }

    public function getHospitalId($hospital_name){
        $query = "SELECT id FROM Hospitals WHERE name = :name";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $hospital_name, PDO::PARAM_STR);
        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPositives($val){
        $query = "SELECT $val.name , Count($val.name) as number from States, Patients, Hospitals , Townships, District where Patients.hospital_id = Hospitals.id and Hospitals.township_id = Townships.id AND Townships.district_id = District.id AND District.state_id = States.id AND (Patients.suffer_type_id = 9 or Patients.suffer_type_id=7) group by $val.name ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }






    public function getAll($order){
        $query = "SELECT Hospitals.id,Hospitals.name as hospital , Townships.name as township ,District.name as district,States.name as state,
Hospitals.lon as longitude, Hospitals.lat as latitude,
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui ,
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected,
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative,
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending,
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death,
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered,
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id  and District.state_id= States.id
GROUP BY Hospitals.name order by $order ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllBy($condition,$order){
        $query = "SELECT Hospitals.id,Hospitals.name as hospital , Townships.name as township ,District.name as district,States.name as state,
Hospitals.lon as longitude, Hospitals.lat as latitude,
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui ,
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected,
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative,
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending,
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death,
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered,
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id  and District.state_id= States.id and $condition
GROUP BY Hospitals.name order by $order ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRegionJson(){
        $query = " SELECT States.id as s_id,States.name as db_name,States.real_name,States.zawgyi,States.unicode,States.lat,States.lon,
    COUNT(case when (Patients.suffer_type_id = 1 AND Patients.hospital_id = Hospitals.id)
          then 1 else NULL end) as pui ,
    COUNT(case when (Patients.suffer_type_id = 2 AND Patients.hospital_id = Hospitals.id)
          then 1 else NULL end) as suspected,
    (SELECT Div_Pos.count FROM Div_Pos WHERE Div_Pos.state_id = s_id) as puinsus	,
    COUNT(case when (Patients.suffer_type_id = 3 AND Patients.hospital_id = Hospitals.id)
          then 1 else NULL end) as lab_negative,
    COUNT(case when (Patients.suffer_type_id = 4 AND Patients.hospital_id = Hospitals.id)
          then 1 else NULL end) as lab_pending,
    COUNT(case when (Patients.suffer_type_id = 5 AND Patients.first_hospital_id = Hospitals.id)
          then 1 else NULL end) as death,
    COUNT(case when (Patients.suffer_type_id = 6 AND Patients.first_hospital_id = Hospitals.id)
          then 1 else NULL end) as recovered,
    COUNT(case when (Patients.suffer_type_id = 7 AND Patients.hospital_id = Hospitals.id)
          then 1 else NULL end) as lab_confirmed_now,
    COUNT(case when ( (Patients.suffer_type_id = 7 or Patients.suffer_type_id =6 or Patients.suffer_type_id=5) AND Patients.first_hospital_id = Hospitals.id)
          then 1 else NULL end) as lab_confirmed
     FROM Hospitals, Patients ,Townships ,District ,States
    WHERE Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id
    GROUP BY States.name order by lab_confirmed DESC ,`death`  DESC , recovered DESC ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    public function getTownshipJson(){
        $query = " SELECT Townships.id,States.name as state,States.id as s_id,
 District.name as district,Townships.name as db_name,District.id as d_id,
Townships.real_name,Townships.zawgyi,Townships.unicode,Townships.lat,Townships.lon,
COUNT(case when (Patients.suffer_type_id = 1 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as pui ,
COUNT(case when (Patients.suffer_type_id = 2 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as suspected,
(SELECT Div_Pos.count FROM Div_Pos WHERE Div_Pos.state_id = s_id) as puinsus	,
COUNT(case when (Patients.suffer_type_id = 3 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as lab_negative,
COUNT(case when (Patients.suffer_type_id = 4 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as lab_pending,
COUNT(case when (Patients.suffer_type_id = 5 AND Patients.first_hospital_id = Hospitals.id)
      then 1 else NULL end) as death,
COUNT(case when (Patients.suffer_type_id = 6 AND Patients.first_hospital_id = Hospitals.id)
      then 1 else NULL end) as recovered,
COUNT(case when (Patients.suffer_type_id = 7 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as lab_confirmed_now,
COUNT(case when ( (Patients.suffer_type_id = 7 or Patients.suffer_type_id =6 or Patients.suffer_type_id=5) AND Patients.first_hospital_id = Hospitals.id)
          then 1 else NULL end) as lab_confirmed
FROM Hospitals, Patients ,Townships ,District ,States
WHERE   Hospitals.township_id = Townships.id and
Townships.district_id = District.id and District.state_id= States.id
GROUP BY Townships.name order by lab_confirmed DESC ,`death`  DESC , recovered DESC ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHospitalJson(){
        $query = "SELECT Hospitals.id,States.name as state,States.real_name as real_name,District.name as district,Townships.name as township, Hospitals.name as db_name, Hospitals.zawgyi,Hospitals.unicode,Hospitals.lon, Hospitals.lat,
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui ,
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected,
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative,
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending,
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death,
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered,
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id
GROUP BY Hospitals.name
order by Hospitals.id";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData($query){
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getHospitalJsonWithCondition($hospitalName,$stateName){
        $query = "SELECT Hospitals.id,States.name as state,States.real_name as real_name,District.name as district,Townships.name as township, Hospitals.name as db_name, Hospitals.zawgyi,Hospitals.unicode,Hospitals.lon, Hospitals.lat,
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui ,
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected,
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative,
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending,
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death,
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered,
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id Hospitals.name LIKE %$hospitalName % OR States.real_name %$stateName% ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHospitalRowCount(){
        $query = "SELECT Hospitals.id,States.name as state,States.real_name as real_name,District.name as district,Townships.name as township, Hospitals.name as db_name, Hospitals.zawgyi,Hospitals.unicode,Hospitals.lon, Hospitals.lat,
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui ,
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected,
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative,
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending,
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death,
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered,
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id
GROUP BY Hospitals.name
order by Hospitals.id;";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }

    public function getCount($query){
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }


    public function getPatientRowCount(){
        $query = "SELECT Count(Patients.name) as count
 FROM Patients,Gender,Suffer_Type,Hospitals
 WHERE Patients.gender = Gender.id AND
 Patients.suffer_type_id = Suffer_Type.id AND
 Patients.hospital_id = Hospitals.id AND
 (Patients.suffer_type_id = 5 or Patients.suffer_type_id=6 or Patients.suffer_type_id=7)";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPatientsCount($hospitalId,$sufferTypeId){
        $query = "SELECT count(Patients.name)  as total FROM `Patients` WHERE Patients.hospital_id = $hospitalId and Patients.suffer_type_id = $sufferTypeId";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletePatients($hospitalId,$sufferTypeId,$limit){
        $query = "DELETE FROM Patients where Patients.suffer_type_id = $sufferTypeId and Patients.hospital_id = $hospitalId LIMIT $limit ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }




    public function getDistrictJson(){
        $query = "SELECT District.id,District.name as db_name,District.unicode ,States.id as s_id,
COUNT(case when (Patients.suffer_type_id = 1 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as pui ,
COUNT(case when (Patients.suffer_type_id = 2 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as suspected,
(SELECT Div_Pos.count FROM Div_Pos WHERE Div_Pos.state_id = s_id) as puinsus	,
COUNT(case when (Patients.suffer_type_id = 3 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as lab_negative,
COUNT(case when (Patients.suffer_type_id = 4 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as lab_pending,
COUNT(case when (Patients.suffer_type_id = 5 AND Patients.first_hospital_id = Hospitals.id)
      then 1 else NULL end) as death,
COUNT(case when (Patients.suffer_type_id = 6 AND Patients.first_hospital_id = Hospitals.id)
      then 1 else NULL end) as recovered,
COUNT(case when (Patients.suffer_type_id = 7 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as lab_confirmed_now,
COUNT(case when ( (Patients.suffer_type_id = 7 or Patients.suffer_type_id =6 or Patients.suffer_type_id=5) AND Patients.first_hospital_id = Hospitals.id)
          then 1 else NULL end) as lab_confirmed
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id
GROUP BY District.name
order by lab_confirmed DESC ,`death`  DESC , recovered DESC";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTransferPatients($patient_id){
        $query = "SELECT Patients.id as p_id,Patients.name,
(SELECT Hospitals.name FROM Hospitals,Patients WHERE Patients.first_hospital_id = Hospitals.id and Patients.id = p_id) as first_hospital,
(SELECT Hospitals.id FROM Hospitals,Patients WHERE Patients.first_hospital_id = Hospitals.id and Patients.id = p_id) as first_hospital_id,
(SELECT Hospitals.name FROM Hospitals,Patients WHERE Patients.hospital_id = Hospitals.id and Patients.id = p_id) as current_hospital,
(SELECT Hospitals.id FROM Hospitals,Patients WHERE Patients.hospital_id = Hospitals.id and Patients.id = p_id) as current_hospital_id
FROM Patients
WHERE Patients.id = $patient_id";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getVisitedPlaces($condition){
        $query = "SELECT Visited_Places.name as visited
FROM `Visited_Places`, Townships,District ,States
WHERE Visited_Places.township_id = Townships.id and Townships.district_id = District.id and District.state_id = States.id and $condition";


        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTownships($state_id){
        $query = "SELECT Townships.name as townships
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id and States.id = $state_id
GROUP BY Townships.name order by Townships.id";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHospitals($condition,$order){
        $query = "SELECT Hospitals.name as hospitals
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and
Townships.district_id = District.id and District.state_id= States.id $condition
GROUP BY Hospitals.name order by $order";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($table,$key,$value,$patient_id){
        $query = "UPDATE `$table` SET `$key` = '$value' WHERE `$table`.`id` = $patient_id;";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->rowCount();
    }
    public function updateSummary($status,$confirm,$pui,$die,$test,$cure,$recovered){
        $query = "UPDATE `Summary` SET `status` = '$status' ,`confirm` = '$confirm', `pui` = '$pui', `die` = '$die', `test` = '$test', `cure` = '$cure', `recovered` = '$recovered' WHERE `Summary`.`id` = 7; ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }








    public function delete($table,$id){
        $query = "DELETE FROM `$table` WHERE id = $id ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->rowCount();
    }


}
