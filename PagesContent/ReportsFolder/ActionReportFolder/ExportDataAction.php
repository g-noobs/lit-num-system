<?php
if (isset($_POST["tableData"])) {
    $tableData = $_POST["tableData"];
    $filename = $_POST["fileName"];

    // Create an XML document from the table data (you will need to modify this part to suit your data structure)
    $xml = new SimpleXMLElement('<quiz_data></quiz_data>');
    // Assuming your table rows represent quiz questions, you can loop through them to create XML elements
    // Modify this loop to match your data structure
    foreach ($tableData as $row) {
        $question = $xml->addChild('question');
        $question->addChild('question_text', $row['question_text']);
        $question->addChild('answer', $row['answer']);
    }

    // Set the appropriate headers for XML download
    header('Content-Type: application/xml');
    header("Content-Disposition: attachment; filename=$filename");

    // Output the XML data
    echo $xml->asXML();

    // Return a JSON response with the file URL and name
    $response = array(
        'success' => true,
        'fileUrl' => 'data:application/xml,' . urlencode($xml->asXML()),
        'fileName' => $filename,
    );

    echo json_encode($response);
} else {
    // Return an error response if data is missing
    $response = array('success' => false);
    echo json_encode($response);
}
?>
