<?php
// Assuming you have established a MySQLi connection

// Get the school year ID you want to archive from tbl_school_year
$syIdToArchive = 123; // Replace with the actual school year ID you want to archive

// Start a transaction to ensure atomicity
mysqli_begin_transaction($yourDbConnection);

try {
    // Step 1: Archive the school year in tbl_school_year
    $archiveSchoolYearQuery = "UPDATE tbl_school_year SET status = 0 WHERE sy_id = ?";
    $archiveSchoolYearStmt = $yourDbConnection->prepare($archiveSchoolYearQuery);
    $archiveSchoolYearStmt->bind_param("i", $syIdToArchive);
    $archiveSchoolYearStmt->execute();

    // Step 2: Archive the corresponding rows in tbl_module based on reference sy_id
    $archiveModuleQuery = "UPDATE tbl_module SET status = 0 WHERE sy_id = ?";
    $archiveModuleStmt = $yourDbConnection->prepare($archiveModuleQuery);
    $archiveModuleStmt->bind_param("i", $syIdToArchive);
    $archiveModuleStmt->execute();

    // Step 3: Archive the corresponding rows in tbl_lesson based on reference module_id
    $archiveLessonQuery = "UPDATE tbl_lesson SET status = 0 WHERE module_id IN (SELECT module_id FROM tbl_module WHERE sy_id = ?)";
    $archiveLessonStmt = $yourDbConnection->prepare($archiveLessonQuery);
    $archiveLessonStmt->bind_param("i", $syIdToArchive);
    $archiveLessonStmt->execute();

    // Step 4: Archive the corresponding rows in tbl_topic based on reference lesson_id
    $archiveTopicQuery = "UPDATE tbl_topic SET status = 0 WHERE lesson_id IN (SELECT lesson_id FROM tbl_lesson WHERE module_id IN (SELECT module_id FROM tbl_module WHERE sy_id = ?))";
    $archiveTopicStmt = $yourDbConnection->prepare($archiveTopicQuery);
    $archiveTopicStmt->bind_param("i", $syIdToArchive);
    $archiveTopicStmt->execute();

    // Step 5: Archive the corresponding rows in tbl_quiz based on reference topic_id
    $archiveQuizQuery = "UPDATE tbl_quiz SET status = 0 WHERE topic_id IN (SELECT topic_id FROM tbl_topic WHERE lesson_id IN (SELECT lesson_id FROM tbl_lesson WHERE module_id IN (SELECT module_id FROM tbl_module WHERE sy_id = ?)))";
    $archiveQuizStmt = $yourDbConnection->prepare($archiveQuizQuery);
    $archiveQuizStmt->bind_param("i", $syIdToArchive);
    $archiveQuizStmt->execute();

    // Commit the transaction if all queries succeed
    mysqli_commit($yourDbConnection);

    // Close the statements
    $archiveSchoolYearStmt->close();
    $archiveModuleStmt->close();
    $archiveLessonStmt->close();
    $archiveTopicStmt->close();
    $archiveQuizStmt->close();

    echo "Archiving successful!";
} catch (Exception $e) {
    // Rollback the transaction if an error occurs
    mysqli_rollback($yourDbConnection);
    
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$yourDbConnection->close();
?>
