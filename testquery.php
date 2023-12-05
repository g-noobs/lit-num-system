<?php 
$archiveModuleQuery = "UPDATE tbl_module SET status = 'archived' WHERE sy_id = ?";
$archiveModuleStmt = $yourDbConnection->prepare($archiveModuleQuery);
$archiveModuleStmt->bind_param("i", $syIdToArchive);
$archiveModuleStmt->execute();

// Step 3: Archive the corresponding rows in tbl_lesson based on reference module_id
$archiveLessonQuery = "UPDATE tbl_lesson SET status = 'archived' WHERE module_id IN (SELECT module_id FROM tbl_module WHERE sy_id = ?)";
$archiveLessonStmt = $yourDbConnection->prepare($archiveLessonQuery);
$archiveLessonStmt->bind_param("i", $syIdToArchive);
$archiveLessonStmt->execute();

// Step 4: Archive the corresponding rows in tbl_topic based on reference lesson_id
$archiveTopicQuery = "UPDATE tbl_topic SET status = 'archived' WHERE lesson_id IN (SELECT lesson_id FROM tbl_lesson WHERE module_id IN (SELECT module_id FROM tbl_module WHERE sy_id = ?))";
$archiveTopicStmt = $yourDbConnection->prepare($archiveTopicQuery);
$archiveTopicStmt->bind_param("i", $syIdToArchive);
$archiveTopicStmt->execute();

// Step 5: Archive the corresponding rows in tbl_quiz based on reference topic_id
$archiveQuizQuery = "UPDATE tbl_quiz SET status = 'archived' WHERE topic_id IN (SELECT topic_id FROM tbl_topic WHERE lesson_id IN (SELECT lesson_id FROM tbl_lesson WHERE module_id IN (SELECT module_id FROM tbl_module WHERE sy_id = ?)))";
$archiveQuizStmt = $yourDbConnection->prepare($archiveQuizQuery);
$archiveQuizStmt->bind_param("i", $syIdToArchive);
$archiveQuizStmt->execute();

// Step 6: Archive the corresponding rows in tbl_class based on reference sy_id
$archiveClassQuery = "UPDATE tbl_class SET status = 'archived' WHERE sy_id = ?";
$archiveClassStmt = $yourDbConnection->prepare($archiveClassQuery);
$archiveClassStmt->bind_param("i", $syIdToArchive);
$archiveClassStmt->execute();

// Step 7: Archive the corresponding rows in tbl_user_info based on reference class_id
$archiveUserInfoQuery = "UPDATE tbl_user_info SET status = 'archived' WHERE class_id IN (SELECT class_id FROM tbl_class WHERE sy_id = ?)";
$archiveUserInfoStmt = $yourDbConnection->prepare($archiveUserInfoQuery);
?>